<?php
require_once(__DIR__ . '/../includes/Animal.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edad']) && isset($_POST['especie']) && isset($_POST['clasificacion']) && isset($_POST['estado'])) {
    Animal::create_animal($_POST['edad'], $_POST['especie'], $_POST['clasificacion'], $_POST['estado']);
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Error: No se han recibido todos los datos necesarios para crear un animal."));
}
?>
