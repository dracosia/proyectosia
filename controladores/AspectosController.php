<?php

class AspectosController extends BaseController {

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
			$cadena.=" and ap.id_codigo='".$arrainput['codigo']."'";
		}

		if($arrainput['nombre']!=""){
			$cadena.=" and ap.nombre like '%".$arrainput['nombre']."%'";
		}	

		if($arrainput['caracteristica']!=""){
			$cadena.=" and ap.caracteristicas_fk='".$arrainput['caracteristica']."'";
		}
								
		$sql_uni="Select ap.*, ca.nombre as caracteristica, fa.modelo_fk as modelo, fa.codigo as factor
				 from aspectos ap 
				 left join caracteristicas ca on ca.codigo = ap.caracteristicas_fk 
				 left join factores fa on fa.codigo = ca.factores_fk 
				 where  ap.codigo is not null $cadena and ap.estados_fk=1 ";
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
		
			if($arrainput['codigo']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El código es obligatorio'));
			}

			if($arrainput['nombre']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El Nombre es obligatorio'));
			}	

			if($arrainput['descripcion']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El Descripcion es obligatorio'));
			}	

			if($arrainput['caracteristica']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'La caracteristica es obligatorio'));
			}	

			
			$codigo=$arrainput['codigo'];
			$nombre=$arrainput['nombre'];
			$descripcion=$arrainput['descripcion'];
			$estado=$arrainput['estado'];
			$caracteristica=$arrainput['caracteristica'];

			$campos="id_codigo='$codigo', nombre='$nombre', descripcion='$descripcion', estados_fk=$estado ,caracteristicas_fk=$caracteristica";
			
		}else{
			//campos para eliminar 
			$campos=" estados_fk= 2 ";
		}



		if($arrainput['codigo_id']==""){
			//insertar
			
			$result=DB::insert("insert into aspectos set $campos");
			
		}else{
			// modificar o eliminar 
			
			$result=DB::update("update aspectos set $campos where codigo=".$arrainput['codigo_id']);
			
		}
		
		return Response::json(array("status"=>'ok',"mensaje"=>"Proceso generado correctamente."));
	}

}
