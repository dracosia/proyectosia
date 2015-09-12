<?php

class RespEncuestaController extends BaseController {

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
		
		$valorempresa = Session::get('empresa');
		$estamento="".$arrainput["estamento"];

		$sql_uni="select con.*, en.fechacreacion, en.fechafinalizacion,
					en.nombre as nombreencuesta, en.descripcion as descripcionencuesta,
					en.codigo as codigoencuesta,cone.encuesta_fk
				from configuracion con 
				LEFT JOIN configuracion_encuesta cone ON cone.configuracion_fk=con.codigo
				LEFT JOIN encuestas en on en.codigo=cone.encuesta_fk
				WHERE cone.estado_fk=1 and en.estamento_fk=$estamento and con.empresa_fk=$valorempresa";
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


	public function guardar_encuesta($arrainput){

		DB::beginTransaction();
		
		$sql_uni="";

		$cadena="".$arrainput["cadena_respuestas"];

		$arra_lineas=explode("@@", $cadena);
		$codigo_usuario="".$arrainput["codigo_usuario"];
		$codigo_encuesta="".$arrainput["codigo_encuesta"];

		



		$sql="select * from  usuarios_encuentas where usuarios_fk=$codigo_usuario and encuestas_fk=$codigo_encuesta  and estados_fk=1";

		$result=DB::select($sql);

		$no_existe="";

		$arradatos=array();
		$codigo_usuario_encuesta="";
		for($ind=0;$ind<count($result);$ind++){
			$codigo_usuario_encuesta="".$result[$ind]->codigo;
		}


		try
        {
        	$campos="  usuarios_fk=$codigo_usuario, encuestas_fk=$codigo_encuesta, estados_fk=1 ";

			if($codigo_usuario_encuesta==""){
				$sql="insert into usuarios_encuentas set $campos";
				$result=DB::insert($sql);

				$id_encuesta=DB::select("select Last_insert_id() as ultimo");
				$codigo_usuario_encuesta="".$id_encuesta[0]->ultimo;//aqui val el Last_insert_id

			}else{
				$no_existe="SI";
				$sql="update usuarios_encuentas set $campos where codigo=$codigo_usuario_encuesta";
				$result=DB::update($sql);
			}

        	}catch(\Exception $e){
				DB::rollback();
				return Response::json(array("status"=>'error',"mensaje"=>"Error al procesar petición  $sql "));
		}



		for($ind=0;$ind<count($arra_lineas);$ind++){

			if($arra_lineas[$ind]!=""){
				$arra_details=explode("::", $arra_lineas[$ind]);
				/*
					 	cadena+=""+arra_responde[i].codigo_pregunta+"::";
            			cadena+=""+arra_responde[i].codigo_respuesta+"::";
            			cadena+=""+arra_responde[i].valor+"@@";
				*/
				$cod_pregunta="".$arra_details[0];
				$cod_respuesta="".$arra_details[1];
				$cod_valor="".$arra_details[2];

				
				$campos="usuario_encuesta_fk=$codigo_usuario_encuesta, respuesta_fk=$cod_respuesta, pregunta_fk=$cod_pregunta, respuesta='$cod_valor'";


				if($no_existe!=""){
					$sql="update usuario_encuesta_pregunta_respuesta set $campos where respuesta_fk=$cod_respuesta";
					$result=DB::update($sql);

				}else{

					$sql="insert into usuario_encuesta_pregunta_respuesta set $campos";
					$result=DB::insert($sql);

				}




			}
		}
		DB::commit();
		return Response::json(array("status"=>'ok',"mensaje"=>"Proceso generado correctamente."));
	}

}
