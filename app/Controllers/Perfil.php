<?php

namespace App\Controllers;
use App\Models\Usuarios_model;
USE App\Controllers\Otros;

class Perfil extends BaseController
{

    // Función que carga la pantalla login
    public function perfil()
    {
        $session=session();
        if($session->get('login')){       
            echo view('includes/admin/pagina/head');
            
            $usuarioModel = new Usuarios_model();
            $data['usuario'] = $usuarioModel->getPerfil($session->get('usuario_id'));
            
            if (($session->get('usuario_rol_id')==1)){
                echo view('includes/admin/menus/super_admin');
            }
            
            echo view('includes/admin/perfil',$data);
            echo view('includes/admin/pagina/scripts');
            echo view('includes/admin/pagina/footer');
        }else{
            echo view('includes/admin/pagina/head');        
            echo view("includes/admin/login");           
            echo view('includes/admin/pagina/scripts');           
        }
    }

    // Funcion para la transición de la actualziación de los usuarios
    public function actualizarusuario()
    {
        $session=session();
        if($session->get('login')){ 
            // Obtener la data del la foto
            $usuario_foto = $this->request->getFile("usuario_foto");  

            // Validación de la actualización con o sin foto
            // Con foto
            if($_FILES["usuario_foto"]["error"] == 0){              
                // genrar nombre random para la foto
                $fotoname = $usuario_foto->getRandomName(); 
                
                // Array de datos que se actualizarán en la BD (con foto)
                $datos=([
                    'usuario_telefono'  =>$this->request->getPost('usuario_telefono'),                
                    'usuario_correo'    =>$this->request->getPost('usuario_correo'),
                    'usuario_id'        =>$session->get('usuario_id'),
                    'usuario_foto'      =>$fotoname
                ]);

                // Llamado a la funcion de Otrod para subir foto en ruta del servidor
                $foto = new Otros();
                if(!empty($fotoname)){
                    $foto->cargarFoto($usuario_foto,$fotoname);
                }
            }else{
                // sin foto
                // Array de datos que se actualizarán en la BD (sin foto)
                $datos=([
                    'usuario_telefono'  =>$this->request->getPost('usuario_telefono'),                
                    'usuario_correo'    =>$this->request->getPost('usuario_correo'),
                    'usuario_id'        =>$session->get('usuario_id')
                ]);
            }
            
            // Actualización a la base de datos con la data almecenada en la variable $datos
            $usuarioModel = new Usuarios_model();
            $datos['usuario'] = $usuarioModel->updatePerfil($datos);
            
            echo view('includes/admin/pagina/head');  
            echo view('includes/admin/pagina/scripts');
            return redirect()->to('/perfil');
        }else{
            echo view('includes/admin/pagina/head');        
            echo view("includes/admin/login");           
            echo view('includes/admin/pagina/scripts');           
        }
    }

    //Funcion para actualizar la contraseña del usuario
    public function actualizarc()
    {
        $session=session();        
        if($session->get('login')){ 
            
            //Obtener los datos enviados por el post
            $datos=([
                'usuario_contrasena'  =>md5($this->request->getPost('usuario_contrasena')),
                'usuario_id'        =>$session->get('usuario_id')
            ]);
            
            // 
            $usuarioModel = new Usuarios_model();
            $usuarioModel->updatecontrasena($datos);

            echo view('includes/admin/pagina/head');  
            echo view('includes/admin/pagina/scripts');
            return redirect()->to('/perfil');


        }else{
            echo view('includes/admin/pagina/head');        
            echo view("includes/admin/login");           
            echo view('includes/admin/pagina/scripts');           
        }
    }

    

}
  