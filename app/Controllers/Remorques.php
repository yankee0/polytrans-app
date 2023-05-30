<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Remorques as Modelsremorques;


class Remorques extends BaseController
{
    public function liste()
    {
        session()->position = 'remorques';
        $modele = new Modelsremorques();
        $donnee = [
            'liste' => $modele->orderBy('immatriculation', 'ASC')->findAll()
        ];
        return view('utils/remorques/liste', $donnee);
    }

    public function ajout()
    {
        $donnee = $this->request->getPost();
        $rules = [
            'immatriculation' => [
                'rules' => 'is_unique[remorques.immatriculation]|min_length[3]',
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->with('notif', false)->with('message', 'Identifiants en doublons.');
        } else {
            $donnee['immatriculation'] = strtoupper($donnee['immatriculation']);
            if ((new Modelsremorques())->insert($donnee)) {
                return redirect()->back()->with('notif', true)->with('message', 'Ajout réussi.');
            } else {
                return redirect()->back()->with('notif', false)->with('message', 'Echec de l\'ajout.');
            }
        }
    }

    public function supprimer()
    {
        $id = $this->request->getVar('id');
        $modele = new Modelsremorques();
        if ($modele->delete($id)) {
            return redirect()->back()->with('notif', true)->with('message', 'Suppression réussie.');
        } else {
            return redirect()->back()->with('notif', false)->with('message', 'Echec de la suppression.');
        }
    }

    public function supprimer_groupe()
    {
        $ids = $this->request->getPost('liste');
        // dd($ids);
        $modele = new Modelsremorques();

        if ($modele->delete($ids)) {
            return redirect()->back()->with('notif', true)->with('message', 'Suppressions réussies.');
        } else {
            return redirect()->back()->with('notif', false)->with('message', 'Echec des suppressions.');
        }
    }

    public function modifier(string $id)
    {
        $donnee = [
            'remorque' => (new Modelsremorques())->where('immatriculation',$id)->first(),
        ];
        return view('utils/remorques/modifier', $donnee);
    }

    public function enregistrer()
    {
        $donnee = $this->request->getPost();
        $rules = [
            'immatriculation' => [
                'rules' => 'is_unique[remorques.immatriculation,immatriculation,' . $donnee['immatriculation'] . ']|min_length[3]',
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->with('notif', false)->with('message', 'Identifiants en doublons.');
        } else {
            $modele = new Modelsremorques();
            // dd($donnee);
            $requete = "UPDATE remorques SET immatriculation = ? WHERE id = ?";

            if ($modele->query($requete, [strtoupper($donnee['immatriculation']), $donnee['id']])) {
                return redirect()->to(session()->root . '/remorques')->with('notif', true)->with('message', 'Modification réussie.');
            } else {
                return redirect()->back()->with('notif', false)->with('message', 'Echec de la modification.');
            }
        }
    }

    public function dossier($id)
    {

        $c = (new Modelsremorques())->find($id);

        if (!$c){
            return view('errors/html/error_404', [
                'message' => 'Cette utilisateur n\'existe pas',
            ]);
        } else {

            return view('utils/remorques/dossier',[
                'remorque'=> $c
            ]);
        }
        
    }
}
