<?php

class ConfiguracionEncuestaController extends BaseController {

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


		if($arrainput['encuesta']!=""){
			$cadena.=" and fa.encuesta_fk='".$arrainput['encuesta']."'";
		}

		if($arrainput['configuracion']!=""){
			$cadena.=" and fa.configuracion_fk='".$arrainput['configuracion']."'";
		}

								
		$sql_uni="Select fa.*, mo.descripcion as encuesta, lo.codigo as configuracion
				 from configuracion_encuesta fa 
				 left join encuestas mo on mo.codigo = fa.encuesta_fk 
				 left join configuracion lo on lo.codigo = fa.configuracion_fk 
				 where  fa.codigo is not null $cadena and fa.estado_fk=1 ";
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
		

			if($arrainput['encuesta']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El campo encuesta es obligatorio'));
			}	

			if($arrainput['configuracion']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El campo configuración es obligatorio'));
			}	

		
			$encuesta=$arrainput['encuesta'];
			$configuracion=$arrainput['configuracion'];
			$estado=$arrainput['estado'];

			$campos="encuesta_fk=$encuesta, configuracion_fk=$configuracion, estado_fk=$estado";
			
		}else{
			//campos para eliminar 
			$campos=" estado_fk= 2 ";
		}

 

		if($arrainput['codigo_id']==""){
			//insertar
			
			$result=DB::insert("insert into configuracion_encuesta set $campos");
			
		}else{
			// modificar o eliminar 
			
			$result=DB::update("update configuracion_encuesta set $campos where codigo=".$arrainput['codigo_id']);
			
		}
		
		return Response::json(array("status"=>'ok',"mensaje"=>"Proceso generado correctamente."));
	}

}
