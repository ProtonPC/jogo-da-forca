<?php

namespace App\Http\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        return $this->view('dashboard/index.html', [
            'data' => 'dados',
        ]);
    }
}
