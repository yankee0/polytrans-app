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

    public function ajout(){
        $donnee = $this->request->getVar();
        $donnee['prenom'] = ucwords($donnee['prenom']);
        $donnee['nom'] = ucwords($donnee['nom']);
        $donnee['permis'] = strtoupper($donnee['permis']);

        $rules = [
            'permis' => [
                'rules' => 'is_unique[chauffeurs.permis]|min_length[3]'
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('notif', false)->with('message', 'Identifiants en doublon.');
        }else {
            $modele = new ModelsChauffeurs();
            if ($modele->insert($donnee) == 0) {
                return redirect()->back()->with('notif', true)->with('message', 'Ajout réussi.');;
            }else{
                return redirect()->back()->with('notif', false)->with('message', 'Echec de l\'ajout.');;
            }
        }
    }
}
