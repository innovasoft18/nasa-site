<?php

namespace App\Models;
use CodeIgniter\Model;


class DocentesCursos_model extends Model {    

    protected $table = "docentes_cursos as dc";
	
    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "docentes_docente_id",
        "cursos_curso_id"];

    public function __construct() 
    {
        parent::__construct();
    }
    
  
    
}
?>