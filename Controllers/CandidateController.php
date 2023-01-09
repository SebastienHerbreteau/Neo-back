<?php
namespace App\Controllers;

use App\Models\Candidate;
use App\Controllers\Controller;

class CandidateController extends Controller
{
  public function getAllCandidates()
  {
    $candidates = new Candidate();
    $candidates = $candidates->getAllCandidates();
    return $candidates;
  }

  public function getCandidate($id)
  {
    $candidate = new Candidate();
    $candidate = $candidate->get($id);
    return $candidate;
  }

  public function getCandidateByPlanetId($id)
  {
    $candidate = new Candidate();
    $candidate = $candidate->getCandidateByPlanetId($id);
    return $candidate;
  }

  public function postCandidate(
    $name,
    $email,
    $pwd,
    $id_planet,
    $tel,
    $avatar,
    $cv
  ) {
      $candidate = new Candidate();
      $candidate = $candidate->add(
        $name,
        $email,
        $pwd,
        $id_planet,
        $tel,
        $avatar,
        $cv
    );
    return $candidate;
  }

  public function putCandidate(
    $id,
    $name,
    $email,
    $pwd,
    $id_planet,
    $tel,
    $avatar,
    $cv
  ) {
      $candidate = new Candidate();
      $candidate = $candidate->put(
        $id,
        $name,
        $email,
        $pwd,
        $id_planet,
        $tel,
        $avatar,
        $cv
      );
      return $candidate;
  }

  public function deleteCandidate($id)
  {
    $candidate = new Candidate();
    $candidate = $candidate->delete($id);
    return $candidate;
  }

  public function getCandidateByOfferId($id)
  {
      $candidate = new Candidate();
      $candidate = $candidate->getCandidateByOfferId($id);
      return $candidate;
  }
}