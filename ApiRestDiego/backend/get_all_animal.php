<?php
require_once(__DIR__ . '/../includes/Animal.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    Animal::get_all_animal();
}
?>
