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

    public function ajout(){
        $donnee = $this->request->getPost();
        $rules = [
            'immatriculation' => [
                'rules' => 'is_unique[camions.immatriculation]|min_length[3]',
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->with('notif',false)->with('message','Identifiants en doublons');
        } else {
            $donnee['immatriculation'] = strtoupper($donnee['immatriculation']);
            if ((new ModelsCamions())->insert($donnee) == 0) {
                return redirect()->back()->with('notif',true)->with('message','Ajout réussi.');
            }else{
                return redirect()->back()->with('notif',false)->with('message','Echec de l\'ajout.');
            }
        }
    }
}
