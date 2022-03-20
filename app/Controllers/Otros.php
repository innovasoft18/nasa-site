<?php

namespace App\Controllers;

class Otros extends BaseController
{
    // Función para subir archivos en ruta interna del servidor y el proyecto
   public function cargarFoto($foto=null, $fotoname){    
        $session=session();
        if($session->get('login')){                
                if($foto->isValid()){
                    $foto->move(WRITEPATH."uploads/images/perfil",$fotoname);
                }else{
                    echo view("");
                }
        }
        else{
            echo view("errors/html/error_404");
        }
    }
}
