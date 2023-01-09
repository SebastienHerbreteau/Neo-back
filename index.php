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

// ROUTER
// return all of the agencies
if ($_SERVER['REQUEST_URI'] == '/agency')
{
    $AgencyController = new AgencyController();
    $data = $AgencyController->getAllAgency();
    echo $AgencyController->ToJSON($data);
}


// return an agency by it's id
if (isset($_GET['id']) && str_contains($_SERVER['REQUEST_URI'], "/agency"))
{
    $id = $_GET['id'];
    $AgencyController = new AgencyController();
    $data = $AgencyController->getAgency($id);
    echo $AgencyController->ToJSON($data);
}

// Return agencies by their home planet ID
if (isset($_GET['planet']))
{
    $id = $_GET['planet'];
    $AgencyController = new AgencyController();
    $data = $AgencyController->getAgencyByPlanetId($id);
    echo $AgencyController->ToJSON($data);
    return;
}


if (
$_SERVER['REQUEST_METHOD'] == 'POST' &&
!empty($_POST['name']) and
!empty($_POST['email']) and
!empty($_POST['pwd']) and
!empty($_POST['ceo_name']) and
!empty($_POST['tel']) and
!empty($_POST['website']) and
!empty($_POST['logo']) and
!empty($_POST['id_planet'])
) 
{
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


