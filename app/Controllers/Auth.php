<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Utilisateurs;

class Auth extends BaseController
{
    public function index()
    {
        return view('pages/se_connecter');
    }

    public function se_connecter()
    {

        $identifiants = $this->request->getPost();

        $modele = new Utilisateurs();

        $resultat = $modele
            ->where('email', $identifiants['email'])
            ->where('mot_de_passe', sha1($identifiants['mot_de_passe']))
            ->first();

        if (!$resultat) {
            return redirect()->back()->with('erreurs', true);
        } else {
            session()->donnee_utilisateur = $resultat;
            return redirect()->to('/dispatcher');
        }
    }

    public function dispatcher()
    {
        $profil = session()->donnee_utilisateur['profil'];
        switch ($profil) {
            case 'SUPER ADMIN':
                return redirect()->to('/super-admin');
                break;

            default:
                $this->se_deconnecter();
                break;
        }
    }

    public function se_deconnecter()
    {
        session()->remove('donnee_utilisateur');
        return redirect()->to('/');
    }
}
