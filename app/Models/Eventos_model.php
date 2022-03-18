<?php

namespace App\Models;
use CodeIgniter\Model;


class Eventos_model extends Model {    

    protected $table = "eventos as ev";
	protected $primaryKey = "evento_id";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "evento_nombre",
        "evento_descripcion",
        "evento_link",
        "evento_finicio",
        "evento_hinicio",
        "evento_fin",
        "evento_hfin",
        "evento_encargado",
        "evento_usuario_id",
        "evento_estado_id",
        "evento_contenido_id",
        "create_at","update_at"];

    public function __construct() 
    {
        parent::__construct();
    }
    
  
    
}
?>