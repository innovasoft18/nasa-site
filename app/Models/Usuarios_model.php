<?php

namespace App\Models;
use CodeIgniter\Model;


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
        "create_at","update_at"];

    public function __construct() 
    {
        parent::__construct();
    }
    
    // Obtener datos de usuario a partir de usuario y contraseña
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

   
}
?>