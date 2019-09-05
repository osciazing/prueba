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
 
		$this->service=file_get_contents("http://dummy.restapiexample.com/api/v1/employees"); 
		$this->obj=new db();
		 
 	 
 	}
 	
	public function init(){     
 		$modelEmp=$this->obj->tableregistrer("empleado");
		$getEmpleado=$modelEmp->get(["and"=>["id"=>[">",0]]]);
		$serviceDecode=json_decode($this->service);
		printVar($getEmpleado);
		
		//printVar($serviceDecode);exit;
		 //$ch = curl_init(); curl_setopt($ch, CURLOPT_URL, 'http://www.yoursite.com/background-script.php'); curl_setopt($ch, CURLOPT_FRESH_CONNECT, true); curl_setopt($ch, CURLOPT_TIMEOUT_MS, 1); curl_exec($ch); curl_close($ch);
		$template="index";
		include(CONTENT_VIEW."layout.php");      
		
   	}
 
}