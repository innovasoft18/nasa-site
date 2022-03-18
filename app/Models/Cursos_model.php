<?php

namespace App\Models;
use CodeIgniter\Model;


class Cursos_model extends Model {    

    protected $table = "cursos as cu";
	protected $primaryKey = "curso_id";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "curso_nombre",
        "curso_link",
        "curso_descripcion",
        "curso_finicio",
        "curso_usuario_id",
        "curso_fin",
        "curso_estado_id",
        "create_at","update_at"];

    public function __construct() 
    {
        parent::__construct();
    }
    
  
    
}
?>