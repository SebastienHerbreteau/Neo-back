<?php

namespace App\Models;

use App\Models\Database;

class Planet
{
    public function getAllPlanet()
    {
        Database::prepReq('SELECT * FROM planet');
        return Database::fetchData();
    }

    public function getPlanet($id)
    {
        $params = [
            'id' => $id,
        ];
        Database::prepReq('SELECT * FROM planet WHERE id = :id', $params);
        return Database::fetchData();
    }
}

?>
