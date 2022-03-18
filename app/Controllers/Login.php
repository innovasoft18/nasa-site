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
            return redirect()->to('/login');
        }else{
            echo view('includes/admin/pagina/head');        
            echo view("includes/admin/login");           
            echo view('includes/admin/pagina/scripts');           
        }
    }

    // Funcion de inicio de sesión
    public function InicioSesion()
    {
        echo "<pre>".print_r($this->request->getPost(),1)."</pre>";
        die();
        
        if($_POST){
            // Captura de datos formulario login
            $datos=([
                'usuario'=>$this->request->getPost('loginUsername'),
                // 'passwd'=>md5($this->request->getPost('loginPassword'))
                'passwd'=>$this->request->getPost('loginPassword')
            ]);

            // Validacion de usuario con usuario y contraseña
            $usuarioModel = new Usuarios_model();
            $data=$usuarioModel->getUsuario($datos);
            
            //Usuario o contraseña incorrecta
            if (!$data){
                $datoMsg 						= [];
                $datoMsg['descrip']	= 'Las credenciales suministradas son incorrectas. Por favor verifique e intente nuevamente.';
                $datoMsg['ruta']	= 'login';
                // Alerta de credenciales incorrectas
                echo view('includes/admin/alertas/alertasmsg', $datoMsg);
            }

            //Creación de array con los datos de la sesión
            $datases = [
                'idusuarios'    =>$data[0]->idusuarios,
                'usuario'       =>$data[0]->usuario,
                'idRoles'       =>$data[0]->idRoles,
                'login'		    => true
                                ];
            
            //Creación de sesión                    
            $session = session();
            $session->set($datases);

            // Redireccionamiento a la pagina principal del modulo de adminsitración
            return redirect()->to(IP_SERVER."adm");
        }
    }

    // Cerrar session
    public function Salir()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(IP_SERVER);
    }

}
