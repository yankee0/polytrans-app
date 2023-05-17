<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OpsFlotte extends BaseController
{
    public function index()
    {
        return view('pages/opsFlotte/dashboard');
    }
}
