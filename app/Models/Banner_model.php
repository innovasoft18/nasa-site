<?php

namespace App\Models;
use CodeIgniter\Model;


class Banner_model extends Model {    

    protected $table = "banner as b";
	protected $primaryKey = "banner_id";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "banner_nombre",
        "banner_ipublicacion",
        "banner_fpublicacion",
        "banner_path",
        "banner_descripcion",
        "banner_contenido_id",
        "banner_usuario_id",
        "banner_estado_id",
        "create_at","update_at"];

    public function __construct() 
    {
        parent::__construct();
    }
    
  
    
}
?>