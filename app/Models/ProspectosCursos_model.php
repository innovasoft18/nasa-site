<?php

namespace App\Models;
use CodeIgniter\Model;


class ProspectosCursos_model extends Model {    

    protected $table = "prospectos_cursos as pc";
	
    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "prospectos_prospecto_id",
        "cursos_curso_id"];

    public function __construct() 
    {
        parent::__construct();
    }
    
  
    
}
?>