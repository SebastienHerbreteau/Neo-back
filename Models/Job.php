<?php

namespace App\Models;

use App\Models\Database;

class Job
{
    public function getAllJobOffer(
        ?int $planet = NULL,
        ?string $contract_type = NULL,
        ?int $salary_min = NULL,
        ?int $salary_max = NULL,
    ) {
        $params = [
            'planet' => $planet,
            'contract_type' => $contract_type,
            'salary_min' => $salary_min,
            'salary_max' => $salary_max,
        ];
        Database::connect();

        if(($planet AND $contract_type AND $salary_min AND $salary_max) === NULL){
        $data = Database::prepReq('SELECT * FROM job_offer');
        return $data->rowCount();}

        if($planet != NULL){
        $data = Database::prepReq('SELECT * FROM job_offer WHERE id_planet = :planet', $params);
        return $data->rowCount();}

        if($contract_type != NULL){
        $data = Database::prepReq('SELECT * FROM job_offer WHERE contract_type = :contract_type', $params);
        return $data->rowCount();}

        if(($salary_min AND $salary_max) != NULL){
        $data = Database::prepReq('SELECT * FROM job_offer WHERE salary BETWEEN :salary_min AND :salary_max', $params);
        return $data->rowCount();}

       
    }

    public function getJobOffer(int $id): int
    {
        $params = [
            'id' => $id,
        ];
        Database::connect();
        $data = Database::prepReq(
            'SELECT FROM job_offer WHERE id = :id',
            $params
        );
        return $data->rowCount();
    }


    public function postJobOffer(int $id, string $title, string $content, int $id_planet, string $contract_type, int $salary, int $id_agency): int
    {
        $params = [
            'id' => $id,
            'title' => $title,
            'content' => $content,
            'id_planet' => $id_planet,
            'contract_type' => $contract_type,
            'salary' => $salary,
            'id_agency' => $id_agency,
        ];
        Database::connect();
        $data = Database::prepReq(
            'INSERT INTO job_offer (id, title, content, id_planet, contract_type, salary, id_agency) VALUES (:id, :title, :content, :id_planet, :contract_type, :salary, :id_agency)',
            $params);
        return $data->rowCount();
    }

    public function putJobOffer(int $id, string $title, string $content, int $id_planet, string $contract_type, int $salary, int $id_agency): int
    {
        $params = [
            'id' => $id,
            'title' => $title,
            'content' => $content,
            'id_planet' => $id_planet,
            'contract_type' => $contract_type,
            'salary' => $salary,
            'id_agency' => $id_agency,
        ];
        Database::connect();
        $data = Database::prepReq(
            'UPDATE job_offer SET id = :id, title = :title, content = :content, id_planet = :id_planet, contract_type = :contract_type, salary = :salary, id_agency = :id_agency',
            $params);
        return $data->rowCount();
    }

    public function deleteJobOffer(int $id): int
    {
        $params = [
            'id' => $id,
        ];
        Database::connect();
        $data = Database::prepReq(
            'DELETE FROM job_offer WHERE id = :id',
            $params
        );
        return $data->rowCount();
    }

    
}
