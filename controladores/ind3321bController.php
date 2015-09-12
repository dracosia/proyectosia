<?php

class ind3321bController extends BaseController {

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

		if($arrainput['programa']!=""){
			$cadena.=" and en.programa_fk='".$arrainput['programa']."'";
		}

		if($arrainput['indicadores']!=""){
			$cadena.=" and en.indicador_fk='".$arrainput['indicadores']."'";
		}	
								
/*		$sql_uni="Select en.*, pro.nombre as programa, ind.nombre as indicadores 
				 from entrevistas en 
				 left join programas pro on pro.codigo = en.programa_fk 
				 left join indicadores ind on ind.codigo = en.indicador_fk  
				 where  en.codigo is not null  $cadena and en.estado_fk=1 "; */

		$sql_uni="Select en.*, pro.nombre as programa, ind.nombre as indicadores, ind.id_codigo as codigo_indicador,fa.modelo_fk, ca.factores_fk,ap.caracteristicas_fk, ind.aspectos_fk
				 from ind3321b en 
				 left join programas pro on pro.codigo = en.programa_fk 
				 left join indicadores ind on ind.codigo = en.indicador_fk
 				 left join aspectos ap ON ap.codigo = ind.aspectos_fk
				 left join caracteristicas ca on ca.codigo = ap.caracteristicas_fk 
				 left join factores fa on fa.codigo = ca.factores_fk 
   
				 where  en.codigo is not null $cadena and en.estado_fk=1 "; 
				 
				 
				 
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
		
			
			if($arrainput['programa']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El programa es obligatorio'));
			}	

			if($arrainput['indicadores']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El indicador es obligatorio'));
			}	

			if($arrainput['c1']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El campo es obligatorio'));
			}	

			if($arrainput['c2']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El campo es obligatorio'));
			}	
			
			if($arrainput['c3']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El campo es obligatorio'));
			}	
			
			if($arrainput['c4']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El campo es obligatorio'));
			}	
			
	
			
			$indicador=$arrainput['indicadores'];
			$programa=$arrainput['programa'];
			$c1=$arrainput['c1'];
			$c2=$arrainput['c2'];
			$c3=$arrainput['c3'];
			$c4=$arrainput['c4'];

			$estado=$arrainput['estado'];
			$campos="programa_fk=$programa, indicador_fk=$indicador, c1='$c1', c2='$c2', c3='$c3', c4='$c4', estado_fk=$estado";
			
		}else{
			//campos para eliminar 
			$campos=" estado_fk= 2 ";
		}



		if($arrainput['codigo_id']=="" ||$arrainput['codigo_id']=="-1"){
			//insertar
			
			$result=DB::insert("insert into ind3321b set $campos");
			
		}else{
			// modificar o eliminar 
			
			$result=DB::update("update ind3321b set $campos where codigo=".$arrainput['codigo_id']);
			
		}
		
		return Response::json(array("status"=>'ok',"mensaje"=>"Proceso generado correctamente."));
	}

}
