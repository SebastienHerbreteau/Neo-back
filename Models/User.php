<?php

namespace App\Models;

use App\Models\Database;

class User
{
    // public function getUser(int $id): bool|array
    // {
    //     $params = [
    //         "id" => $id
    //     ];
    //     Database::connect();
    //     Database::prepReq("SELECT *, category.nom AS cat_name  FROM post INNER JOIN category ON category.id = post.category_id  WHERE post.id = :id", $params);
    //     return Database::fetchData();
    // }

    public function getAllUsers()
    {
        Database::connect();
        Database::prepReq("SELECT * FROM user");
        return Database::fetchData();
    }

    public function deleteUser(int $id): int
    {
        $params = [
            "id" => $id
        ];
        Database::connect();
        $data = Database::prepReq("DELETE FROM user WHERE user.id = :id", $params);
        return $data->rowCount();
    }
}
