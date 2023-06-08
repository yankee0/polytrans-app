<?php

namespace App\Controllers;

use App\Models\Camions;
use App\Models\Chauffeurs;
use App\Models\Livraisons;
use App\Controllers\BaseController;

class OpsMvt extends BaseController
{
    public function index()
    {
        session()->position = 'dashboard';
        $donnee = [
            'livraisons' => (new Livraisons())->countAll(),
            'camions' => (new Camions())->countAll(),
            'liste_camion' => (new Camions())->orderBy('immatriculation', 'ASC')->findAll(),
            'liste_chauffeur' => (new Chauffeurs())->orderBy('nom', 'ASC')->findAll(),
            'non_eir_bl' => (new Livraisons())
                ->where('eir', null)
                ->orWhere('eir', '')
                ->orWhere('eir', 'NON OK')
                ->findAll()
        ];
        // dd($donnee);
        return view('pages/opsMvt/dashboard', $donnee);
    }
}
