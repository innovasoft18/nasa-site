<?php

namespace App\Models;
use CodeIgniter\Model;
use App\Models\Roles_model;


class Usuarios_model extends Model {    

    protected $table = "usuarios as u";
	protected $primaryKey = "usuario_id";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "usuario_nombre",
        "usuario_apellidos",
        "usuario_usuario",
        "usuario_correo",
        "usuario_contrasena",
        "usuario_foto",
        "usuario_estado_id",
        "usuario_rol_id",
        "usuario_ciudad",
        "usuario_telefono",
        "create_at","update_at"];

    public function __construct() 
    {
        parent::__construct();
    }
    
    // Obtener datos de usuario a partir de usuario y contraseña para inicio de sesion
    public function getUsuario($data=null)
    {           
        $builder = $this->db
                        ->table($this->table)
                        ->select('u.usuario_id,u.usuario_usuario,u.usuario_contrasena,u.usuario_rol_id')                        
                        ->where('u.usuario_usuario =', $data['usuario'])
                        ->where('u.usuario_contrasena =', $data['passwd']);
        $query   = $builder->get()->getResult(); 
       
       return $query;        
    } 

    // Obtener datos de usuario para pagina de perfil
    public function getPerfil($data = null)
    {
        $builder = $this->db
            ->table($this->table)
            ->join('roles AS r', 'u.usuario_rol_id = rol_estado_id', 'INNER')
            ->where('u.usuario_id =', $data);
        $query   = $builder->get()->getResult(); 

        return $query; 
    }

    // Actualzar usuario
    public function updatePerfil($data = null)
    {       
        if (!empty($data['usuario_foto'])){
            $update = [
                'u.usuario_correo' => $data['usuario_correo'],
                'usuario_telefono' => $data['usuario_telefono'],            
                'usuario_foto'     => "writable/uploads/images/perfil/".$data['usuario_foto'],
                'update_at' => TIMESTAMP
            ];

        }else{
            $update = [
                'u.usuario_correo' => $data['usuario_correo'],
                'usuario_telefono' => $data['usuario_telefono'],            
                'update_at' => TIMESTAMP
            ];
        }
 
        $this->db
                    ->table($this->table)
                    ->where('usuario_id', $data['usuario_id'])
                    ->set($update)
                    ->update();
    }

    // Actualzar contraseña de usuario
    public function updatecontrasena($data = null)
    {       
        $update = [
                'u.usuario_contrasena' => $data['usuario_contrasena'],         
                'update_at' => TIMESTAMP
            ];     

            // echo "modelo updatecontrasena";
            // echo "</pre>".print_r($data,1)."</pre>";
            // die();

 
        $this->db
                    ->table($this->table)
                    ->where('usuario_id', $data['usuario_id'])
                    ->set($update)
                    ->update();
    }

   
}
?>