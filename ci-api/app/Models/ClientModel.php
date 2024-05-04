<?php

namespace App\Models;

use CodeIgniter\Model;

class CLientModel extends Model{

protected $table = 'client';
protected $allowedFields = [
    'name', 'email', 'retainer_fee'
];
protected $updateField = 'updated_at';

public function findClientById($id){
    $client = $this->asArray()->where(['id'=>$id])->first();

    if(!$client){
        throw new \Exception('no se encontro el id del cliente');
    }
    return $client;
}

}