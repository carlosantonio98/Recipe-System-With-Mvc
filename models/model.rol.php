<?php
require_once("model.base.php");

class Rol extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }
}

$rol = new Rol($db);
$rol->setView ("cat_roles");
$rol->setTable("cat_roles");

$rol->setKey  ("IdRol");
$rol->addField("Rol");
$rol->newRecord();
?>