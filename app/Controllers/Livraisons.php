<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Livraisons as ModelsLivraisons;

class Livraisons extends BaseController
{
    public function liste()
    {
        $donnee =[
            'liste' =>  (new ModelsLivraisons())->findAll(),
        ];
        return view('utils/livraisons',$donnee);
    }
}
