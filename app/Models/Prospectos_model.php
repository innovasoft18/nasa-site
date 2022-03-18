<?php

namespace App\Models;
use CodeIgniter\Model;


class Prospectos_model extends Model {    

    protected $table = "prospectos as P";
	protected $primaryKey = "prospecto_id";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "prospecto_nombre1",
        "prospecto_nombre2",
        "prospecto_apellido1",
        "prospecto_apellido2",
        "prospecto_correo",
        "prospecto_telefono",
        "prospecto_estado_id",
        "create_at","update_at"];

    public function __construct() 
    {
        parent::__construct();
    }
    
  
    
}
?>