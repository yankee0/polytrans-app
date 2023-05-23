<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OpsReception extends BaseController
{
    public function index()
    {
        session()->position = 'dashboard';
        return view('pages/opsReception/dashboard');
    }
}
