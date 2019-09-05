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
		 
 		$template="consultas";
		include(CONTENT_VIEW."layout.php");     
		
   	}
	public function get(){
		$modelEmp=$this->obj->tableregistrer("empleado");
		$modelTiposalario=$this->obj->tableregistrer("tiposalario");
		$getEmpleado=$modelEmp->get(["and"=>["idremoto"=>$_POST["id"]]]," * ",FALSE,FALSE,1);
		
 		header("Content-type: application/json; charset=utf-8");
		if(isset($getEmpleado[0])){ 
			$tipo=$modelTiposalario->get(["and"=>["id"=>$getEmpleado[0]['idtiposalario']]]," * ",FALSE,FALSE,1);
			$getEmpleado[0]['tiposalario']=$tipo[0]["nombre"];
			echo json_encode(["respuesta"=>$getEmpleado[0]]);exit;
		}else{
			echo json_encode(["respuesta"=>0]);exit;
		}
	}
	public function del(){
		$modelEmp=$this->obj->tableregistrer("empleado");
		$id=$_POST["id"];
 		$modelEmp->del(" id = ".$id);
		header("Content-type: application/json; charset=utf-8");
		echo json_encode(["respuesta"=>1]);exit;
		
	}
	public function edit(){
		$modelEmp=$this->obj->tableregistrer("empleado");
		$id=$_POST["id"];
		unset($_POST["id"]);
		unset($_POST["tiposalario"]);
		$set=$_POST;
		
		if($set["salario"]>=0 and $set["salario"]<1000){
			$set["idtiposalario "]=1;
		}
		if($set["salario"]>=1001 and $set["salario"]<4000){
			$set["idtiposalario "]=2;
		}
		if($set["salario"]>=4000){
			$set["idtiposalario "]=3;
		}
 		$modelEmp->edit($_POST," id = ".$id);
		header("Content-type: application/json; charset=utf-8");
		echo json_encode(["respuesta"=>1]);exit;
		
	}
	public function add(){
		$modelEmp=$this->obj->tableregistrer("empleado");
		$set=[];
  		$getEmpleado=$modelEmp->get(["and"=>["nombre"=>$_POST["nombre"]]]," * ",FALSE,FALSE,1);
		if(!isset($getEmpleado[0])){
 				$temporal=[];
				$idtiposal="";
				foreach($_POST as $col=>$rval){
					$temporal[$col]=$rval;
					if($col=="salario"){
						
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
				$temporal["idremoto"]=rand(20000,1000000000);
				$temporal["idtiposalario"]=$idtiposal;
				$temporal["fecharegistro"]=date("Y-m-d H:i:s");
				//$set[]=$temporal;
				$modelEmp->add($temporal);
 		}
 		header("Content-type: application/json; charset=utf-8");
		echo json_encode(["respuesta"=>1]);exit;
		
	}
 
}