<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('templates/admin_template');
    }
}
