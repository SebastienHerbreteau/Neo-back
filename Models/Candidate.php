<?php

namespace App\Models;

use App\Models\Database;

class Candidate
{
    public function getAllCandidates()
    {
        Database::prepReq('SELECT * FROM candidate');
        return Database::fetchData();
    }

    public function get($id)
    {
        $params = [
            'id' => $id,
            
        ];
        Database::prepReq('SELECT * FROM candidate WHERE id = :id', $params);
        
        return Database::fetchData();
    }

    public static function getCandidateByPlanetId(int $planet_id)
    {
        $params = [
            'planet_id' => $planet_id,
        ];

        Database::prepReq(
            'SELECT * FROM candidate INNER JOIN planet ON candidate.id_planet = planet.id WHERE planet.id = :planet_id',
            $params
        );
        return Database::fetchData();
    }

    public function add(
        $name,
        $email,
        $pwd,
        $id_planet,
        $tel,
        $avatar,
        $cv
    ) {
        $params = [
            'name' => $name,
            'email' => $email,
            'pwd' => $pwd,
            'id_planet' => $id_planet,
            'tel' => $tel,
            'avatar' => $avatar,
            'cv' => $cv,
        ];

        Database::prepReq(
            'INSERT INTO candidate (name, email, pwd, id_planet, tel, avatar, cv) VALUES (:name, :email, :pwd, :id_planet, 
         :tel, :avatar, :cv)',
            $params
        );
        return Database::fetchData();
    }

    public function put(
        $candidate_id,
        $name,
        $email,
        $pwd,
        $id_planet,
        $tel,
        $avatar,
        $cv
    ) {
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

        Database::prepReq(
            "UPDATE candidate 
            SET name = :name, 
            email = :email, 
            pwd = :pwd, 
            id_planet = :id_planet, 
            tel = :tel, 
            avatar = :avatar, 
            cv = :cv 
            WHERE id = :id ",
            $params
        );
    }

    public function delete(int $candidate_id): void
    {
        $params = [
            'id' => $candidate_id,
        ];

        Database::prepReq(
            'DELETE FROM candidate WHERE id = :id',
            $params
        );
    }

    public function getCandidateByOfferId ($id)
    {
        $params = [
            'id' => $id,
        ];

        Database::prepReq(
            'SELECT * FROM candidate JOIN candidate_job_offer ON candidate_job_offer.id_candidate = candidate.id JOIN job_offer ON candidate_job_offer.id_job_offer = job_offer.id WHERE job_offer.id = :id',
            $params
        );
        return Database::fetchData();
    }
    
}
