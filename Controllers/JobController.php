<?php
namespace App\Controllers;

use App\Models\Job;
use App\Controllers\Controller;

class JobController extends Controller
{
    public function getJobOffer($id)
    {
        $job = new Job();
        $job = $job->getJobOffer($id);
        return $job;
    }

    public function getAllJobs()
    {
        $job = new Job();
        $job = $job->getAllJobOffer();
        return $job;
    }

    public function getJobByPlanet($id_planet)
    {
        $job = new Job();
        $job = $job->getJobByPlanet($id_planet);
        return $job;
    }

    public function getJobByContract($contract)
    {
        $job = new Job();
        $job = $job->getJobByContract($contract);
        return $job;
    }

    public function getJobBySalary($salary_min, $salary_max)
    {
        $job = new Job();
        $job = $job->getJobBySalary($salary_min, $salary_max);
        return $job;
    }

    public function getJobByCandidate($id_candidate)
    {
        $job = new Job();
        $job = $job->getJobByCAndidate($id_candidate);
        return $job;
    }

    /**
     * @param int $id
     * @param string $title
     * @param string $content
     * @param int $id_planet
     * @param string $contract_type
     * @param int $salary
     * @param int $id_agency
     * @return int
     */
    public function createJobOffer(
        string $title,
        string $content,
        int $id_planet,
        string $contract_type,
        int $salary,
        int $id_agency
    ) {
        $job = new Job();
        $job = $job->postJobOffer(
            $title,
            $content,
            $id_planet,
            $contract_type,
            $salary,
            $id_agency
        );
        return $job;
    }

    public function modifyJobOffer(
        int $id,
        string $title,
        string $content,
        int $id_planet,
        string $contract_type,
        int $salary,
        int $id_agency
    ) {
        $job = new Job();
        $job = $job->putJobOffer(
            $id,
            $title,
            $content,
            $id_planet,
            $contract_type,
            $salary,
            $id_agency
        );
        return $job;
    }

    public function deleteJobOffer($id)
    {
        $job = new Job();
        $job = $job->deleteJobOffer($id);
        return $job;
    }
}
