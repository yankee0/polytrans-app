<?php

namespace App\Controllers;

use App\Models\Camions;
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
            'non_eir_bl' => (new Livraisons())
                ->where('eir', null)
                ->orWhere('eir', '')
                ->where('bl', null)
                ->orWhere('bl', '')
                ->findAll()
        ];
        // dd($donnee);
        return view('pages/opsMvt/dashboard', $donnee);
    }
}
