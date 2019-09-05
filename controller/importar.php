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
 
		$this->service=json_decode(file_get_contents("http://dummy.restapiexample.com/api/v1/employees")); 
		$this->obj=new db();
		 
 	 
 	}
 	
	public function init(){     
 		$modelEmp=$this->obj->tableregistrer("empleado");
		
		
 		$serviceDecode=$this->service;
		
		foreach($serviceDecode as $idt=>$empT){  
			$getEmpleado=$modelEmp->get(["and"=>["idremoto"=>$empT->id]]," * ",FALSE,FALSE,1);
			$serviceDecode[$idt]->indata=0;
 			if(isset($getEmpleado[0])){
				$set=(array)$empT;
 				$serviceDecode[$idt]->indata=1;
			}
		}
		 
 		$template="importar";
		include(CONTENT_VIEW."layout.php");      
		
   	}
	
	public function add(){
		$modelEmp=$this->obj->tableregistrer("empleado");
		$set=[];
		$cols=["employee_name"=>"nombre","employee_salary"=>"salario","id"=>'idremoto',"employee_age"=>"edad","profile_image"=>"imagen"];
		$elements=explode("|",$_POST["elements"]);
 		foreach($this->service as $id=>$val){
			$getEmpleado=$modelEmp->get(["and"=>["idremoto"=>$val->id]]," * ",FALSE,FALSE,1);
			if(!isset($getEmpleado[0])){
				if(in_array($val->id,$elements)){
					$temporal=[];
					$idtiposal="";
					foreach($val as $col=>$rval){
						$temporal[$cols[$col]]=$rval;
						if($cols[$col]=="salario"){
							
							if($rval>=0 and $rval<1000){
								$idtiposal=1;
							}
							if($rval>=1001 and $rval<4000){
								$idtiposal=2;
							}
							if($rval>=4000){
								$idtiposal=3;
							}
						}
					}
					$temporal["idtiposalario"]=$idtiposal;
					$temporal["fecharegistro"]=date("Y-m-d H:i:s");
					//$set[]=$temporal;
					$modelEmp->add($temporal);
				}
			}
		}
		header("Content-type: application/json; charset=utf-8");
		echo json_encode(["respuesta"=>1]);exit;
		
	}
 
}