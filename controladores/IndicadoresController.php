<?php

class IndicadoresController extends BaseController {

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
			$cadena.=" and ind.id_codigo='".$arrainput['codigo']."'";
		}

		if($arrainput['nombre']!=""){
			$cadena.=" and ind.nombre like '%".$arrainput['nombre']."%'";
		}	

		if($arrainput['aspecto']!=""){
			$cadena.=" and ind.aspectos_fk='".$arrainput['aspecto']."'";
		}

		if($arrainput['tipo_indicador']!=""){
			$cadena.=" and ind.tipo_indicador_fk='".$arrainput['tipo_indicador']."'";
		}

		if($arrainput['script']!=""){
			$cadena.=" and ind.script_fk='".$arrainput['script']."'";
		}

								
		$sql_uni="Select ind.*, ca.nombre as caracteristica, fa.modelo_fk as modelo, fa.codigo as factor, ap.nombre as aspecto, sc.nombre as script, tip.nombre as tipo_indicador,
								ca.factores_fk as factor_fk, ind.aspectos_fk as aspecto_fk, ap.caracteristicas_fk  as caracteristica_fk
				 from indicadores ind 
				 inner join aspectos ap ON ap.codigo = ind.aspectos_fk
				 inner join caracteristicas ca on ca.codigo = ap.caracteristicas_fk 
				 inner join factores fa on fa.codigo = ca.factores_fk 
				 inner join tipo_indicadores tip ON tip.codigo = ind.tipo_indicador_fk
				 inner join scripts sc ON sc.codigo = ind.scripts_fk 
				 where  ind.codigo is not null $cadena and ind.estado_fk=1 ";
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

	public function buscar_modelo($arrainput)

	{
		$cadena="";
		if($arrainput['modelo']!=""){
			$cadena.=" and fa.modelo_fk='".$arrainput['modelo']."'";
		}

		if($arrainput['tipo_indicador']!=""){
			$cadena.=" and ind.tipo_indicador_fk='".$arrainput['tipo_indicador']."'";
		}
								
		$sql_uni="Select ind.*, ca.nombre as caracteristica, fa.modelo_fk as modelo, fa.codigo as factor, ap.nombre as aspecto, sc.nombre as script, tip.nombre as tipo_indicador,
								ca.factores_fk as factor_fk, ind.aspectos_fk as aspecto_fk, ap.caracteristicas_fk  as caracteristica_fk
				 from indicadores ind 
				 inner join aspectos ap ON ap.codigo = ind.aspectos_fk
				 inner join caracteristicas ca on ca.codigo = ap.caracteristicas_fk 
				 inner join factores fa on fa.codigo = ca.factores_fk 
				 inner join tipo_indicadores tip ON tip.codigo = ind.tipo_indicador_fk
				 inner join scripts sc ON sc.codigo = ind.scripts_fk 
				 where  ind.codigo is not null $cadena and ind.estado_fk=1 ";
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

			


			if($arrainput['aspecto']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El aspecto es obligatorio'));
			}

			if($arrainput['tipo_indicador']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'EL tipo indicador es obligatorio'));
			}

			if($arrainput['script']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El script es obligatorio'));
			}

			
			$codigo=$arrainput['codigo'];
			$nombre=$arrainput['nombre'];
			$descripcion=$arrainput['descripcion'];
			$estado=$arrainput['estado'];
			$aspecto=$arrainput['aspecto'];
			$tipo_indicador=$arrainput['tipo_indicador'];
			$script=$arrainput['script'];

			$campos="id_codigo='$codigo', nombre='$nombre', descripcion='$descripcion', estado_fk=$estado , aspectos_fk=$aspecto, tipo_indicador_fk=$tipo_indicador, scripts_fk=$script  ";
			
		}else{
			//campos para eliminar 
			$campos=" estado_fk= 2 ";
		}


		$sqls="";

		if($arrainput['codigo_id']=="" ||  $arrainput['codigo_id']==-1){
			//insertar		
			
			$result=DB::insert("insert into indicadores set $campos");
			
		}else{
			// modificar o eliminar 
			
			$result=DB::update("update indicadores set $campos where codigo=".$arrainput['codigo_id']);
			
		}
		
		return Response::json(array("status"=>'ok',"mensaje"=>"Proceso generado correctamente."));
	}

}
