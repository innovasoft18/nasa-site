<?php

namespace App\Controllers;
use App\Models\Usuarios_model;
use App\Models\Banner_model;
use App\Models\Otros_model;

class Banners extends BaseController
{
    // Función mostrar los banner activos, con y sin filtros de fechas
   public function bannersactivos(){    
        $session=session();
        if($session->get('login')){    
            
            echo view('includes/admin/pagina/head');
            $fechaini=$this->request->getPost('fechaini');
            $fechafin=$this->request->getPost('fechafin');
            
            if (($session->get('usuario_rol_id')==1)){
                echo view('includes/admin/menus/super_admin');
            }

            $bannerModel = new Banner_model();
                    
            if($fechaini && $fechafin){
                $data['banners'] = $bannerModel->getBanersFechas($fechaini,$fechafin,1);
                $data['fechaini'] = $fechaini;
                $data['fechafin'] = $fechafin;
                echo view('includes/admin/banners/bannersactivos',$data);
            }else{
                $data['banners'] = $bannerModel->getBaners(1);
                echo view('includes/admin/banners/bannersactivos',$data);
            }

            echo view('includes/admin/pagina/scripts');
        }
        else{
            echo view('includes/admin/pagina/head');        
            echo view("includes/admin/login");           
            echo view('includes/admin/pagina/scripts');   
        }
    }

    // Función para crear un banner nuevo
   public function bannerscrear(){    
    $session=session();
    if($session->get('login')){    
        // Obtener la data del banner
        $banner_path = $this->request->getFile("banner_path");  
    //     echo "</pre>".print_r($banner_path,1)."</pre>";
    //  die();

        // echo "</pre>".print_r($banner_path,1)."</pre>";
        //  die();       

        if($_FILES["banner_path"]["error"] == 0){              
        // if(!empty($banner_path)){              
            // genrar nombre random para el banner
            $bannername = $banner_path->getRandomName(); 
            
            // Array de datos que se agregaran en la BD
            $datos=([
                'banner_nombre'             =>$this->request->getPost('banner_nombre'),                
                'banner_ipublicacion'       =>$this->request->getPost('banner_ipublicacion'),
                'banner_fpublicacion'       =>$this->request->getPost('banner_fpublicacion'),
                'banner_path'               =>'writable/uploads/images/banners/'.$bannername,
                'banner_descripcion'        =>$this->request->getPost('banner_descripcion'),
                'banner_usuario_id'         =>$session->get('usuario_id'),
                'banner_contenido_id'       =>'1',
                'create_at'                 =>TIMESTAMP

            ]);

            // Llamado a la funcion de Otrod para subir foto en ruta del servidor
            $foto = new Otros();
            if(!empty($bannername)){
                $foto->cargarFoto($banner_path,$bannername,2);
            }      
            
            $bannerModel = new Banner_model();
            $bannerModel ->setBanner($datos);

            echo "ok";
        }else{
            echo "error";
        }
        
    }
    else{
        echo view('includes/admin/pagina/head');        
        echo view("includes/admin/login");           
        echo view('includes/admin/pagina/scripts');   
    }
}
}
