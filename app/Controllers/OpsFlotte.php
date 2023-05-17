<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Camions;
use App\Models\Chauffeurs;

class OpsFlotte extends BaseController
{
    public function index()
    {
        session()->position = 'dashboard';   
        return view('pages/opsFlotte/dashboard',[
            'camions' => (new Camions())->countAll(),
            'chauffeurs' => (new Chauffeurs())->countAll(),
        ]);
    }
}
