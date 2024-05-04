<?php
require_once('C:\xampp\htdocs\APIRESTPHP\includes\Cliente.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    Cliente::get_all_clientes();
}
?>