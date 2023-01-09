<?php

namespace App;

require 'vendor/autoload.php';

use App\Controllers\JobController;
use App\Controllers\CandidateController;
use App\Controllers\AgencyController;
use App\Controllers\PlanetController;
use App\Models\Database;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

Database::$host = $_ENV['DBHOST'];
Database::$user = $_ENV['DBUSER'];
Database::$pass = $_ENV['DBPASSWORD'];
Database::$dbName = $_ENV['DBNAME'];
Database::connect();

//--------------------------------------------------------- ROUTEUR AGENCY------------------------------------------------
// return all of the agencies
if ($_SERVER['REQUEST_URI'] == '/agency') {
    $AgencyController = new AgencyController();
    $data = $AgencyController->getAllAgency();
    echo $AgencyController->ToJSON($data);
}

// return an agency by it's id
if (isset($_GET['id']) && str_contains($_SERVER['REQUEST_URI'], '/agency')) {
    $id = $_GET['id'];
    $AgencyController = new AgencyController();
    $data = $AgencyController->getAgency($id);
    echo $AgencyController->ToJSON($data);
}

// Return agencies by their home planet ID
if (isset($_GET['planet'])) {
    $id = $_GET['planet'];
    $AgencyController = new AgencyController();
    $data = $AgencyController->getAgencyByPlanetId($id);
    echo $AgencyController->ToJSON($data);
    return;
}

if (
    $_SERVER['REQUEST_METHOD'] == 'POST' &&
        str_contains($_SERVER['REQUEST_URI'], '/add-agency') &&
        !empty($_POST['name']) and
    !empty($_POST['email']) and
    !empty($_POST['pwd']) and
    !empty($_POST['ceo_name']) and
    !empty($_POST['tel']) and
    !empty($_POST['website']) and
    !empty($_POST['logo']) and
    !empty($_POST['id_planet'])
) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $ceo_name = $_POST['ceo_name'];
    $tel = $_POST['tel'];
    $website = $_POST['website'];
    $logo = $_POST['logo'];
    $id_planet = $_POST['id_planet'];

    $AgencyController = new AgencyController();
    $data = $AgencyController->postAgency(
        $name,
        $email,
        $pwd,
        $ceo_name,
        $tel,
        $website,
        $logo,
        $id_planet
    );
}

if (
    $_SERVER['REQUEST_METHOD'] == 'POST' &&
        str_contains($_SERVER['REQUEST_URI'], '/modify-agency') &&
        !empty($_POST['id']) and
    !empty($_POST['name']) and
    !empty($_POST['email']) and
    !empty($_POST['pwd']) and
    !empty($_POST['ceo_name']) and
    !empty($_POST['tel']) and
    !empty($_POST['website']) and
    !empty($_POST['logo']) and
    !empty($_POST['id_planet'])
) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $ceo_name = $_POST['ceo_name'];
    $tel = $_POST['tel'];
    $website = $_POST['website'];
    $logo = $_POST['logo'];
    $id_planet = $_POST['id_planet'];

    $AgencyController = new AgencyController();
    $data = $AgencyController->putAgency(
        $id,
        $name,
        $email,
        $pwd,
        $ceo_name,
        $tel,
        $website,
        $logo,
        $id_planet
    );
}
if (
    isset($_GET['id']) &&
    str_contains($_SERVER['REQUEST_URI'], '/delete-agency')
) {
    $id = $_GET['id'];
    $AgencyController = new AgencyController();
    $data = $AgencyController->deleteAgency($id);
    echo $AgencyController->ToJSON($data);
}

//--------------------------------------------------------- ROUTEUR CANDIDATE------------------------------------------------

if ($_SERVER['REQUEST_URI'] == '/candidate') {
    $CandidateController = new CandidateController();
    $data = $CandidateController->getAllCandidates();
    echo $CandidateController->ToJSON($data);
}

// return an Candidate by it's id
if (isset($_GET['id']) && str_contains($_SERVER['REQUEST_URI'], '/candidate')) {
    $id = $_GET['id'];
    $CandidateController = new CandidateController();
    $data = $CandidateController->getCandidate($id);
    echo $CandidateController->ToJSON($data);
}

// Return candidate by offer ID
if (
    isset($_GET['offer']) &&
    str_contains($_SERVER['REQUEST_URI'], '/candidate')
) {
    $id = $_GET['offer'];
    $CandidateController = new CandidateController();
    $data = $CandidateController->getCandidateByOfferId($id);
    echo $CandidateController->ToJSON($data);
    return;
}

// Add a new candidate
if (
    $_SERVER['REQUEST_METHOD'] == 'POST' &&
    str_contains($_SERVER['REQUEST_URI'], '/add-candidate') &&
    !empty($_POST['name']) and
    !empty($_POST['email']) and
    !empty($_POST['pwd']) and
    !empty($_POST['id_planet']) and
    !empty($_POST['tel']) and
    !empty($_POST['avatar']) and
    !empty($_POST['cv'])
) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $id_planet = $_POST['id_planet'];
    $tel = $_POST['tel'];
    $avatar = $_POST['avatar'];
    $cv = $_POST['cv'];

    $CandidateController = new CandidateController();
    $data = $CandidateController->postCandidate(
        $name,
        $email,
        $pwd,
        $id_planet,
        $tel,
        $avatar,
        $cv
    );
}

if (
    $_SERVER['REQUEST_METHOD'] == 'POST' &&
        str_contains($_SERVER['REQUEST_URI'], '/modify-candidate') &&
        !empty($_POST['id']) and
    !empty($_POST['name']) and
    !empty($_POST['email']) and
    !empty($_POST['pwd']) and
    !empty($_POST['tel']) and
    !empty($_POST['avatar']) and
    !empty($_POST['cv']) and
    !empty($_POST['id_planet'])
) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $tel = $_POST['tel'];
    $avatar = $_POST['avatar'];
    $cv = $_POST['cv'];
    $id_planet = $_POST['id_planet'];

    $CandidateController = new CandidateController();
    $data = $CandidateController->putCandidate(
        $id,
        $name,
        $email,
        $pwd,
        $id_planet,
        $tel,
        $avatar,
        $cv
    );
}

if (
    isset($_GET['id']) &&
    str_contains($_SERVER['REQUEST_URI'], '/delete-candidate')
) {
    $id = $_GET['id'];
    $CandidateController = new CandidateController();
    $data = $CandidateController->deleteCandidate($id);
    echo $CandidateController->ToJSON($data);
}


//--------------------------------------------------------- ROUTEUR JOB OFFER------------------------------------------------

if ($_SERVER['REQUEST_URI'] == '/job') {
    $jobController = new JobController();
    $data = $jobController->getAllJobs();
    echo $jobController->ToJSON($data);
}

if (isset($_GET['id']) && str_contains($_SERVER['REQUEST_URI'], '/job')) {
    $id = $_GET['id'];
    $jobController = new jobController();
    $data = $jobController->getJobOffer($id);
    echo $jobController->ToJSON($data);
}


if (isset($_GET['planet']) && str_contains($_SERVER['REQUEST_URI'], '/job')) {
    $id = $_GET['planet'];
    $jobController = new jobController();
    $data = $jobController->getJobByPlanet($id_planet);
    echo $jobController->ToJSON($data);
}

if (isset($_GET['contract']) && str_contains($_SERVER['REQUEST_URI'], '/job')) {
    $id = $_GET['contract'];
    $jobController = new jobController();
    $data = $jobController->getJobByContract($contract);
    echo $jobController->ToJSON($data);
}

if (isset($_GET['salary']) && str_contains($_SERVER['REQUEST_URI'], '/job')) {
    $id = $_GET['salary'];
    $jobController = new jobController();
    $data = $jobController->getJobBySalary($contract);
    echo $jobController->ToJSON($data);
}


if (isset($_GET['offer']) && str_contains($_SERVER['REQUEST_URI'], '/job')) {
    $id = $_GET['offer'];
    $jobController = new jobController();
    $data = $jobController->getJobByCandidate($id_candidate);
    echo $jobController->ToJSON($data);
    return;
}

if (
    $_SERVER['REQUEST_METHOD'] == 'POST' &&
    str_contains($_SERVER['REQUEST_URI'], '/add-job') &&
    !empty($_POST['title']) and
    !empty($_POST['content']) and
    !empty($_POST['id_planet']) and
    !empty($_POST['contract_type']) and
    !empty($_POST['salary']) and
    !empty($_POST['id_agency'])
) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $pwd = $_POST['pwd'];
    $id_planet = $_POST['id_planet'];
    $contract_type = $_POST['contract_type'];
    $salary = $_POST['salary'];
    $id_agency = $_POST['id_agency'];

    $jobController = new jobController();
    $data = $jobController->createJobOffer(
        $title,
        $content,
        $pwd,
        $id_planet,
        $contract_type,
        $salary,
        $id_agency
    );
}

if (
    $_SERVER['REQUEST_METHOD'] == 'POST' &&
        str_contains($_SERVER['REQUEST_URI'], '/modify-job') &&
        !empty($_POST['id']) and
    !empty($_POST['title']) and
    !empty($_POST['content']) and
    !empty($_POST['id_planet']) and
    !empty($_POST['contract_type']) and
    !empty($_POST['salary']) and
    !empty($_POST['id_agency'])
) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $pwd = $_POST['pwd'];
    $id_planet = $_POST['id_planet'];
    $contract_type = $_POST['contract_type'];
    $salary = $_POST['salary'];
    $id_agency = $_POST['id_agency'];

    $jobController = new jobController();
    $data = $jobController->modifyJobOffer(
        $id,
        $title,
        $content,
        $pwd,
        $id_planet,
        $contract_type,
        $salary,
        $id_agency
    );
}
if (
    isset($_GET['id']) &&
    str_contains($_SERVER['REQUEST_URI'], '/delete-job')
) {
    var_dump($id);
    $id = $_GET['id'];
    $jobController = new jobController();
    $data = $jobController->deleteJobOffer($id);
    echo $jobController->ToJSON($data);
}

//--------------------------------------------------------- ROUTEUR PLANET ------------------------------------------------
// Return a planet by his ID
if (isset($_GET['id']) && str_contains($_SERVER['REQUEST_URI'], '/planet')) {
    $planetController = new PlanetController();
    $data = $planetController->getPlanet($id);
    echo $planetController->ToJSON($data);
}

if ($_SERVER['REQUEST_URI'] == '/planet') {
    $planetController = new PlanetController();
    $data = $planetController->getAllPlanets();
    echo $planetController->ToJSON($data);
}

