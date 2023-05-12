<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Livraisons;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Rapports extends BaseController
{
    public function livraison()
    {
        $timing = $this->request->getPost('rapport');
        $date = $this->request->getPost('date');
        $transfers = '';
        $semaine = '';
        $Mois = '';
        $Annee = '';
        switch ($timing) {

            case 'j':
                $date_decompose = $this->decomposerDate($date);
                $transfers = (new Livraisons())
                    ->where('DAY(created_at)', $date_decompose['jour'])
                    ->where('MONTH(created_at)', $date_decompose['mois'])
                    ->where('YEAR(created_at)', $date_decompose['annee'])
                    ->select('livraisons.*, chauffeurs.prenom AS prenom_chauffeur, chauffeurs.nom AS nom_chauffeur,')
                    ->join('chauffeurs', 'livraisons.chauffeur = chauffeurs.permis')
                    ->findAll();
                // dd($transfers);
                break;

            case 'h':
                $semaine = $this->getSemaine($date);
                $transfers = (new Livraisons())
                    ->where('WEEK(created_at)', $semaine)
                    ->select('livraisons.*, chauffeurs.prenom AS prenom_chauffeur, chauffeurs.nom AS nom_chauffeur,')
                    ->join('chauffeurs', 'livraisons.chauffeur = chauffeurs.permis')
                    ->findAll();
                // dd($transfers);
                break;

            case 'm':
                $Mois = $this->getMois($date);
                $transfers = (new Livraisons())
                    ->where('MONTH(created_at)', $Mois)
                    ->select('livraisons.*, chauffeurs.prenom AS prenom_chauffeur, chauffeurs.nom AS nom_chauffeur,')
                    ->join('chauffeurs', 'livraisons.chauffeur = chauffeurs.permis')
                    ->findAll();
                // dd($transfers);
                break;

            case 'a':
                $Annee = $this->getAnnee($date);
                $transfers = (new Livraisons())
                    ->where('YEAR(created_at)', $Annee)
                    ->select('livraisons.*, chauffeurs.prenom AS prenom_chauffeur, chauffeurs.nom AS nom_chauffeur,')
                    ->join('chauffeurs', 'livraisons.chauffeur = chauffeurs.permis')
                    ->findAll();
                // dd($transfers);
                break;

            default:
                return redirect()->to(session()->root)->with('notif', false)->with('message', 'Une erreur s\'est produite, veuillez rééssayer ulterieurement.');
                break;
        }


        // Récupération des transferts du mois en cours

        // Création du fichier Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Rapport transferts');

        // Entête du tableau
        $header = [
            'CONTENEURS',
            'VEHICULES',
            'CHAUFFEURS',
            'CIE',
            'ZONE/DESTIN',
            'CLIENTS',
            'TYPES',
            'LITRES',
            'DEPART',
            'RETOUR',
            'OBSERVATION',
        ];
        $sheet->fromArray($header, NULL, 'A1');

        // Corps du tableau
        $body = [];
        foreach ($transfers as $t) {
            $body[] = [
                $t['conteneur'],
                $t['camion'],
                $t['chauffeur'],
                $t['compagnie'],
                $t['zone'],
                $t['client'],
                $t['type'],
                $t['litre_carburant'],
                $t['depart'],
                $t['arrivee'],
                $t['commentaire'],
            ];
        }
        $sheet->fromArray($body, NULL, 'A2');

        // Enregistrement du fichier
        switch ($timing) {
            case 'j':
                $filename = 'RAPPORT_JOURNALIER_LIVRAISONS_DU_' . date('d-m-Y') . '.xls';
                break;
            case 'h':
                $filename = 'RAPPORT_HEBDOMADAIRE_LIVRAISONS_SEMAINE_' . $this->getSemaine($date) . '_ANNEE_' . $this->getAnnee($date) . '.xls';
                break;
            case 'm':
                $filename = 'RAPPORT_MENSUEL_LIVRAISONS_MOIS_' . $this->getMois($date) . '_ANNEE_' . $this->getAnnee($date) . '.xls';
                break;
            case 'a':
                $filename = 'RAPPORT_ANNUEL_LIVRAISONS' . '_ANNEE_' . $this->getAnnee($date) . '.xls';
                break;
            default:
                return redirect()->to(session()->root)->with('notif', false)->with('message', 'Une erreur s\'est produite, veuillez rééssayer ulterieurement.');
                break;
        }
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer = new Xls($spreadsheet);
        if ($writer->save('php://output')) {

            return redirect()->to(session()->root)->with('notif', true)->with('message', 'Téléchargement lancé.');
        }
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
