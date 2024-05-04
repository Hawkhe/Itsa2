<?php
require_once(__DIR__ . '/../includes/Animal.php');

// Verifica si se ha enviado un formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $id = $_POST['id'];
    $edad = $_POST['edad'];
    $especie = $_POST['especie'];
    $clasificacion = $_POST['clasificacion'];
    $estado = $_POST['estado'];

    // Llama a la función para actualizar el animal
    Animal::update_animal($id, $edad, $especie, $clasificacion, $estado);
} else {
    // Si no se envió un formulario, muestra un mensaje de error
    echo json_encode(array("message" => "Error: No se han recibido datos para actualizar."));
}
?>