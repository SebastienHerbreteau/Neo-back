<?php
namespace App\Controllers;

use App\Models\Agency;
use App\Controllers\Controller;

class AgencyController extends Controller
{
    public function getAllAgency()
    {
        $agencies = new Agency();
        $agencies = $agencies->getAllAgency();
        return $agencies;
    }

    public function getAgency($id)
    {
        $agency = new Agency();
        $agency = $agency->getAgency($id);
        return $agency;
    }

    public function getAgencyByPlanetId($id)
    {
        $agency = new Agency();
        $agency = $agency->getAgencyByPlanetId($id);
        return $agency;
    }

    public function postAgency(
        $name,
        $email,
        $pwd,
        $ceo_name,
        $tel,
        $website,
        $logo,
        $id_planet
    ) {
        $agency = new Agency();
        $agency = $agency->add(
            $name,
            $email,
            $pwd,
            $ceo_name,
            $tel,
            $website,
            $logo,
            $id_planet
        );
        return $agency;
    }
}
