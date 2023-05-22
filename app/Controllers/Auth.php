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
            if ($resultat['compte_actif'] == 'non') {
                return redirect()->back()->with('activation', true);
            } else {
                session()->donnee_utilisateur = $resultat;
                return redirect()->to('/dispatcher');
            }
        }
    }

    public function dispatcher()
    {
        $profil = session()->donnee_utilisateur['profil'];
        switch ($profil) {
            case 'SUPER ADMIN':
                session()->set('root', '/super-admin');
                return redirect()->to('/super-admin');
                break;
            case 'OPS FLOTTE':
                session()->set('root', '/ops-flotte');
                return redirect()->to('/ops-flotte');
                break;
            case 'OPS RECEPTION':
                session()->set('root', '/ops-reception');
                return redirect()->to('/ops-reception');
                break;
            case 'OPS MVT':
                session()->set('root', '/ops-mvt');
                return redirect()->to('/ops-mvt');
                break;
            case 'OPS FINANCE':
                session()->set('root', '/ops-finance');
                return redirect()->to('/ops-finance');
                break;
            case 'OPS TRANSPORT':
                session()->set('root', '/ops-transport');
                return redirect()->to('/ops-transport');
                break;

            default:
                session()->set('root', null);
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
