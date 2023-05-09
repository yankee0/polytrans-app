<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Camions;
use App\Models\Chauffeurs;
use App\Models\Livraisons as ModelsLivraisons;

class Livraisons extends BaseController
{
    public function liste()
    {
        session()->position = "livraisons";
        $donnee =[
            'liste_camion' => (new Camions())->orderBy('immatriculation','ASC')->findAll(),
            'liste_chauffeur' => (new Chauffeurs())->orderBy('nom','ASC')->findAll(),
            'liste_non_paye' => (new ModelsLivraisons())->where('paiement','non')->find(),
        ];
        return view('utils/livraisons/liste',$donnee);
    }

    public function ajout(){
        $donnee = $this->request->getPost();
        unset($donnee['csrf_test_name']);
        foreach ($donnee as $d) {
            $d = strtoupper($d);
        }
        $rules = [
            'eir' => [
                'rules' => 'is_unique[livraisons.eir]',
            ],
        ];
        if (!empty($donnee['eir']) and !$this->validate($rules)) {
            return redirect()->back()->withInput()->with('notif',false)->with('message','EIR en doublon!');
        } else {
            $donnee['auteur'] = session()->donnee_utilisateur['email'];
            $donnee['paiement'] = ($donnee['reglement'] == "À CRÉDIT") ? 'non' : $donnee['paiement'];
            $modele = new ModelsLivraisons();
            // $op = $modele->insert($donnee);
            // dd($op);
            if ($modele->insert($donnee,false)) {
                return redirect()->back()->with('notif',true)->with('message','Engeristrement effectué.');
            }else {
                return redirect()->back()->with('notif',false)->with('message','Echec de l\'enregistrement.');
            }
        }
    }
}
