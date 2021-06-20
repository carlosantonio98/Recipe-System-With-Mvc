<?php
session_start();
require_once("../models/model.platillo.php");

if ($_POST) {

    $id   = $_POST['id'];
    $tipo = $_POST['tipo'];
    
    
    if ($tipo == 'nuevo') {
        setValuesPOST($platillo);
        $platillo->values[3] = guardarImagen();
        $platillo->values[7] = 1;
        $platillo->insert();
        
        // Comparamos por roles para redirigir
        if($_SESSION['usuario']->FkRol == '2')
            header("location:../?page=mis-platillos-empleado");
        else if($_SESSION['usuario']->FkRol == '3')
            header("location:../?page=mis-platillos-cliente");

    } elseif ($tipo == 'actualizar') {
        // Hacemos una busqueda del platillo y almacenamos temporalmente su nombre
        $platillo->getOne($id);
        $imagenTemporal = $platillo->data->ImagenPlatillo;


        // Comparamos para ver si llega halgo por el file
        if (isset($_FILES['imagenPlatillo']['name']) && $_FILES['imagenPlatillo']['name'] != '') {
            setValuesPOST($platillo);
            $platillo->values[3] = guardarImagen();
            unlink("C:/xampp/htdocs/proyecto/resources/img/platillos/$imagenTemporal");
        } else {
            setValuesPOST($platillo);
            $platillo->values[3] = $imagenTemporal;
        }
        
        // Actualizamos el platillo
        $platillo->update($id);
        
        // Comparamos por roles para redirigir
        if ($_SESSION['usuario']->FkRol == '2')
            header("location:../?page=platillo-empleado&id=$id");
        else if($_SESSION['usuario']->FkRol == '3')
            header("location:../?page=platillo-cliente&id=$id");

    } elseif ($tipo == 'actualizarSeguimiento') {

        $platillo->getOne($id);
        preloadDatasInValues($platillo);
        $platillo->values[7] = $_POST['seguimiento'];

        // Actualizamos el platillo
        $platillo->update($id);
        header("location:../?page=buzon-platillos");

    } elseif ($tipo == 'borrar') {
        $platillo->deleteOne($id);
        
        // comparamos por roles para redirigir
        if($_SESSION['usuario']->FkRol == 1)
            header("location:../?page=listado-platillos");
        else if($_SESSION['usuario']->FkRol == '2')
            header("location:../?page=mis-platillos-empleado");
        else if($_SESSION['usuario']->FkRol == '3')
            header("location:../?page=mis-platillos-cliente");
    }
}


// Mis funciones 
function setValuesPOST($platillo)
{
    // guardar los datos del formulario en el modelo
    $platillo->values[] = $_POST['platillo'];
    $platillo->values[] = $_POST['ingrediente'];
    $platillo->values[] = $_POST['preparacion'];
    $platillo->values[] = '';
    $platillo->values[] = date('Y-m-d');
    $platillo->values[] = date('H:m:i');
    $platillo->values[] = $_POST['categoria'];
    $platillo->values[] = '';
    $platillo->values[] = $_SESSION['usuario']->IdUsuario;

}

function preloadDatasInValues($platillo)
{
    $platillo->values[] = $platillo->data->Platillo;
    $platillo->values[] = $platillo->data->Ingrediente;
    $platillo->values[] = $platillo->data->Preparacion;
    $platillo->values[] = $platillo->data->ImagenPlatillo;
    $platillo->values[] = $platillo->data->FechaRegistro;
    $platillo->values[] = $platillo->data->HoraRegistro;
    $platillo->values[] = $platillo->data->FkCategoria;
    $platillo->values[] = '';
    $platillo->values[] = $platillo->data->FkUsuario;
}

function guardarImagen() {
    $targetPath = '../resources/img/platillos/';
    $file = $_FILES['imagenPlatillo'];
    $fileType =  $file['type'];
    $fileName = "";
    
    $ext = ['png', 'jpeg', 'jpg'];
    $fileExt = end(explode('/',$fileType));
    
    if(in_array($fileExt,$ext)) {
        $fileName = nameGenerate() . '.' . $fileExt;

        $pathFrom = $file['tmp_name']; // ubicacion actual de la imagen desde el computador
        $pathTo = $targetPath . $fileName;  // nueva ubicacion de la imagen a un espacion en el servidor
        
        if(!file_exists($pathTo)) {
            move_uploaded_file($pathFrom, $pathTo);
        }
    }
    return $fileName;
}

function nameGenerate() {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    return str_shuffle($characters);
}

?>