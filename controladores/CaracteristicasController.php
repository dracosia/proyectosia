<?php

class CaracteristicasController extends BaseController {

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
			$cadena.=" and ca.id_codigo='".$arrainput['codigo']."'";
		}

		if($arrainput['nombre']!=""){
			$cadena.=" and ca.nombre like '%".$arrainput['nombre']."%'";
		}	

		if($arrainput['factor']!=""){
			$cadena.=" and ca.factores_fk='".$arrainput['factor']."'";
		}
								
		$sql_uni="Select ca.*, fa.nombre as factor, fa.modelo_fk as modelo
				 from caracteristicas ca 
				 left join factores fa on fa.codigo = ca.factores_fk 
				 where  ca.codigo is not null $cadena and ca.estado_fk=1 ";
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

			if($arrainput['factor']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El factor es obligatorio'));
			}	

			
			$codigo=$arrainput['codigo'];
			$nombre=$arrainput['nombre'];
			$descripcion=$arrainput['descripcion'];
			$estado=$arrainput['estado'];
			$factor=$arrainput['factor'];

			$campos="id_codigo='$codigo', nombre='$nombre', descripcion='$descripcion', estado_fk=$estado ,factores_fk=$factor";
			
		}else{
			//campos para eliminar 
			$campos=" estado_fk= 2 ";
		}



		if($arrainput['codigo_id']==""){
			//insertar
			
			$result=DB::insert("insert into caracteristicas set $campos");
			
		}else{
			// modificar o eliminar 
			
			$result=DB::update("update caracteristicas set $campos where codigo=".$arrainput['codigo_id']);
			
		}
		
		return Response::json(array("status"=>'ok',"mensaje"=>"Proceso generado correctamente."));
	}

}
