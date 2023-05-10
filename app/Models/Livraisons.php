<?php

namespace App\Models;

use CodeIgniter\Model;

class Livraisons extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'livraisons';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'conteneur',
        'type',
        'compagnie',
        'bl',
        'scan_bl',
        'do',
        'scan_do',
        'eir',
        'scan_eir',
        'deadline',
        'client',
        'nom_contact',
        'tel_contact',
        'email_contact',
        'paiement',
        'reglement',
        'date_paiement',
        'date_sortie',
        'date_retour',
        'zone',
        'chauffeur',
        'camion',
        'commentaire',
        'depart',
        'arrive',
        'auteur',

    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
