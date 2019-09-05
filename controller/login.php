<?php 
	
 //require_once($_SERVER["DOCUMENT_ROOT"]."/pdf/fpdf.php");
require_once(CLASS_DIR."class.db.php");
//error_reporting(E_ALL);
ini_set('display_errors', '1'); 
class Action 
{
	
 	public $service;	
	public $obj; 
 	public function __construct()
	{
 
		
		$this->obj=new db();
		 
 	 
 	}
 	
	public function init(){    
 		$modelEmp=$this->obj->tableregistrer("empleado");
		$getEmpleado=$modelEmp->get(FALSE,"id,nombre,idremoto");
		
 		$serviceDecode=$getEmpleado; 
		
		foreach($serviceDecode as $idt=>$empT){  
			 $serviceDecode[$idt]=(object)$empT;
			 
		}
		 $error=0; 
 		$template="login";  
		include(CONTENT_VIEW."login.php");     
		
   	}
	public function login(){    
		 if(isset($_POST["usuario"],$_POST["clave"])){
			 if($_POST["usuario"]=="admin" and $_POST["clave"]=="admin"){
				 $_SESSION["id"]=1;
				 header("location:?mode=importar");
			 }
		 }else{
			 $error=1;
			$template="login";  
			include(CONTENT_VIEW."login.php");     

		 }
	}
	public function logout(){
		unset($_SESSION["id"]);
		 header("location:?mode=login");
	}
	 
 
}