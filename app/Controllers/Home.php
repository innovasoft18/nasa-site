<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('includes/head');
        echo view('includes/loader');
        echo view('includes/navbar');
        echo view('includes/pantalla');
        echo view('includes/footer');
    }

}
