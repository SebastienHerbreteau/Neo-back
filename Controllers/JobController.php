<?php
namespace App\Controllers;

use App\Models\Job;
use App\Controllers\Controller;

class JobController extends Controller
{
    public function getAllJobs()
    {
        $job = new Job();
        $job = $job->getAllJobOffer();
        return $job;
    }


    public function getJobOffer($id)
    {
        $job = new Job();
        $job = $job->getJobOffer($id);
        return $job;
    }


    public function createJobOffer(int $id, string $title, string $content, int $id_planet, string $contract_type, int $salary, int $id_agency)
    {
        $job = new Job;
        $job = $job->postJobOffer( $id,  $title,  $content,  $id_planet,  $contract_type,  $salary,  $id_agency);
        return $job;
    }


    public function modifyJobOffer(int $id, string $title, string $content, int $id_planet, string $contract_type, int $salary, int $id_agency)
    {
        $job = new Job;
        $job = $job->putJobOffer( $id,  $title,  $content,  $id_planet,  $contract_type,  $salary,  $id_agency);
        return $job;
    }

    public function deleteJobOffer($id)
    {
        $job = new Job;
        $job = $job->deleteJobOffer($id);
        return $job;
    }

        // job by candidate - test
    public function getJobByCandidate($id)
    {
        $job = new Job();
        $job = $job->getJobByCandidate($id);
        return $job;
    }
}