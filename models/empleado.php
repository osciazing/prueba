<?php 
	
 //require_once($_SERVER["DOCUMENT_ROOT"]."/pdf/fpdf.php");
 //error_reporting(E_ALL);
 class Empleado{
	
	public $id;	
	public $nombre;	
	public $idremoto;	
	public $edad;	
	public $salario;	
	public $idtiposalario;	
	public $fecharegistro;	
	public $imagen;	
	public $obj;
	public $fields=['id','nombre','idremoto','edad','salario','idtiposalario','fecharegistro','imagen'];
 	public function __construct()
	{
		$this->obj=new db();
 	}
 	
	public function get($where=FALSE,$fields=" * ",$order=FALSE,$group=FALSE,$limit=FALSE){  
		$nweres="";
		if(is_array($where)){
			$nw=[];
			$nweres="";
			foreach($where as $cardinal=>$w){
				foreach($w as $field=>$val){  
					if(in_array($field,$this->fields)){
						$equal="=";
						$value=$val;
						if(is_array($val)){
							$equal=$val[0];
							$value=$val[1];
						}
						$nw[]=$field.$equal.$value;
					}
				}
				 
				$nweres.=join(" ".$cardinal." ",$nw);
			}
		}
 		$pruebas=$this->obj->select("empleado",$nweres,"",$fields);
		 
		return $pruebas;    
   	}
	public function add($set){     
 		$pruebas=$this->obj->insert("empleado",$set);
    }
	public function edit($set,$where){     
 		
		$this->obj->update("empleado", $set, $where);
		
   	}
	public function del($where){     
 		
		$this->obj->delete("empleado",  $where); 
		
   	}
 
}