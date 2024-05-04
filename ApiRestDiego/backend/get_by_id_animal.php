<?php
require_once(__DIR__ . '/../includes/Animal.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET["id"]) {

    $id=$_GET["id"];
    Animal::getIdAnimal($id);
}else {
    echo "nose envio el id";
}
