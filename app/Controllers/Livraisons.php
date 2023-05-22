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
            'liste_non_paye' => (new ModelsLivraisons())->orderBy('created_at', 'DESC')->where('paiement', 'non')->find(),
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
            if (isset($donnee['reglement'])) {
                if (!isset($donnee['paiement'])) {
                    $donnee['paiement'] = '';
                }
                $donnee['paiement'] = ($donnee['reglement'] == "À CRÉDIT") ? 'non' : $donnee['paiement'];
            } else {
                $donnee['paiement'] = 'non';
            }
            if (empty($donnee['bl'])) {
                unset($donnee['deadline']);
            }
            if (isset($donnee['paiement']) and $donnee['paiement'] == 'non') {
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
        $occ = (new ModelsLivraisons())
            ->where('id', $id)
            ->first();

        //permet d'eviter des erreurs avec le join du chauffeur
        if (!empty($occ) and !empty($occ['chauffeur'])) {
            $donnee = [
                'l' => (new ModelsLivraisons())
                    ->select('livraisons.*, chauffeurs.prenom AS prenom_chauffeur, chauffeurs.nom AS nom_chauffeur, utilisateurs.prenom AS prenom_utilisateur, utilisateurs.nom AS nom_utilisateur')
                    ->join('chauffeurs', 'livraisons.chauffeur = chauffeurs.tel')
                    ->join('utilisateurs', 'livraisons.auteur = utilisateurs.email')
                    ->find($id),
            ];
        } else {
            $donnee = [
                'l' => $occ,
            ];
        }

        // dd($donnee);
        if (empty($donnee['l'])) {
            return redirect()->to(session()->root . '/livraisons')->with('notif', false)->with('message', 'Informations indisponibles ou supprimées.');
        } else {

            return view('utils/livraisons/info', $donnee);
        }
    }

    public function supprimer(string $id)
    {
        if (!(new ModelsLivraisons())->delete($id)) {
            return redirect()->to(session()->root . '/livraisons')->with('notif', false)->with('message', 'Erreur 404.');
        } else {
            return redirect()->to(session()->root . '/livraisons')->with('notif', true)->with('message', 'Suppression réussie');
        }
    }

    public function recherche()
    {

        $recherche = $this->request->getGet('recherche');
        $modele = new ModelsLivraisons();
        $resultat = $modele->like('conteneur', strtoupper('' . $recherche))->orderBy('created_at', 'DESC')->paginate(20);
        $page = $modele->pager;
        $donnee = [
            'recherche' => $recherche,
            'resultat' => $resultat,
            'page' => $page
        ];
        return view('utils/livraisons/recherche', $donnee);
    }

    public function modifier($id)
    {
        $l = (new ModelsLivraisons())->find($id);
        if (empty($l)) {
            return redirect()->back()->with('notif', false)->with('message', '404 NOT FOUND');
        } else {

            return view('utils/livraisons/modifier', [
                'l' => $l
            ]);
        }
    }

    public function enregistrer()
    {
        $donnee = $this->request->getPost();
        if (isset($donnee['bl'])) {
            $donnee['bl'] = strtoupper($donnee['bl']);
        }
        if (isset($donnee['eir'])) {
            $donnee['eir'] = strtoupper($donnee['eir']);
        }
        $requete = "UPDATE livraisons SET bl = ?, eir = ? WHERE id = ?";
        if (
            (new ModelsLivraisons())->query(
                $requete,
                [
                    $donnee['bl'],
                    $donnee['eir'],
                    $donnee['conteneur'],
                ]
            )
        ) {
            return redirect()->to(session()->root.'/livraisons/info/'.$donnee['conteneur'])->with('notif', true)->with('message', 'Mise à jour réussie.');
        } else {
            return redirect()->back()->with('notif', false)->with('message', 'Echec de la mise à jour.');
        }
    }
}
