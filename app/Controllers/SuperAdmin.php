<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Camions;
use App\Models\Livraisons;

class SuperAdmin extends BaseController
{
    public function index()
    {
        $donnee = [
            'livraisons' => (new Livraisons())->countAll(),
            'camions' => (new Camions())->countAll(),
            'non_payes' => (new Livraisons())->where('paiement','non')->find()
        ];
        session()->set('position', 'dashboard');
        return view('pages/super-admin/dashboard', $donnee);
    }



}
