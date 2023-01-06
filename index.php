<?php

namespace App;

require 'vendor/autoload.php';

use App\Controllers\Controller;
use App\Controllers\AgencyController;
use App\Models\Database;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

Database::$host = $_ENV['DBHOST'];
Database::$user = $_ENV['DBUSER'];
Database::$pass = $_ENV['DBPASSWORD'];
Database::$dbName = $_ENV['DBNAME'];
Database::connect();

try {
    if ($_SERVER['REQUEST_URI'] === '/agency') {
        if (isset($_GET['agency_id'])) {
            $id = $_GET['agency_id'];
            $AgencyController = new AgencyController();
            $data = $AgencyController->getAgency($id);
            echo $AgencyController->ToJSON($data);
        }
        if (isset($_GET['agency_by_planet'])) {
            echo 'success';
            $id = $_GET['agency_by_planet'];
            $AgencyController = new AgencyController();
            $data = $AgencyController->getAgencyByPlanetId($id);
            echo $AgencyController->ToJSON($data);
        } else {
            $AgencyController = new AgencyController();
            $data = $AgencyController->getAllAgency();
            echo $AgencyController->ToJSON($data);
        }
    }

    //     $name = $_GET['name'];
    //     $email = $_GET['email'];
    //     $pwd = $_GET['pwd'];
    //     $ceo_name = $_GET['ceo_name'];
    //     $tel = $_GET['tel'];
    //     $website = $_GET['website'];
    //     $logo = $_GET['logo'];
    //     $id_planet = $_GET['id_planet'];

    // ?name=aze&email=aze&pwd=aze&ceo_name=aze&tel=123&website=AZE&$logo=url&id_planet=1

    //     $name,
    //     $email,
    //     $pwd,
    //     $ceo_name,
    //     $tel,
    //     $website,
    //     $logo,
    //     $id_planet
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    /* envoyer JSON erreur*/
}
