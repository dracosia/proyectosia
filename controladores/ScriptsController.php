<?php

class ScriptsController extends BaseController {

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
			$cadena.=" and sc.id_codigo='".$arrainput['codigo']."'";
		}

		if($arrainput['nombre']!=""){
			$cadena.=" and sc.nombre like '%".$arrainput['nombre']."%'";
		}	

		if($arrainput['tipo_script']!=""){
			$cadena.=" and sc.tipo_script_fk='".$arrainput['modelo']."'";
		}
								
		$sql_uni="Select sc.*, tip.nombre as tipo_script 
				 from scripts sc 
				 left join tipo_scripts tip on tip.codigo = sc.tipo_script_fk 
				 where  sc.codigo is not null $cadena and sc.estado_fk=1 ";
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

		
		//$valorempresa = "";


		if($arrainput['tipo']!="eliminar"){
		
		
			if($arrainput['nombre']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El Nombre es obligatorio'));
			}	

			if($arrainput['descripcion']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El Descripcion es obligatorio'));
			}	

			if($arrainput['tipo_script']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El Tipo Script es obligatorio'));
			}	
			
			$nombre=$arrainput['nombre'];
			$descripcion=$arrainput['descripcion'];
			$estado=$arrainput['estado'];
			$tipo_script=$arrainput['tipo_script'];

			$campos="nombre='$nombre', descripcion='$descripcion', estado_fk=$estado ,tipo_script_fk=$tipo_script";
			
		}else{
			//campos para eliminar 
			$campos=" estado_fk= 2 ";
		}



		if($arrainput['codigo_id']==""){
			//insertar
			
			$result=DB::insert("insert into scripts set $campos");
			
		}else{
			// modificar o eliminar 
			
			$result=DB::update("update scripts set $campos where codigo=".$arrainput['codigo_id']);
			
		}
		
		return Response::json(array("status"=>'ok',"mensaje"=>"Proceso generado correctamente."));
	}

}
