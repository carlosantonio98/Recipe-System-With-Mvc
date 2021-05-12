<?php
require_once("model.base.php");

class Visita extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }
}

$visita = new Visita($db);
$visita->setView ("vw_visitas");
$visita->setTable("fin_visitas");

$visita->setKey  ("IdVisita");
$visita->addField("FechaVisita");
$visita->addField("HoraVisita");
$visita->addField("NombreUsuario");
$visita->addField("Paterno");
$visita->addField("Materno");
$visita->addField("Correo");
$visita->addField("Rol");
$visita->addField("Pais");
$visita->newRecord();
?>