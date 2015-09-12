<?php

class CrearEncuestasController extends BaseController {

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
		

		

		if($arrainput['nombre']!=""){
			$cadena.=" and en.nombre like '%".$arrainput['nombre']."%'";
		}	

		if($arrainput['codigo']!=""){
			$cadena.=" and en.codigo ='".$arrainput['codigo']."'";
		}	

		if($arrainput['modelo']!=""){
			$cadena.=" and en.modelos_programas_fk ='".$arrainput['modelo']."'";
		}	
		

		$valorempresa = Session::get('empresa');
								
		$sql_uni="SELECT en.*,  mo.nombre as modelo, en.modelos_programas_fk as modelo_fk, est.nombre as estamento
					FROM encuestas en
					INNER JOIN modelos mo ON mo.codigo=en.modelos_programas_fk and mo.empresa_fk=$valorempresa	
					LEFT JOIN estamentos est ON est.codigo = en.estamento_fk			
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



	public function eliminar($arrainput)
	{

		$sql_uni="UPDATE encuestas set estado_fk='2' where codigo=".$arrainput['codigo'];
		$result=DB::update($sql_uni);		
		return Response::json(array("status"=>'ok',"mensaje"=>"Proceso generado correctamente."));
		
	}



	public function lineas($arrainput)
	{


		$cod_encuesta="".$arrainput['encuesta'];


		//preguntas 

		$cadena_pregunta="	select ind.* 
							from preguntas pr
							LEFT JOIN indicadores ind ON ind.codigo=pr.indicadores_fk 
							where pr.encuesta_fk=$cod_encuesta and pr.estados_fk=1 group by ind.codigo";		
		$result=DB::select($cadena_pregunta);
		$arradatos_indi=array();
		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];
			array_push($arradatos_indi, $objDato);				
		}



		//preguntas 

		$cadena_pregunta="	select pr.*
							from preguntas pr
							LEFT JOIN indicadores ind ON ind.codigo=pr.indicadores_fk 
							where pr.encuesta_fk=$cod_encuesta and pr.estados_fk=1 ";		
		$result=DB::select($cadena_pregunta);
		$arradatos_preguntas=array();
		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];
			array_push($arradatos_preguntas, $objDato);				
		}

		//respuestas 

		$cadena_respuesta="select * from respuestas where pregunta_fk in (select codigo from preguntas where encuesta_fk=$cod_encuesta) and estado_fk=1 ";		
		$result=DB::select($cadena_respuesta);
		$arradatos_respuesta=array();
		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];
			array_push($arradatos_respuesta, $objDato);				
		}


		if($arrainput['tipo_result']=="json"){
			return Response::json(array("datos_preguntas"=>$arradatos_preguntas,"datos_respuestas"=>$arradatos_respuesta,"datos_indicador"=>$arradatos_indi,"status"=>'ok'));
		}else{
			return $arradatos;
		}
		
	}


public function get_estamentos($arrainput)
	{
		$cadena="";
		

		$sql_uni="SELECT * FROM estamentos"; 
				 
				 
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

		DB::beginTransaction();
		$campos="";

		$cadena_mostrar="";

		$cadena_encuesta="".$arrainput['cadena_encuesta'];

		$programa_modelo="".$arrainput['modelo'];
		$nombre_encuesta="".$arrainput['nombre'];
		$descripcion_encuesta="".$arrainput['descripcion'];
		$estado_encuesta="".$arrainput['estado'];
		$fecha_inicio="".$arrainput['fecha_ini'];
		$fecha_fin="".$arrainput['fecha_fin'];

		$estamento="".$arrainput['estamento'];
		
		/*
		
		*/
		$codigo_encuesta="";
		$codigo_encuesta="".$arrainput['codigo_encuesta'];
		try
        {
        	if($codigo_encuesta=="-1" || $codigo_encuesta==""){
        		$inser_encuesta="insert into encuestas set nombre='$nombre_encuesta', estado_fk='1', fechacreacion='$fecha_inicio',fechafinalizacion='$fecha_fin',modelos_programas_fk='$programa_modelo', descripcion='$descripcion_encuesta', estamento_fk=$estamento";
				$result=DB::insert($inser_encuesta);
				$id_encuesta=DB::select("select Last_insert_id() as ultimo");
				$codigo_encuesta="".$id_encuesta[0]->ultimo;//aqui val el Last_insert_id


        	}else{
        		$inser_encuesta="Update encuestas SET  nombre='$nombre_encuesta', estado_fk='1', fechacreacion='$fecha_inicio', estamento_fk=$estamento,
        						fechafinalizacion='$fecha_fin',modelos_programas_fk='$programa_modelo', descripcion='$descripcion_encuesta' where codigo='$codigo_encuesta'";
				$result=DB::update($inser_encuesta);

				
        	}
			
		}catch(\Exception $e){
			DB::rollback();
			return Response::json(array("status"=>'error',"mensaje"=>"Error al procesar petición  $inser_encuesta "));
		}


		$arraIndicador=array();
		$arraPreguntas=array();
		$arraRespuestas=array();

		$arraIndicador=explode("@breakindicador@", $cadena_encuesta);

		$cadnea_indicador="";

		$cadena_pr="";

		for($i=0;$i<count($arraIndicador);$i++){
			$arra_detallte_indic=array();
			$arra_detallte_indic=explode("##", $arraIndicador[$i]);
			
			if($arra_detallte_indic[0]!=""){

				$codigo_indicador="".$arra_detallte_indic[0];//codigo del indicador... en la posicion 0


				if($arra_detallte_indic[1]!=""){
					$cadena_preguntas="".$arra_detallte_indic[1];
					$arra_preguntas=array();
					$arra_preguntas=explode("@breakpregunta@", $cadena_preguntas);



					for($j=0;$j<count($arra_preguntas);$j++){

						$arra_detalle_preguntas=array(); //array para tomar los detalles de cada pregunta.
						$arra_detalle_preguntas=explode("||", $arra_preguntas[$j]);

						


						if($arra_detalle_preguntas[0]!=""){
							$cadena_insertar_preguntas="";
							try
            				{

            					
            					//cadena para insertar una pregunta...
            					$cadena_insertar_preguntas="";								
								$cadena_insertar_preguntas.="descripcion='".$arra_detalle_preguntas[2]."',";
								$cadena_insertar_preguntas.="tipo_preguntas_fk='".$arra_detalle_preguntas[3]."',";								
								$cadena_insertar_preguntas.="indicadores_fk=$codigo_indicador, encuesta_fk=$codigo_encuesta,"; //codigo del indicador capturado arriba.
								if($arra_detalle_preguntas[5]=="activo"){
									$arra_detalle_preguntas[5]="1";
								}else{
									$arra_detalle_preguntas[5]="2";
								}
								$cadena_insertar_preguntas.="estados_fk=".$arra_detalle_preguntas[5];

								if($arra_detalle_preguntas[6]=="" && $arra_detalle_preguntas[5]=="1"){									
									$cabecera_sql="insert into preguntas set $cadena_insertar_preguntas";
									$result=DB::insert($cabecera_sql);
								}else{									
									$cabecera_sql="update preguntas set $cadena_insertar_preguntas where codigo=".$arra_detalle_preguntas[6];
									$result=DB::update($cabecera_sql);
									$cadena_pr.="$cabecera_sql \n";
								}

								
								if($arra_detalle_preguntas[6]=="" && $arra_detalle_preguntas[5]=="1"){
									$id_preg=DB::select("select Last_insert_id() as ultimo");
									$codigo_pregunta_insertada="".$id_preg[0]->ultimo;//aqui val el Last_insert_id
								}else{
									$codigo_pregunta_insertada="".$arra_detalle_preguntas[6];//aqui val el Last_insert_id
								}
								


            				}catch(\Exception $e){
            					DB::rollback();
            					return Response::json(array("status"=>'error',"mensaje"=>"Error al procesar petición   $cabecera_sql"));
            					
            				}

							$cadena_respuesta="".$arra_detalle_preguntas[4];// posición 4 donde se encuentra las líneas de respuestas.
						
							if($cadena_respuesta!=""){
								$arra_respuestas=array(); //array para tomar las líneas de cada pregunta.
								$arra_respuestas=explode("@breakrespuesta@", $cadena_respuesta);

								$cadnea_indicador="".$cadena_respuesta;

								for($k=0;$k<count($arra_respuestas);$k++){
									$arra_detallte_respuesta=array(); //array para tomar los detalles de cada respuesta.
									$arra_detallte_respuesta=explode("::", $arra_respuestas[$k]);

									if($arra_detallte_respuesta[0]!=""){
										$cadena_insertar_respuestas="";
										try
			            				{
			            					//cadena para insertar una pregunta...
			            					
											$cadena_insertar_respuestas="";
											$cadena_insertar_respuestas.="descripcion = '".$arra_detallte_respuesta[2]."', ";											
											$cadena_insertar_respuestas.="pregunta_fk = $codigo_pregunta_insertada, ";
											$cadena_insertar_respuestas.="valor = '".$arra_detallte_respuesta[3]."', ";
											if($arra_detallte_respuesta[4]=="activo"){
												$arra_detallte_respuesta[4]="1";
											}else{
												$arra_detallte_respuesta[4]="2";
											}
											$cadena_insertar_respuestas.="estado_fk=".$arra_detallte_respuesta[4];

											if($arra_detallte_respuesta[5]=="" && $arra_detallte_respuesta[4]=="1"){												
												$cabecera_sql="INSERT into respuestas set $cadena_insertar_respuestas";		
												$result=DB::insert($cabecera_sql);//insert de la respuesta										
											}else{
							
												$cabecera_sql="UPDATE respuestas set $cadena_insertar_respuestas where codigo=".$arra_detallte_respuesta[5];		
												$result=DB::update($cabecera_sql);//insert de la respuesta				
											}

											

			            				}catch(\Exception $e){
			            					DB::rollback();
			            					return Response::json(array("status"=>'error',"mensaje"=>"Error al procesar petición"));
			            					
			            				}	
									}
								}
							}
						}
					}
				}
			}
		}

		DB::commit();
		return Response::json(array("status"=>'ok',"mensaje"=>"Proceso generado correctamente."));
	}

}
