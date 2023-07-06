<?php

namespace App\Controllers;

use App\Models\Livraisons;
use App\Controllers\BaseController;

class Rapports extends BaseController
{
    public function index()
    {
        session()->position = 'rapports';
        return view('utils/rapports/dashboard');
    }

    public function livraison()
    {
        $timing = $this->request->getVar('type');
        $date = $this->request->getVar('date');
        $transfers = '';
        $semaine = '';
        $Mois = '';
        $Annee = '';
        $modele = new Livraisons();

        switch ($timing) {
            case 'j':
                $date_decompose = $this->decomposerDate($date);
                $transfers = $modele
                    ->where('DAY(created_at)', $date_decompose['jour'])
                    ->where('MONTH(created_at)', $date_decompose['mois'])
                    ->where('YEAR(created_at)', $date_decompose['annee'])
                    ->find();
                $filename = 'RAPPORT_JOURNALIER_LIVRAISONS_DU_' . $date;
                // dd($transfers);
                break;

            case 'h':
                $semaine = $this->getSemaine($date);
                $transfers = $modele
                    ->where('WEEK(created_at)', $semaine)
                    ->find();
                $filename = 'RAPPORT_HEBDOMADAIRE_LIVRAISONS_SEMAINE_' . $this->getSemaine($date) . '_ANNEE_' . $this->getAnnee($date);
                // dd($transfers);
                break;

            case 'm':
                $Mois = $this->getMois($date);
                $transfers = $modele
                    ->where('MONTH(created_at)', $Mois)
                    ->find();
                $filename = 'RAPPORT_MENSUEL_LIVRAISONS_MOIS_' . $this->getMois($date) . '_ANNEE_' . $this->getAnnee($date);
                // dd($transfers);
                break;

            case 'a':
                $Annee = $this->getAnnee($date);
                $transfers = $modele
                    ->where('YEAR(created_at)', $Annee)
                    ->find();
                $filename = 'RAPPORT_ANNUEL_LIVRAISONS' . '_ANNEE_' . $this->getAnnee($date);
                // dd($transfers);
                break;

            default:
                // dd($timing);
                return redirect()->to(session()->root . '/rapports')->with('notif', false)->with('message', 'Une erreur s\'est produite, veuillez rééssayer ulterieurement.');
                break;
        }
        // Corps du tableau
        $body = [];
        // dd($transfers);
        foreach ($transfers as $t) {
            $body[] = [
                'CONTENEURS' => $t['conteneur'],
                'VEHICULES' => $t['camion'],
                'CIE' => $t['compagnie'],
                'ZONE/DESTIN' => $t['zone'],
                'CLIENTS' => $t['client'],
                'TYPES' => $t['type'],
                'LITRES' => $t['litre_carburant'],
                'DEPART' => $t['date_sortie'],
                'RETOUR' => $t['date_retour'],
                'OBSERVATION' => $t['commentaire'],
            ];
        }
        $response = [
            'data' => $body,
            'filename' => $filename
        ];
        return view('utils/rapports/table',$response);
    }

    public function decomposerDate($date)
    {
        $timestamp = strtotime($date);
        $jour = date('d', $timestamp);
        $mois = date('m', $timestamp);
        $annee = date('Y', $timestamp);
        return array('jour' => $jour, 'mois' => $mois, 'annee' => $annee);
    }

    public function getSemaine($date)
    {
        $timestamp = strtotime($date);
        $semaine = date('W', $timestamp);
        return $semaine;
    }

    public function getMois($date)
    {
        $timestamp = strtotime($date);
        $Mois = date('m', $timestamp);
        return $Mois;
    }

    public function getAnnee($date)
    {
        $timestamp = strtotime($date);
        $annee = date('Y', $timestamp);
        return $annee;
    }
}
