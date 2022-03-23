<?php

namespace App\Controllers;

class Otros extends BaseController
{
    // Función para subir archivos en ruta interna del servidor y el proyecto
   public function cargarFoto($foto=null, $fotoname, $tipo){ 
       // 1: foto perfil, 2: banner   
        $session=session();
        if($session->get('login')){                
                if($foto->isValid()){
                    if ($tipo == 1){
                        $foto->move(WRITEPATH."uploads/images/perfil",$fotoname);
                    }else if ($tipo==2){
                        $foto->move(WRITEPATH."uploads/images/banners",$fotoname);
                    }
                }else{
                    echo view("");
                }
        }
        else{
            echo view("errors/html/error_404");
        }
    }
}
