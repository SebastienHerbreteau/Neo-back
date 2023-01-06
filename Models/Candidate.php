<?php

namespace App\Models;

use App\Models\Database;

class Candidate
{
    public function getAllCandidates()
    {
        Database::connect();
        Database::prepReq('SELECT * FROM candidate');
        return Database::fetchData();
    }

    public function postCanditate($name, $email, $pwd, $id_planet, $tel, $avatar, $cv)
    {

        $params = [
            'id' => $name,
            'email' => $email,
            'pwd' => $pwd,
            'id_planet' => $id_planet,
            'tel' => $tel,
            'avatar' => $avatar,
            'cv' => $cv,
        ];

        Database::connect();
        Database::prepReq('INSERT INTO candidate (name, email, pwd, id_planet, tel, avatar, cv) VALUES (:name, :email, :pwd, :id_planet, 
         :tel, :avatar, :cv)',
         $params
         );
        return Database::fetchData();
    }

    public function putCandidate($candidate_id, $name, $email, $pwd, $id_planet, $tel, $avatar, $cv)
    {
        $params = [
            'id' => $candidate_id,
            'name' => $name,
            'email' => $email,
            'pwd' => $pwd,
            'id_planet' => $id_planet,
            'tel' => $tel,
            'avatar' => $avatar,
            'cv' => $cv,
        ]; 
        Database::connect();
        $data = Database::prepReq(
            "UPDATE candidate 
            SET name = :name, 
            email = :email, 
            pwd = :pwd, 
            id_planet = :id_planet, 
            tel = :tel, 
            avatar = :avatar, 
            cv = :cv 
            WHERE candidate.id = :id ",
            $params
        );
        return $data->rowCount();
    }


    

    public function deleteCandidate(int $candidate_id): int
    {
        $params = [
            'id' => $candidate_id,
        ];
        Database::connect();
        $data = Database::prepReq(
            'DELETE FROM candidate WHERE candidate.id = :id',
            $params
        );
        return $data->rowCount();
    }
}
