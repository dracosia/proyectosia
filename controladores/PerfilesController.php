<?php

class PerfilesController extends BaseController {

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
			$cadena.=" and p.codigo='".$arrainput['codigo']."'";
		}

		if($arrainput['nombre']!=""){
			$cadena.=" and p.nombre like '%".$arrainput['nombre']."%'";
		}	

		if($arrainput['estamento']!=""){
			$cadena.=" and p.estamento_fk= ".$arrainput['estamento']."";
		}	

		$valorempresa = Session::get('empresa');
		$sql_uni="Select p.*, es.nombre as estamentos  
		from perfiles p
		left join estamentos es on es.codigo=p.estamento_fk 
		where  p.codigo is not null $cadena and p.estado_fk=1 and p.empresa_fk=$valorempresa ";
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

			
			$nombre=$arrainput['nombre'];
			$descripcion=$arrainput['descripcion'];
			$estado=$arrainput['estado'];
			$estamento=$arrainput['estamento'];
			$empresa=$valorempresa;

			$campos="nombre='$nombre', descripcion='$descripcion', estado_fk=$estado ,empresa_fk=$empresa, estamento_fk=$estamento";
			
		}else{
			//campos para eliminar 
			$campos=" estado_fk= 2 ";
		}



		if($arrainput['codigo_id']==""){
			//insertar
			$result=DB::insert("insert into perfiles set $campos");
			
		}else{
			// modificar o eliminar 
			
			$result=DB::update("update perfiles set $campos where codigo=".$arrainput['codigo_id']);
			
		}
		
		return Response::json(array("status"=>'ok',"mensaje"=>"Proceso generado correctamente."));
	}

}
