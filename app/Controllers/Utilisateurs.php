<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Utilisateurs as ModelsUtilisateurs;

class Utilisateurs extends BaseController
{
    public function profil($id)
    {
        $donnee = [
            'u' => (new ModelsUtilisateurs())->find($id)
        ];
        return view('utils/utilisateurs/profil',$donnee);
    }
}
