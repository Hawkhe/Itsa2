<?php
require_once('Database.php');
class Cliente{

    public static function get_all_clientes(){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('SELECT * FROM cliente');
        if($stmt->execute()){
            $result = $stmt->fetchAll();
            echo json_encode($result);
            header('HTTP/1.1 200 OK');
        } else {
            header('HTTP/1.1 500 Internal Server Error');
        }
    }
}
