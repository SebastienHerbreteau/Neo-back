<?php

namespace App\Models;

use App\Models\Database;

class Planet
{
    public function getAllPlanet()
    {
        Database::connect();
        Database::prepReq('SELECT * FROM planet');
        return Database::fetchData();
    }

    public function getPlanet($id)
    { 
        $params = [
            'id' => $id,
        ];
        Database::connect();
        Database::prepReq('SELECT * FROM planet WHERE planet.id = :id' , $params); 
        return Database::fetchData();
    }
    
}

?>