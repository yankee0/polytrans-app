<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Camions as ModelsCamions;

class Camions extends BaseController
{
    public function liste()
    {
        session()->position = 'camions';
        $modele = new ModelsCamions();
        $donnee = [
            'liste' => $modele->orderBy('immatriculation','ASC')->findAll()
        ];
        return view('utils/camions/liste',$donnee);
    }
}
