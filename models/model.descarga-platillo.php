<?php
require_once("model.base.php");

class DescargaPlatillo extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function createDownload($idPlatillo)
    {
        $this->values[] = date("Y-m-d");
        $this->values[] = $idPlatillo;
        $this->insert();
    }
}

$descargaPlatillo = new DescargaPlatillo($db);
$descargaPlatillo->setView ("fin_descargasplatillos");
$descargaPlatillo->setTable("fin_descargasplatillos");

$descargaPlatillo->setKey  ("IdDescargaPlatillo");
$descargaPlatillo->addField("FechaDescarga");
$descargaPlatillo->addField("FkPlatillo");
$descargaPlatillo->newRecord();
?>