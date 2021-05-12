<?php
require_once("model.base.php");

class Usuario extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }
}

$usuario = new Usuario($db);
$usuario->setView ("vw_usuarios");
$usuario->setTable("fin_usuarios");

$usuario->setKey  ("IdUsuario");
$usuario->addField("NombreUsuario");
$usuario->addField("Paterno");
$usuario->addField("Materno");
$usuario->addField("Pais");
$usuario->addField("Rol");
$usuario->newRecord();
?>