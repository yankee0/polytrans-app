<?php

namespace App\Controllers;

use App\Models\Livraisons;
use App\Controllers\BaseController;
use App\Models\Camions;
use App\Models\Chauffeurs;

class OpsTransport extends BaseController
{
    public function index()
    {
        session()->position = 'dashboard';
        $donnee = [
            'liste_chauffeur' => (new Chauffeurs())->findAll(),
            'liste_camion' => (new Camions())->findAll(),
            'transports_liv' => (new Livraisons())
                ->where('date_sortie', null)
                ->orWhere('date_sortie', '')
                ->where('date_retour', null)
                ->orWhere('date_retour', '')
                ->where('chauffeur', null)
                ->orWhere('chauffeur', '')
                ->where('camion', null)
                ->orWhere('camion', '')
                ->where('litre_carburant', null)
                ->orWhere('litre_carburant', '')
                ->where('bl', null)
                ->orWhere('bl', '')
                ->find()
        ];
        // dd($donnee);
        return view('pages/ops-transport/dashboard',$donnee);
    }
}
