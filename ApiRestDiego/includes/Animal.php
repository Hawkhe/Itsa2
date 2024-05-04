<?php
require_once('Database.php');

class Animal{

    public static function create_animal($edad, $especie, $clasificacion, $estado){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('INSERT INTO animal (edad, especie , clasificacion, estado) VALUES (:edad, :especie, :clasificacion, :estado)');
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':especie', $especie); 
        $stmt->bindParam(':clasificacion', $clasificacion); 
        $stmt->bindParam(':estado', $estado);  
        if($stmt->execute()){
            // Animal guardado correctamente
            http_response_code(201);
            echo json_encode(array("message" => "Animal guardado con éxito."));
        }else{
            // Error al guardar el animal
            http_response_code(500);
            echo json_encode(array("message" => "No se ha podido guardar el animal."));
        }
    }
    
    public static function delete_animal($id){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('DELETE FROM animal WHERE id=:id');
        $stmt->bindParam(':id', $id);

        if($stmt->execute()){
            http_response_code(201);
            echo json_encode(array("message" => "Animal borrado con éxito."));
        }else{
            http_response_code(500);
            echo json_encode(array("message" => "No se ha podido borrar el animal."));
        }
    }
    public static function getIdAnimal($id){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('SELECT * FROM animal WHERE id=:id');
        $stmt->bindParam(':id', $id);

        if($stmt->execute()){
            $result = $stmt->fetch();
            echo json_encode($result);
        }else{
            http_response_code(500);
            echo json_encode(array("message" => "No se ha podido consultar el animal."));
        }
    }

    public static function get_all_animal(){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('SELECT * FROM animal');       
        if($stmt->execute()){
            $result = $stmt->fetchAll();
            http_response_code(200);
            echo json_encode($result);
        }else{
            http_response_code(500);
            echo json_encode(array("message" => "No se ha podido consultar los animales."));
        }
    }

    public static function update_animal($id, $edad, $especie, $clasificacion, $estado){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('UPDATE animal SET edad=:edad, especie=:especie, clasificacion=:clasificacion, estado=:estado WHERE id=:id');
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':especie', $especie); 
        $stmt->bindParam(':clasificacion', $clasificacion); 
        $stmt->bindParam(':estado', $estado);  
        $stmt->bindParam(':id', $id);  
        
        if($stmt->execute()){
            http_response_code(201);
            echo json_encode(array("message" => "Animal actualizado correctamente."));
        }else{
            http_response_code(500);
            echo json_encode(array("message" => "No se ha podido actualizar el animal."));
        }
    }public static function get_animal_by_id($id){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('SELECT * FROM animal WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
