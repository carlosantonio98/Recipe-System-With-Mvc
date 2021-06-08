<?php
require_once("model.base.php");

class Seguimiento extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }
}

$seguimiento = new Seguimiento($db);
$seguimiento->setView ("cat_seguimientos");
$seguimiento->setTable("cat_seguimientos");

$seguimiento->setKey  ("IdSeguimiento");
$seguimiento->addField("Seguimiento");
$seguimiento->newRecord();
?>