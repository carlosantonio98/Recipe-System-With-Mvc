<?php

require_once("../models/model.usuario.php");
session_start();

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];

    // guardar los datos del formulario en el modelo
    $usuario->values[] = $_POST["nombre"];
    $usuario->values[] = $_POST["paterno"];
    $usuario->values[] = $_POST["materno"];
    $usuario->values[] = $_POST['nacimiento'];
    $usuario->values[] = $_POST['correo'];
    $usuario->values[] = $_POST['password'];
    $usuario->values[] = $_POST['pais'];
    $usuario->values[] = $_POST['rol'];

    
    

    if ($tipo == 'nuevo') {
        $location = "location:../?page=listado-usuarios";
        if(is_null($_POST['rol']) || empty($_POST['rol'])) {
            $usuario->values[7] = 3;
            $location = "location:../?page=login";
        }
        
        $usuario->insert();
        header($location);
    } elseif ($tipo == 'actualizar') {
        $location = "location:../?page=listado-usuarios";
        if(is_null($_POST['rol']) || empty($_POST['rol'])) {
            $usuario->values[7] = $_SESSION['usuario']->FkRol;
            $location = "location:../?page=mi-cuenta";
        }

        $usuario->update($id);
        header($location);
    }
    elseif ($tipo == 'borrar') {
        $usuario->deleteOne($id);
        header("location:../?page=listado-usuarios");
    }
}

?>