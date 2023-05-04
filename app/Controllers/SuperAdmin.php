<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SuperAdmin extends BaseController
{
    public function index()
    {
        session()->set('position','dashboard');
        return view('pages/super-admin/dashboard');
    }
}
