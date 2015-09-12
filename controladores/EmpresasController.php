<?php

class EmpresasController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function buscar($arrainput)
	{
		$cadena="";
		if($arrainput['codigo']!=""){
			$cadena.=" and codigo='".$arrainput['codigo']."'";
		}

		if($arrainput['nombre']!=""){
			$cadena.=" and nombre like '%".$arrainput['nombre']."%'";
		}	

		$valorempresa = Session::get('empresa');
		$sql_uni="Select *  from empresas where  codigo is not null $cadena and estado_fk=1";
		$result=DB::select($sql_uni);

		$arradatos=array();
		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];
			array_push($arradatos, $objDato);	
			
		}
		if($arrainput['tipo_result']=="json"){
			return Response::json(array("datos"=>$arradatos,"status"=>'ok'));
		}else{
			return $arradatos;
		}
		
	}


	public function guardar($arrainput){
		$campos="";

		$cadena_mostrar="";

		$valorempresa = Session::get('empresa');
		//$valorempresa = "";


		if($arrainput['tipo']!="eliminar"){
		
			if($arrainput['nombre']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El Nombre es obligatorio'));
			}	

			if($arrainput['descripcion']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El Descripcion es obligatorio'));
			}	

			if($arrainput['nit']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El Nit es obligatorio'));
			}	

			if($arrainput['logo']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El Logo es obligatorio'));
			}	

			if($arrainput['imagen_marca_login']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El Marca Login es obligatorio'));
			}	

			if($arrainput['imagen_marca_backoffice']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El Marca Backoffice es obligatorio'));
			}	

			
			$nombre=$arrainput['nombre'];
			$descripcion=$arrainput['descripcion'];
			$nit=$arrainput['nit'];
			$logo=$arrainput['logo'];
			$imagen_marca_login=$arrainput['imagen_marca_login'];
			$imagen_marca_backoffice=$arrainput['imagen_marca_backoffice'];
			$estado=$arrainput['estado'];
			$empresa=$valorempresa;

			$campos="nombre='$nombre', descripcion='$descripcion', nit='$nit', logo='$logo', imagen_marca_login='$imagen_marca_login', imagen_marca_backoffice='$imagen_marca_backoffice', estado_fk=$estado";
			
		}else{
			//campos para eliminar 
			$campos=" estado_fk= 2 ";
		}



		if($arrainput['codigo_id']==""){
			//insertar
			$result=DB::insert("insert into empresas set $campos");
			
		}else{
			// modificar o eliminar 
			
			$result=DB::update("update empresas set $campos where codigo=".$arrainput['codigo_id']);
			
		}
		
		return Response::json(array("status"=>'ok',"mensaje"=>"Proceso generado correctamente."));
	}

}
