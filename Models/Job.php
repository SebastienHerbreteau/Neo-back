<?php

namespace App\Models;

use App\Models\Database;

class Job
{
    public function getAllJobOffer()
    {
        Database::prepReq('SELECT * FROM job_offer');
        return Database::fetchData();
    }

    public function getJobByPlanet($id_planet)
    {
        $params = [
            'planet' => $id_planet,
        ];
        Database::prepReq(
            'SELECT * FROM job_offer WHERE id_planet = :planet',
            $params
        );
        return Database::fetchData();
    }

    public function getJobByContract($contract)
    {
        $params = [
            'contract' => $contract,
        ];
        Database::prepReq(
            'SELECT * FROM job_offer WHERE contract_type = :contract',
            $params
        );
        return Database::fetchData();
    }

    public function getJobBySalary($salary_min, $salary_max)
    {
        $params = [
            'salary_min' => $salary_min,
            'salary_max' => $salary_max,
        ];
        Database::prepReq(
            'SELECT * FROM job_offer WHERE salary BETWEEN :salary_min AND :salary_max',
            $params
        );
        return Database::fetchData();
    }

    public function getJobOffer(int $id)
    {
        $params = [
            'id' => $id,
        ];
        Database::prepReq('SELECT * FROM job_offer WHERE id = :id', $params);
        return Database::fetchData();
    }

    public function postJobOffer(
        string $title,
        string $content,
        int $id_planet,
        string $contract_type,
        int $salary,
        int $id_agency
    ): void {
        $params = [
            'title' => $title,
            'content' => $content,
            'id_planet' => $id_planet,
            'contract_type' => $contract_type,
            'salary' => $salary,
            'id_agency' => $id_agency,
        ];
        Database::prepReq(
            'INSERT INTO job_offer (title, content, id_planet, contract_type, salary, id_agency) VALUES (:title, :content, :id_planet, :contract_type, :salary, :id_agency)',
            $params
        );
    }

    public function putJobOffer(
        int $id,
        string $title,
        string $content,
        int $id_planet,
        string $contract_type,
        int $salary,
        int $id_agency
    ): void {
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
            'UPDATE job_offer SET title = :title, content = :content, id_planet = :id_planet, contract_type = :contract_type, salary = :salary, id_agency = :id_agency where id = :id',
            $params
        );
    }

    public function deleteJobOffer(int $id): void
    {
        $params = [
            'id' => $id,
        ];
        Database::prepReq('DELETE FROM job_offer WHERE id = :id', $params);
    }

    // job by candidate - test

    public function getJobByCandidate($id)
    {
        $params = [
            'id' => $id,
        ];
        Database::prepReq(
            'SELECT * FROM job_offer JOIN candidate_job_offer ON candidate_job_offer.id_job_offer = job_offer.id JOIN candidate ON candidate_job_offer.id_candidate = candidate.id WHERE candidate.id = :id',
            $params
        );
        return Database::fetchData();
    }
}
