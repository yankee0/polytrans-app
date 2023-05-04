<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Utilisateurs as ModelsUtilisateurs;

class Utilisateurs extends BaseController
{
    public function profil(int $id)
    {
        $utilisateur = (new ModelsUtilisateurs())->find($id);
        if ($utilisateur) {
            
            $donnee = [
                'u' => (new ModelsUtilisateurs())->find($id)
            ];
            return view('utils/utilisateurs/profil',$donnee);
        } else {
            return view('errors/html/error_404',[
                'message' => 'Cette utilisateur n\'existe pas',
            ]);
        }
    }
}
