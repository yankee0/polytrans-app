<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Livraisons;

class OpsMvt extends BaseController
{
    public function index()
    {
        session()->position = 'dashboard';
        $donnee = [
            'non_eir_bl' => (new Livraisons())
                ->where('eir', null)
                ->orWhere('eir', '')
                ->where('bl', null)
                ->orWhere('bl', '')
                ->findAll()
        ];
        return view('pages/opsMvt/dashboard', $donnee);
    }
}
