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
        $donnee = [
            'liste_camion' => (new Camions())->orderBy('immatriculation', 'ASC')->findAll(),
            'liste_chauffeur' => (new Chauffeurs())->orderBy('nom', 'ASC')->findAll(),
            'liste_non_paye' => (new ModelsLivraisons())->where('paiement', 'non')->find(),
        ];
        return view('utils/livraisons/liste', $donnee);
    }

    public function ajout()
    {
        $donnee = $this->request->getPost();

        $donnee['conteneur'] = strtoupper($donnee['conteneur']);
        $donnee['compagnie'] = strtoupper($donnee['compagnie']);
        $donnee['bl'] = strtoupper($donnee['bl']);
        // $donnee['do'] = strtoupper($donnee['do']);
        $donnee['eir'] = strtoupper($donnee['eir']);

        $rules = [
            'eir' => [
                'rules' => 'is_unique[livraisons.eir]',
            ],
        ];
        if (!empty($donnee['eir']) and !$this->validate($rules)) {
            return redirect()->back()->withInput()->with('notif', false)->with('message', 'EIR en doublon!');
        } else {
            $donnee['auteur'] = session()->donnee_utilisateur['email'];
            $donnee['paiement'] = ($donnee['reglement'] == "À CRÉDIT") ? 'non' : $donnee['paiement'];
            if (empty($donnee['bl'])) {
                unset($donnee['deadline']);
            }
            if ($donnee['paiement'] == 'non') {
                unset($donnee['date_paiement']);
            }
            $modele = new ModelsLivraisons();
            if ($modele->insert($donnee, false)) {
                return redirect()->back()->with('notif', true)->with('message', 'Engeristrement effectué.');
            } else {
                return redirect()->back()->with('notif', false)->with('message', 'Echec de l\'enregistrement.');
            }
        }
    }

    public function info(string $id)
    {

        $donnee = [
            'livraison' => (new ModelsLivraisons())
                ->where('conteneur', $id)
                ->select('livraisons.*, chauffeurs.prenom AS prenom_chauffeur, chauffeurs.nom AS nom_chauffeur, utilisateurs.prenom AS prenom_utilisateur, utilisateurs.nom AS nom_utilisateur')
                ->join('chauffeurs', 'livraisons.chauffeur = chauffeurs.permis')
                ->join('utilisateurs', 'livraisons.auteur = utilisateurs.email')
                ->findAll(),
        ];
        // dd($donnee);
        return view('utils/livraisons/info', $donnee);
    }

    public function supprimer(string $id)
    {
        if (!(new ModelsLivraisons())->delete($id)) {
            return redirect()->to(session()->root . '/livraisons')->with('notif', false)->with('message', 'Erreur 404.');
        } else {
            return redirect()->back()->with('notif', true)->with('message', 'Suppression réussie');
        }
    }
}
