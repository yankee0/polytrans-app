<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Camions;
use App\Models\Chauffeurs;
use App\Models\Livraisons as ModelsLivraisons;

class Livraisons extends BaseController
{
    public function liste()
    {
        session()->position = "livraisons";
        $donnee =[
            'liste_camion' => (new Camions())->orderBy('immatriculation','ASC')->findAll(),
            'liste_chauffeur' => (new Chauffeurs())->orderBy('nom','ASC')->findAll()
        ];
        return view('utils/livraisons/liste',$donnee);
    }
}
