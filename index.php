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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        echo $AgencyController->ToJSON($data);
    }
}
