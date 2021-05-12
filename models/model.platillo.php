<?php
require_once("model.base.php");

class Platillo extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }
}

$platillo = new Platillo($db);
$platillo->setView ("vw_Platillos");
$platillo->setTable("fin_Platillos");

$platillo->setKey  ("IdPlatillo");
$platillo->addField("Platillo");
$platillo->addField("Ingrediente");
$platillo->addField("Preparacion");
$platillo->addField("ImagenPlatillo");
$platillo->addField("FechaRegistro");
$platillo->addField("HoraRegistro");
$platillo->addField("Categoria");
$platillo->addField("NombreUsuario");
$platillo->addField("Paterno");
$platillo->addField("Materno");
$platillo->addField("Seguimiento");
$platillo->newRecord();
?>