<?php
require_once("model.base.php");

class Visita extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function createVisit($idUsuario)
    {
        $this->values[] = date("Y-m-d");
        $this->values[] = date("H-i-s");
        $this->values[] = $idUsuario;
        $this->insert();
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