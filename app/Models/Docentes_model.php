<?php

namespace App\Models;
use CodeIgniter\Model;


class Docentes_model extends Model {    

    protected $table = "eventos as ev";
	protected $primaryKey = "docente_id";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "docente_nombres",
        "docente_apellidos",
        "docente_facebook",
        "docente_instagram",
        "docente_youtube",
        "docente_linkedin",
        "docente_foto",
        "docente_titulo",
        "docente_puestoactual",
        "docente_educacion",
        "docente_descripcion",
        "docente_pagina",
        "docente_estado_id",
        "docente_usuario_id",
        "create_at","update_at"];

    public function __construct() 
    {
        parent::__construct();
    }
    
  
    
}
?>