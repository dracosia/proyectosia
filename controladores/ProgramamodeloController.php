<?php

class ProgramamodeloController extends BaseController {

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
		
		$valorempresa = Session::get('empresa');

		if($arrainput['modelo']!=""){
			$cadena.=" and fa.modelo_fk='".$arrainput['modelo']."'";
		}

		if($arrainput['programa']!=""){
			$cadena.=" and fa.programa_fk='".$arrainput['programa']."'";
		}	
								
		$sql_uni="Select fa.*, mo.nombre as modelo, pro.nombre as programa 
				 from modelos_programas fa 
				 left join modelos mo on mo.codigo = fa.modelo_fk and mo.empresa_fk=$valorempresa
				 left join programas pro ON pro.codigo = fa.programa_fk  and pro.empresa_fk=$valorempresa
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
		
			
			if($arrainput['modelo']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El modelo es obligatorio'));
			}	

			if($arrainput['programa']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El programa es obligatorio'));
			}	

			
			
			$estado=$arrainput['estado'];
			$modelo=$arrainput['modelo'];
			$programa=$arrainput['programa'];

			$campos=" estado_fk=$estado ,modelo_fk=$modelo, programa_fk=$programa";
			
		}else{
			//campos para eliminar 
			$campos=" estado_fk= 2 ";
		}



		if($arrainput['codigo_id']==""){
			//insertar
			
			$result=DB::insert("insert into modelos_programas set $campos");
			
		}else{
			// modificar o eliminar 
			
			$result=DB::update("update modelos_programas set $campos where codigo=".$arrainput['codigo_id']);
			
		}
		
		return Response::json(array("status"=>'ok',"mensaje"=>"Proceso generado correctamente."));
	}

}
