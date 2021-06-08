<?php
require_once("model.base.php");

class Pais extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }
}

$pais = new Pais($db);
$pais->setView ("cat_paises");
$pais->setTable("cat_paises");

$pais->setKey  ("IdPais");
$pais->addField("Pais");
$pais->newRecord();
?>