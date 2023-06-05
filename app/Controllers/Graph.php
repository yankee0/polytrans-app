<?php

namespace App\Controllers;

use App\Models\Livraisons;
use App\Controllers\BaseController;

class Graph extends BaseController
{
    public function line()
    {
        //livraisons
        $modelLivraison = new Livraisons();

        $query = $modelLivraison->select('MONTH(created_at) AS mois, COUNT(*) AS nombre_livraisons')
            ->where('created_at >= DATE_FORMAT(NOW(), "%Y-01-01")')
            ->groupBy('MONTH(created_at)')
            ->get();

        $resultats = $query->getResultArray();
        $tableauResultatsLivraison = array_fill(1, 12, 0);

        foreach ($resultats as $resultat) {
            $mois = intval($resultat['mois']);
            $nombreLivraisons = intval($resultat['nombre_livraisons']);
            $tableauResultatsLivraison[$mois] = $nombreLivraisons;
        }

        $donnee = [
            'livraisons' => $tableauResultatsLivraison
        ];

        $this->response->setJSON($donnee);
        $this->response->send();
    }

    public function pie()
    {
        $donnee = [
            'livraisons' => (new Livraisons())->countAll(),
            'autres' => 1
        ];
        $this->response->setJSON($donnee);
        $this->response->send();
    }
}
