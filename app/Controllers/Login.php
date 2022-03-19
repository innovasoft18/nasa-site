<?php

namespace App\Controllers;
use App\Models\Usuarios_model;

class Login extends BaseController
{

    // Función que carga la pantalla login
    public function index()
    {
        $session=session();
        if($session->get('login')){       
            return redirect()->to('/adm');
        }else{
            echo view('includes/admin/pagina/head');        
            echo view("includes/admin/login");           
            echo view('includes/admin/pagina/scripts');           
        }
    }

    public function iniciosesion(){
        $datos=([
            'usuario'=>$this->request->getPost('loginUsername'),                
            'passwd'=>$this->request->getPost('loginPassword')
        ]);


        $usuarioModel = new Usuarios_model();
        $data=$usuarioModel->getUsuario($datos);

        if (!$data){           
        
            return $salida="false";

        }else{           

             //Creación de array con los datos de la sesión
             $datases = [
                'u.usuario_id,'             =>$data[0]->usuario_id,
                'u.usuario_usuario'         =>$data[0]->usuario_usuario,
                'u.usuario_rol_id'          =>$data[0]->usuario_rol_id,
                'login'		                => true
                        ];
            
            //Creación de sesión                    
            $session = session();
            $session->set($datases);
        }
    }

    // Cerrar session
    public function salir()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(IP_SERVER."login");
    }

}
 