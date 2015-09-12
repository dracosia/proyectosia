<?php

class ConfiguracionController extends BaseController {

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


		if($arrainput['sede']!=""){
			$cadena.=" and fa.sede_fk='".$arrainput['sede']."'";
		}

		if($arrainput['empresa']!=""){
			$cadena.=" and fa.empresa_fk='".$arrainput['empresa']."'";
		}

								
		$sql_uni="Select fa.*, mo.nombre as sede, lo.nombre as empresa
				 from configuracion fa 
				 left join sedes mo on mo.codigo = fa.sede_fk 
				 left join empresas lo on lo.codigo = fa.empresa_fk 
				 where  fa.codigo is not null $cadena ";
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
		

			if($arrainput['periodo']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El periodo es obligatorio'));
			}	

			if($arrainput['anoperiodo']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El campo año del periodo es obligatorio'));
			}	

			if($arrainput['sede']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El sede es obligatorio'));
			}	

			if($arrainput['empresa']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El empresa es obligatorio'));
			}	


			
		
			$periodo=$arrainput['periodo'];
			$anoperiodo=$arrainput['anoperiodo'];
			$sede=$arrainput['sede'];			
			$empresa=$arrainput['empresa'];


			$campos="periodo='$periodo', anoperiodo='$anoperiodo', sede_fk=$sede, empresa_fk=$empresa";
			
		}else{
			//campos para eliminar 
			$campos=" estado_fk= 2 ";
		}

 

		if($arrainput['codigo_id']==""){
			//insertar
			
			$result=DB::insert("insert into configuracion set $campos");
			
		}else{
			// modificar o eliminar 
			
			$result=DB::update("update configuracion set $campos where codigo=".$arrainput['codigo_id']);
			
		}
		
		return Response::json(array("status"=>'ok',"mensaje"=>"Proceso generado correctamente."));
	}

}
