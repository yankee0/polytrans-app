<?php

namespace App\Controllers;

use App\Models\Camions;
use App\Models\Livraisons;
use App\Controllers\BaseController;

class OpsFinance extends BaseController
{
    public function index()
    {
        session()->position = 'dashboard';
        $donnee = [
            'livraisons' => (new Livraisons())->countAll(),
            'camions' => (new Camions())->countAll(),
            'non_payes' => (new Livraisons())
                ->where('paiement', 'non')
                ->findAll()
        ];
        return view('pages/ops-finance/dashboard',$donnee);
    }
}
