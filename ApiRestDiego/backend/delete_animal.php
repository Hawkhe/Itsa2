<?php 
require_once(__DIR__ . '/../includes/Animal.php');

if(  isset($_GET['id'])){
    Animal::delete_animal($_GET['id']);
}else {
    echo "Nose envio el id";
}
?>