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
    
   // Obtener datos de banners
   public function getBaners($estado=null)
   {
       $builder = $this->db
           ->table($this->table)           
           ->where('b.banner_estado_id =', $estado);
           
           $query   = $builder->get()->getResult(); 
           
           return $query; 
   }

   // Obtener datos de banners con filtro de fechas
   public function getBanersFechas($fechaini=null,$fechafin=null,$estado=null)
   {     
       $builder = $this->db
            ->table($this->table)        
            ->select('*')        
            ->where('b.banner_ipublicacion >',$fechaini)
            ->where('b.banner_ipublicacion <',$fechafin)
            ->where('b.banner_estado_id =', $estado)
            ->orderBy('b.banner_id', 'DESC');
           
       $query   = $builder->get()->getResult(); 
       return $query; 
   }

   // Guardar Banner
   public function setBanner($data)
   {

    // echo "</pre>".print_r($data,1)."</pre>";
    //  die();

       $this->db->table('banner')
                   ->insert($data);    



   }

   
    
}
?>