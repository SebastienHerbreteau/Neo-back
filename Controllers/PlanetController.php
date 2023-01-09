<?php

namespace App\Controllers;

use App\Models\Planet;
use App\Controllers\Controller;

class PlanetController extends Controller
{
    public function getAllPlanets(){
        $planet = new Planet;
        $planet = $planet->getAllPlanet();
        return $planet;
    }

    public function getPlanet($id)
    {
        $planet = new Planet;
        $planet = $planet->getPlanet($id);
        return $planet;
    }

}
