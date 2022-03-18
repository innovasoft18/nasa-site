<?php

namespace App\Controllers;

class Admin extends BaseController
{


    public function index()
    {
        echo view('includes/admin/pagina/head');
        echo view('includes/admin/pagina/scripts');
        echo view('includes/admin/menus/super_admin');
        echo view('includes/admin/pagina/footer');
        
        
    }

}
