<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OpsFinance extends BaseController
{
    public function index()
    {
        return view('pages/ops-finance/dashboard');
    }
}
