<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Livraisons;

class SuperAdmin extends BaseController
{
    public function index()
    {
        $donnee = [
            'livraisons' => (new Livraisons())->countAll(),
        ];
        session()->set('position','dashboard');
        return view('pages/super-admin/dashboard',$donnee);
    }
}
