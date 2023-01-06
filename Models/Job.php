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
    

        if(($planet AND $contract_type AND $salary_min AND $salary_max) === NULL){
        Database::prepReq('SELECT * FROM job_offer');
        return Database::fetchData();}

        if($planet != NULL){
        Database::prepReq('SELECT * FROM job_offer WHERE id_planet = :planet', $params);
        return Database::fetchData();}

        if($contract_type != NULL){
        Database::prepReq('SELECT * FROM job_offer WHERE contract_type = :contract_type', $params);
        return Database::fetchData();}

        if(($salary_min AND $salary_max) != NULL){
        Database::prepReq('SELECT * FROM job_offer WHERE salary BETWEEN :salary_min AND :salary_max', $params);
        return Database::fetchData();}

       
    }

    public function getJobOffer(int $id): int
    {
        $params = [
            'id' => $id,
        ];
        Database::prepReq(
            'SELECT FROM job_offer WHERE id = :id',
            $params
        );
        return Database::fetchData();
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
        Database::prepReq(
            'INSERT INTO job_offer (id, title, content, id_planet, contract_type, salary, id_agency) VALUES (:id, :title, :content, :id_planet, :contract_type, :salary, :id_agency)',
            $params);
            
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
        Database::prepReq(
            'UPDATE job_offer SET id = :id, title = :title, content = :content, id_planet = :id_planet, contract_type = :contract_type, salary = :salary, id_agency = :id_agency',
            $params);
        }

    public function deleteJobOffer(int $id): int
    {
        $params = [
            'id' => $id,
        ];
        
        Database::prepReq(
            'DELETE FROM job_offer WHERE id = :id',
            $params
        );
        
    }

    
}
