<?php

require_once("../models/model.usuario.php");

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
        //$db->debug();
        $usuario->insert();
        //die();
        header("location:../?page=listado-usuarios");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $usuario->update($id);
        //die();
        header("location:../?page=listado-usuarios");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $usuario->deleteOne($id);
        //die();
        header("location:../?page=listado-usuarios");
    }
}

?>