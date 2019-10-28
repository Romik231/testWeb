<?php
require '../models/Db.php';
require '../models/Catalog.php';
require '../models/CatalogAdmin.php';

if($_POST){
    $add = new \models\CatalogAdmin();
   var_dump($add->addCategory());

}
