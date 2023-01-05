<?php

namespace App\Models;

use App\Models\Database;

class User
{
    public function getAllUsers()
    {
        Database::connect();
        Database::prepReq('SELECT * FROM user');
        return Database::fetchData();
    }

    public function deleteUser(int $id): int
    {
        $params = [
            'id' => $id,
        ];
        Database::connect();
        $data = Database::prepReq(
            'DELETE FROM user WHERE user.id = :id',
            $params
        );
        return $data->rowCount();
    }
}
