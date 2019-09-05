<?php
	
	if(isset($_GET["mode"]) or isset($_POST["mode"])){
		$mode="";
		if(isset($_GET["mode"])){
			$mode=$_GET["mode"];
		}else if(isset($_POST["mode"])){
			$mode=$_POST["mode"];
		}
		
		if(file_exists(CONTENT_DIR.$mode.".php") and $mode!="master"){
		 // printVar(CONTENT_DIR .$mode.'.php');
		 
			if(!isset($_SESSION["id"]) and $mode!="login" ){
				$mode="login";      
			}
		 
			require_once CONTENT_DIR .$mode.'.php'; 
			$objClass = new Action(); 
			if(!isset($_GET["action"])){
				$objClass->init();
			}	else{
				 
				$metodo=$_GET["action"];
				$objClass->$metodo();
			}		
		}
	}
	
?>