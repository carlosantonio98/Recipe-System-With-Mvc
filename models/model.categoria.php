<?php
require_once("model.base.php");

class Categoria extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }
}

$categoria = new Categoria($db);
$categoria->setView ("cat_categorias");
$categoria->setTable("cat_categorias");

$categoria->setKey  ("IdCategoria");
$categoria->addField("Categoria");
$categoria->newRecord();
?>