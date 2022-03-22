<?php

namespace App\Controllers;
use App\Models\Usuarios_model;
use App\Models\Banner_model;

class Banners extends BaseController
{
    // Función para subir archivos en ruta interna del servidor y el proyecto
   public function bannersactivos(){    
        $session=session();
        if($session->get('login')){    
            
            echo view('includes/admin/pagina/head');

            if (($session->get('usuario_rol_id')==1)){
                echo view('includes/admin/menus/super_admin');
            }
            
            $bannerModel = new Banner_model();
            $data['banners'] = $bannerModel->getBanersActivos();

            echo view('includes/admin/pagina/scripts');
            echo view('includes/admin/banners/bannersactivos',$data);
        }
        else{
            echo view('includes/admin/pagina/head');        
            echo view("includes/admin/login");           
            echo view('includes/admin/pagina/scripts');   
        }
    }
}
