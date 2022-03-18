<?php

namespace App\Models;
use CodeIgniter\Model;


class Noticias_model extends Model {    

    protected $table = "noticias as n";
	protected $primaryKey = "noticia_id";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "noticia_titulo",
        "noticia_contenido",
        "noticia_ipublicacion",
        "noticia_fpublicacion",
        "noticia_adjunto",
        "noticia_contenido_id",
        "noticia_usuario_id",
        "estados_estado_id",
        "create_at","update_at"];

    public function __construct() 
    {
        parent::__construct();
    }
    
  
    
}
?>