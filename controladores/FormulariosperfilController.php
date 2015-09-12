<?php

class FormulariosperfilController extends BaseController {

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

		if($arrainput['perfiles']!=""){
			$cadena.=" and fa.perfiles_fk='".$arrainput['perfiles']."'";
		}

		if($arrainput['formularios']!=""){
			$cadena.=" and fa.formularios_fk='".$arrainput['formularios']."'";
		}
								
		$sql_uni="Select fa.*, mo.nombre as perfiles, fo.nombre as formularios 
				 from formularios_perfil fa 
				 left join perfiles mo on mo.codigo = fa.perfiles_fk 
				 left join formularios fo on fo.codigo = fa.formularios_fk 
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
		
			if($arrainput['insertar']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El campo insertar es obligatorio'));
			}

			if($arrainput['visualizar']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El campo visualizar es obligatorio'));
			}	

			if($arrainput['modificar']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El campo modificar es obligatorio'));
			}	

			if($arrainput['eliminar']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El campo eliminar es obligatorio'));
			}	
			
			if($arrainput['imprimir']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El campo imprimir es obligatorio'));
			}				
			
			if($arrainput['perfil']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El campo perfiles es obligatorio'));
			}	

			if($arrainput['formulario']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El campo formularios es obligatorio'));
			}	
			
			$insertar=$arrainput['insertar'];
			$visualizar=$arrainput['visualizar'];
			$modificar=$arrainput['modificar'];
			$eliminar=$arrainput['eliminar'];
			$imprimir=$arrainput['imprimir'];
			$perfiles=$arrainput['perfil'];
			$formularios=$arrainput['formulario'];
			$estado=$arrainput['estado'];

			$campos="insertar='$insertar', visualizar='$visualizar', modificar='$modificar', eliminar='$eliminar', imprimir='$imprimir', perfiles_fk='$perfiles', formularios_fk='$formularios',estado_fk=$estado";
			
		}else{
			//campos para eliminar 
			$campos=" estado_fk= 2 ";
		}



		if($arrainput['codigo_id']==""){
			//insertar
			
			$result=DB::insert("insert into formularios_perfil set $campos");
			
		}else{
			// modificar o eliminar 
			
			$result=DB::update("update formularios_perfil set $campos where codigo=".$arrainput['codigo_id']);
			
		}
		
		return Response::json(array("status"=>'ok',"mensaje"=>"Proceso generado correctamente."));
	}

}
