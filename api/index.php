<?php
header('Content-type:application/json');
include ('../models/Estaciones.php');


$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1)); 
switch ($method) {
	 case 'POST':
	 rest_post($request); 
	 break;
	 case 'GET':
	 $estacion = new Estaciones;
		if(isset($_GET["chipid"])){
		echo json_encode($estacion->buscar($_GET["chipid"]));
		}else{
		if(isset($_GET["mode"])){
		if($_GET["mode"]=="list-stations"){
			echo json_encode($estacion->listar());
		}else{
			echo json_encode(array("errno"=>403,"error"=>"modo no implementado"));
		}
		}else{
		echo json_encode(array("errno"=>404,"error"=>"Falta chipid"));
		}              
		}
	 break;
}

?>