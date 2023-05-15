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
            'liste' => $modele->orderBy('immatriculation', 'ASC')->findAll()
        ];
        return view('utils/camions/liste', $donnee);
    }

    public function ajout()
    {
        $donnee = $this->request->getPost();
        $rules = [
            'immatriculation' => [
                'rules' => 'is_unique[camions.immatriculation]|min_length[3]',
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->with('notif', false)->with('message', 'Identifiants en doublons.');
        } else {
            $donnee['immatriculation'] = strtoupper($donnee['immatriculation']);
            if ((new ModelsCamions())->insert($donnee)) {
                return redirect()->back()->with('notif', true)->with('message', 'Ajout réussi.');
            } else {
                return redirect()->back()->with('notif', false)->with('message', 'Echec de l\'ajout.');
            }
        }
    }

    public function supprimer()
    {
        $id = $this->request->getVar('id');
        $modele = new ModelsCamions();
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
        $modele = new ModelsCamions();

        if ($modele->delete($ids)) {
            return redirect()->back()->with('notif', true)->with('message', 'Suppressions réussies.');
        } else {
            return redirect()->back()->with('notif', false)->with('message', 'Echec des suppressions.');
        }
    }

    public function modifier(string $id)
    {
        $donnee = [
            'camion' => (new ModelsCamions())->find($id),
        ];
        return view('utils/camions/modifier', $donnee);
    }

    public function enregistrer()
    {
        $donnee = $this->request->getPost();
        $rules = [
            'immatriculation' => [
                'rules' => 'is_unique[camions.immatriculation,immatriculation,' . $donnee['immatriculation'] . ']|min_length[3]',
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->with('notif', false)->with('message', 'Identifiants en doublons.');
        } else {
            $modele = new ModelsCamions();
            // dd($donnee);
            $requete = "UPDATE camions SET immatriculation = ? WHERE id = ?";

            if ($modele->query($requete, [strtoupper($donnee['immatriculation']), $donnee['id']])) {
                return redirect()->to(session()->root . '/camions')->with('notif', true)->with('message', 'Modification réussie.');
            } else {
                return redirect()->back()->with('notif', false)->with('message', 'Echec de la modification.');
            }
        }
    }

    public function dossier()
    {
        return 'Gotta finish';
    }
}
