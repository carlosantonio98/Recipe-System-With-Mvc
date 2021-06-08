<?php

require_once("../models/model.categoria.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];

    // guardar los datos del formulario en el modelo
    $categoria->values[] = $_POST["categoria"];



    if ($tipo == 'nuevo') {
        //$db->debug();
        $categoria->insert();
        //die();
        header("location:../?page=listado-categorias");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $categoria->update($id);
        //die();
        header("location:../?page=listado-categorias");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $categoria->deleteOne($id);
        //die();
        header("location:../?page=listado-categorias");
    }
}
?>