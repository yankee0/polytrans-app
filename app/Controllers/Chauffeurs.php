<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Chauffeurs as ModelsChauffeurs;

class Chauffeurs extends BaseController
{
    public function liste()
    {
        session()->position = 'chauffeurs';
        $donnee = [
            'liste' => (new ModelsChauffeurs())->orderBy('nom','ASC')->findAll(),
        ];
        return view('utils/chauffeurs/liste',$donnee);
    }
}
