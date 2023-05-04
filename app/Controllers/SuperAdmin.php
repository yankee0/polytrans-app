<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SuperAdmin extends BaseController
{
    public function index()
    {
        return view('pages/super-admin/dashboard');
    }
}
