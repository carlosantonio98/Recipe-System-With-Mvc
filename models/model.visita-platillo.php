<?php
require_once("model.base.php");

class VisitaPlatillo extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function createVisit($idPlatillo)
    {
        $this->values[] = date("Y-m-d");
        $this->values[] = $idPlatillo;
        $this->insert();
    }
}

$visitaPlatillo = new VisitaPlatillo($db);
$visitaPlatillo->setView ("fin_visitasplatillos");
$visitaPlatillo->setTable("fin_visitasplatillos");

$visitaPlatillo->setKey  ("IdVisitaPlatillo");
$visitaPlatillo->addField("FechaVisita");
$visitaPlatillo->addField("FkPlatillo");
$visitaPlatillo->newRecord();
?>