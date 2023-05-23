<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Camions;
use App\Models\Chauffeurs as ModelsChauffeurs;

class Chauffeurs extends BaseController
{
    public function liste()
    {
        session()->position = 'chauffeurs';
        $donnee = [
            'liste' => (new ModelsChauffeurs())->orderBy('nom', 'ASC')->findAll(),
            'camions' => (new Camions())->orderBy('immatriculation')->findAll(),
        ];
        return view('utils/chauffeurs/liste', $donnee);
    }

    public function ajout()
    {
        $donnee = $this->request->getVar();
        // dd($donnee);
        $donnee['prenom'] = ucwords($donnee['prenom']);
        $donnee['nom'] = ucwords($donnee['nom']);

        $rules = [
            'tel' => [
                'rules' => 'is_unique[chauffeurs.tel]|min_length[3]'
            ]
        ];
        $donnee['camion'] = (empty($donnee['camion'])) ? null : $donnee['camion'];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('notif', false)->with('message', 'Identifiants en doublon.');
        } else {
            $modele = new ModelsChauffeurs();
            if ($modele->insert($donnee) == 0) {
                return redirect()->back()->with('notif', true)->with('message', 'Ajout réussi.');
            } else {
                return redirect()->back()->with('notif', false)->with('message', 'Echec de l\'ajout.');
            }
        }
    }

    public function supprimer()
    {
        $id = $this->request->getVar('id');
        $modele = new ModelsChauffeurs();
        if ($modele->delete($id)) {
            return redirect()->back()->with('notif', true)->with('message', 'Suppression réussie.');
        } else {
            return redirect()->back()->with('notif', false)->with('message', 'Echec de la suppression.');
        }
    }

    public function supprimer_groupe()
    {
        $ids = $this->request->getVar('liste');
        $modele = new ModelsChauffeurs();
        if ($modele->delete($ids)) {
            return redirect()->back()->with('notif', true)->with('message', 'Suppressions réussies.');
        } else {
            return redirect()->back()->with('notif', false)->with('message', 'Echec des suppressions.');
        }
    }

    public function modifier(string $tel)
    {
        $modele = new ModelsChauffeurs();
        $donnee = [
            'chauffeur' => $modele->find($tel),
            'camions' => (new Camions())->orderBy('immatriculation')->findAll(),

        ];
        return view('utils/chauffeurs/modifier', $donnee);
    }

    public function enregistrer()
    {
        $donnee = $this->request->getVar();
        $donnee['prenom'] = ucwords($donnee['prenom']);
        $donnee['nom'] = ucwords($donnee['nom']);

        $rules = [
            'tel' => [
                'rules' => 'is_unique[chauffeurs.tel,tel,' . $donnee['last_tel'] . ']|min_length[3]'
            ]
        ];
        $donnee['camion'] = (empty($donnee['camion'])) ? null : $donnee['camion'];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('notif', false)->with('message', 'Identifiants en doublon.');
        } else {
            $modele = new ModelsChauffeurs();
            $requete = "UPDATE chauffeurs SET prenom = ?, nom = ?, tel = ? , camion = ? WHERE tel = ?";
            if (
                $modele->query(
                    $requete,
                    [
                        $donnee['prenom'],
                        $donnee['nom'],
                        $donnee['tel'],
                        $donnee['camion'],
                        $donnee['last_tel']
                    ]
                )
            ) {
                return redirect()->to(session()->root . '/chauffeurs')->with('notif', true)->with('message', 'Modification réussie.');
            } else {
                return redirect()->back()->with('notif', false)->with('message', 'Echec de la modification.');
            }
        }
    }
}
