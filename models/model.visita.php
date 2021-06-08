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
$visita->addField("FkUsuario");
$visita->newRecord();
?>