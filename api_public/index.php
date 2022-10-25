<?php

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Content-Type: application/json");

define("URL_BASE","/alumno/3786/appestacion/api_public/");
$request = str_replace(URL_BASE,"",$_SERVER["REQUEST_URI"]);
$element = explode("/",$request);
//echo json_encode($element);
//var_dump($element);
if(!count($element)){
	echo json_encode(array("errno"=>404,"error"=>"Falta Modelo"));
}else{
	$modelo = ucfirst(strtolower($element[0]));
	if(!file_exists("../models/".$modelo.".php")){
		echo json_encode(array("errno"=>404,"error"=>"Archivo no existente"));
	}else{
		require "../models/".$modelo.".php";
		$obj = new $modelo;
		if(!isset($element[1])){
			echo json_encode(array("errno"=>404,"error"=>"Falta Metodo"));
		}else{
			$metodo = $element[1];
			if(!method_exists($modelo, $metodo)){
				echo json_encode(array("errno"=>404,"error"=>"Metodo no existe en la clase"));
			}else{
				echo json_encode($obj->$metodo());
			}
		}
	}
}
?>