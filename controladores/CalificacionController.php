<?php

class CalificacionController extends BaseController {

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
		$modelo=$arrainput["modelo"];
		

		$sql="SELECT ind.*, '0' as verdaderas, '0' as cantidad,  '0' as verdaderas2
				FROM indicadores ind 
				INNER JOIN aspectos asp ON asp.codigo=ind.aspectos_fk
				INNER JOIN caracteristicas car ON car.codigo=asp.caracteristicas_fk
				INNER JOIN factores fac on fac.codigo=car.factores_fk
				INNER JOIN modelos mo ON mo.codigo=fac.modelo_fk
				WHERE  mo.codigo=$modelo and ind.estado_fk=1";
		$result=DB::select($sql);
		$arradatosInd=array();
		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];
			array_push($arradatosInd, $objDato);
		}

//encuestas
		$valorempresa = Session::get('empresa');
		$sql_uni="SELECT usepr.*, ind.id_codigo, ind.codigo as indicador, re.valor, ind.scripts_fk
				FROM usuario_encuesta_pregunta_respuesta usepr
				INNER JOIN preguntas pr ON pr.codigo=usepr.pregunta_fk AND pr.estados_fk=1
				INNER JOIN respuestas re ON re.codigo=usepr.respuesta_fk and re.estado_fk=1
				INNER JOIN indicadores ind ON ind.codigo=pr.indicadores_fk
				INNER JOIN aspectos asp ON asp.codigo=ind.aspectos_fk
				INNER JOIN caracteristicas car ON car.codigo=asp.caracteristicas_fk
				INNER JOIN factores fac on fac.codigo=car.factores_fk
				INNER JOIN modelos mo ON mo.codigo=fac.modelo_fk
				WHERE usepr.respuesta='SI' and mo.codigo=$modelo";
		$result=DB::select($sql_uni);

		$arradatos=array();
		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];

			for($ind2=0;$ind2<count($arradatosInd);$ind2++){

				if($objDato->indicador==$arradatosInd[$ind2]->codigo){

					

					$arradatosInd[$ind2]->cantidad++;
					if("".$objDato->valor=="SI" || "".$objDato->valor=="0"){
						$arradatosInd[$ind2]->verdaderas++;
					}
					if("".$objDato->valor=="1"){//para el script 6
						$arradatosInd[$ind2]->verdaderas2++;
					}

				}
			}
			
		}
//Existencias
		$sql="select ex.*,ind.tipo_indicador_fk as tipo_indicador
		from existencias ex
		INNER JOIN indicadores ind ON ind.codigo=ex.indicador_fk
		INNER JOIN aspectos asp ON asp.codigo=ind.aspectos_fk
		INNER JOIN caracteristicas car ON car.codigo=asp.caracteristicas_fk
		INNER JOIN factores fac on fac.codigo=car.factores_fk
		INNER JOIN modelos mo ON mo.codigo=fac.modelo_fk		 
		where ex.estado_fk=1
		and fac.modelo_fk=$modelo";

		$result=DB::select($sql);
		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];

			for($ind2=0;$ind2<count($arradatosInd);$ind2++){

				if($objDato->indicador_fk==$arradatosInd[$ind2]->codigo){
					$arradatosInd[$ind2]->cantidad++;
					$arradatosInd[$ind2]->verdaderas=$objDato->calificacion;
					$arradatosInd[$ind2]->tipo_indicador=$objDato->tipo_indicador;
				}
			}
			
		}

//talleres
		$sql="select ex.*,ind.tipo_indicador_fk as tipo_indicador
		from talleres ex
		INNER JOIN indicadores ind ON ind.codigo=ex.indicador_fk
		INNER JOIN aspectos asp ON asp.codigo=ind.aspectos_fk
		INNER JOIN caracteristicas car ON car.codigo=asp.caracteristicas_fk
		INNER JOIN factores fac on fac.codigo=car.factores_fk
		INNER JOIN modelos mo ON mo.codigo=fac.modelo_fk		 
		where ex.estado_fk=1
		and fac.modelo_fk=$modelo";

		$result=DB::select($sql);
		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];

			for($ind2=0;$ind2<count($arradatosInd);$ind2++){

				if($objDato->indicador_fk==$arradatosInd[$ind2]->codigo){
					$arradatosInd[$ind2]->cantidad++;
					$arradatosInd[$ind2]->verdaderas=$objDato->calificacion;
					$arradatosInd[$ind2]->tipo_indicador=$objDato->tipo_indicador;
				}
			}
			
		}

//entrevistas
		$sql="select ex.*,ind.tipo_indicador_fk as tipo_indicador
		from entrevistas ex
		INNER JOIN indicadores ind ON ind.codigo=ex.indicador_fk
		INNER JOIN aspectos asp ON asp.codigo=ind.aspectos_fk
		INNER JOIN caracteristicas car ON car.codigo=asp.caracteristicas_fk
		INNER JOIN factores fac on fac.codigo=car.factores_fk
		INNER JOIN modelos mo ON mo.codigo=fac.modelo_fk		 
		where ex.estado_fk=1
		and fac.modelo_fk=$modelo";

		$result=DB::select($sql);
		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];

			for($ind2=0;$ind2<count($arradatosInd);$ind2++){

				if($objDato->indicador_fk==$arradatosInd[$ind2]->codigo){
					$arradatosInd[$ind2]->cantidad++;
					$arradatosInd[$ind2]->verdaderas=$objDato->calificacion;
					$arradatosInd[$ind2]->tipo_indicador=$objDato->tipo_indicador;
				}
			}
			
		}

//Grupos Focales
		$sql="select ex.*,ind.tipo_indicador_fk as tipo_indicador
		from gruposfocales ex
		INNER JOIN indicadores ind ON ind.codigo=ex.indicador_fk
		INNER JOIN aspectos asp ON asp.codigo=ind.aspectos_fk
		INNER JOIN caracteristicas car ON car.codigo=asp.caracteristicas_fk
		INNER JOIN factores fac on fac.codigo=car.factores_fk
		INNER JOIN modelos mo ON mo.codigo=fac.modelo_fk		 
		where ex.estado_fk=1
		and fac.modelo_fk=$modelo";

		$result=DB::select($sql);
		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];

			for($ind2=0;$ind2<count($arradatosInd);$ind2++){

				if($objDato->indicador_fk==$arradatosInd[$ind2]->codigo){
					$arradatosInd[$ind2]->cantidad++;
					$arradatosInd[$ind2]->verdaderas=$objDato->calificacion;
					$arradatosInd[$ind2]->tipo_indicador=$objDato->tipo_indicador;
				}
			}
			
		}

//Grupos Focales
		$sql="select ex.*,ind.tipo_indicador_fk as tipo_indicador
		from observacion ex
		INNER JOIN indicadores ind ON ind.codigo=ex.indicador_fk
		INNER JOIN aspectos asp ON asp.codigo=ind.aspectos_fk
		INNER JOIN caracteristicas car ON car.codigo=asp.caracteristicas_fk
		INNER JOIN factores fac on fac.codigo=car.factores_fk
		INNER JOIN modelos mo ON mo.codigo=fac.modelo_fk		 
		where ex.estado_fk=1
		and fac.modelo_fk=$modelo";

		$result=DB::select($sql);
		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];

			for($ind2=0;$ind2<count($arradatosInd);$ind2++){

				if($objDato->indicador_fk==$arradatosInd[$ind2]->codigo){
					$arradatosInd[$ind2]->cantidad++;
					$arradatosInd[$ind2]->verdaderas=$objDato->calificacion;
					$arradatosInd[$ind2]->tipo_indicador=$objDato->tipo_indicador;
				}
			}
			
		}

//ind2121
		$sql="select ex.*,ind.tipo_indicador_fk as tipo_indicador
		from ind2121 ex
		INNER JOIN indicadores ind ON ind.codigo=ex.indicador_fk
		INNER JOIN aspectos asp ON asp.codigo=ind.aspectos_fk
		INNER JOIN caracteristicas car ON car.codigo=asp.caracteristicas_fk
		INNER JOIN factores fac on fac.codigo=car.factores_fk
		INNER JOIN modelos mo ON mo.codigo=fac.modelo_fk		 
		where ex.estado_fk=1
		and fac.modelo_fk=$modelo
		order by ex.c1 desc";

		$result=DB::select($sql);
		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];
			
			for($ind2=0;$ind2<count($arradatosInd);$ind2++){

				if($objDato->indicador_fk==$arradatosInd[$ind2]->codigo){
					$arradatosInd[$ind2]->verdaderas++;
				
				}
			}	
			
		}

//ind2122
		$sql="select ex.*,ind.tipo_indicador_fk as tipo_indicador
		from ind2122 ex
		INNER JOIN indicadores ind ON ind.codigo=ex.indicador_fk
		INNER JOIN aspectos asp ON asp.codigo=ind.aspectos_fk
		INNER JOIN caracteristicas car ON car.codigo=asp.caracteristicas_fk
		INNER JOIN factores fac on fac.codigo=car.factores_fk
		INNER JOIN modelos mo ON mo.codigo=fac.modelo_fk		 
		where ex.estado_fk=1
		and fac.modelo_fk=$modelo
		order by ex.c1 desc";

		$result=DB::select($sql);
		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];
			
			for($ind2=0;$ind2<count($arradatosInd);$ind2++){

				if($objDato->indicador_fk==$arradatosInd[$ind2]->codigo){
					$arradatosInd[$ind2]->verdaderas++;
				
				}
			}	
			
		}


//ind2235
		$sql="select ex.*, round(avg(c2),2) as calificacion,ind.tipo_indicador_fk as tipo_indicador
		from ind2235 ex
		INNER JOIN indicadores ind ON ind.codigo=ex.indicador_fk
		INNER JOIN aspectos asp ON asp.codigo=ind.aspectos_fk
		INNER JOIN caracteristicas car ON car.codigo=asp.caracteristicas_fk
		INNER JOIN factores fac on fac.codigo=car.factores_fk
		INNER JOIN modelos mo ON mo.codigo=fac.modelo_fk		 
		where ex.estado_fk=1
		and fac.modelo_fk=$modelo";

		$result=DB::select($sql);

		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];

			for($ind2=0;$ind2<count($arradatosInd);$ind2++){

				if($objDato->indicador_fk==$arradatosInd[$ind2]->codigo){
					$arradatosInd[$ind2]->cantidad++;
					$arradatosInd[$ind2]->verdaderas=$objDato->calificacion;
					$arradatosInd[$ind2]->tipo_indicador=$objDato->tipo_indicador;
				}
			}
			
		}

//ind2236
		$sql="select ex.*, round(avg(c2),2) as calificacion,ind.tipo_indicador_fk as tipo_indicador
		from ind2236 ex
		INNER JOIN indicadores ind ON ind.codigo=ex.indicador_fk
		INNER JOIN aspectos asp ON asp.codigo=ind.aspectos_fk
		INNER JOIN caracteristicas car ON car.codigo=asp.caracteristicas_fk
		INNER JOIN factores fac on fac.codigo=car.factores_fk
		INNER JOIN modelos mo ON mo.codigo=fac.modelo_fk		 
		where ex.estado_fk=1
		and fac.modelo_fk=$modelo";

		$result=DB::select($sql);

		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];

			for($ind2=0;$ind2<count($arradatosInd);$ind2++){

				if($objDato->indicador_fk==$arradatosInd[$ind2]->codigo){
					$arradatosInd[$ind2]->cantidad++;
					$arradatosInd[$ind2]->verdaderas=$objDato->calificacion;
					$arradatosInd[$ind2]->tipo_indicador=$objDato->tipo_indicador;
				}
			}
			
		}


//ind3331
		$sql="select ex.*, round(avg(c3),2) as calificacion,ind.tipo_indicador_fk as tipo_indicador
		from ind3331 ex
		INNER JOIN indicadores ind ON ind.codigo=ex.indicador_fk
		INNER JOIN aspectos asp ON asp.codigo=ind.aspectos_fk
		INNER JOIN caracteristicas car ON car.codigo=asp.caracteristicas_fk
		INNER JOIN factores fac on fac.codigo=car.factores_fk
		INNER JOIN modelos mo ON mo.codigo=fac.modelo_fk		 
		where ex.estado_fk=1
		and fac.modelo_fk=$modelo";

		$result=DB::select($sql);

		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];

			for($ind2=0;$ind2<count($arradatosInd);$ind2++){

				if($objDato->indicador_fk==$arradatosInd[$ind2]->codigo){
					$arradatosInd[$ind2]->cantidad++;
					$arradatosInd[$ind2]->verdaderas=$objDato->calificacion;
					$arradatosInd[$ind2]->tipo_indicador=$objDato->tipo_indicador;
				}
			}
			
		}		

//ind3332
		$sql="select ex.*, round(avg(c3),2) as calificacion,ind.tipo_indicador_fk as tipo_indicador
		from ind3332 ex
		INNER JOIN indicadores ind ON ind.codigo=ex.indicador_fk
		INNER JOIN aspectos asp ON asp.codigo=ind.aspectos_fk
		INNER JOIN caracteristicas car ON car.codigo=asp.caracteristicas_fk
		INNER JOIN factores fac on fac.codigo=car.factores_fk
		INNER JOIN modelos mo ON mo.codigo=fac.modelo_fk		 
		where ex.estado_fk=1
		and fac.modelo_fk=$modelo";

		$result=DB::select($sql);

		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];

			for($ind2=0;$ind2<count($arradatosInd);$ind2++){

				if($objDato->indicador_fk==$arradatosInd[$ind2]->codigo){
					$arradatosInd[$ind2]->cantidad++;
					$arradatosInd[$ind2]->verdaderas=$objDato->calificacion;
					$arradatosInd[$ind2]->tipo_indicador=$objDato->tipo_indicador;
				}
			}
			
		}		

//ind3333
		$sql="select ex.*, round(avg(c3),2) as calificacion,ind.tipo_indicador_fk as tipo_indicador
		from ind3333 ex
		INNER JOIN indicadores ind ON ind.codigo=ex.indicador_fk
		INNER JOIN aspectos asp ON asp.codigo=ind.aspectos_fk
		INNER JOIN caracteristicas car ON car.codigo=asp.caracteristicas_fk
		INNER JOIN factores fac on fac.codigo=car.factores_fk
		INNER JOIN modelos mo ON mo.codigo=fac.modelo_fk		 
		where ex.estado_fk=1
		and fac.modelo_fk=$modelo";

		$result=DB::select($sql);

		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];

			for($ind2=0;$ind2<count($arradatosInd);$ind2++){

				if($objDato->indicador_fk==$arradatosInd[$ind2]->codigo){
					$arradatosInd[$ind2]->cantidad++;
					$arradatosInd[$ind2]->verdaderas=$objDato->calificacion;
					$arradatosInd[$ind2]->tipo_indicador=$objDato->tipo_indicador;
				}
			}
			
		}		

//ind3334
		$sql="select ex.*, round(avg(c3),2) as calificacion,ind.tipo_indicador_fk as tipo_indicador
		from ind3334 ex
		INNER JOIN indicadores ind ON ind.codigo=ex.indicador_fk
		INNER JOIN aspectos asp ON asp.codigo=ind.aspectos_fk
		INNER JOIN caracteristicas car ON car.codigo=asp.caracteristicas_fk
		INNER JOIN factores fac on fac.codigo=car.factores_fk
		INNER JOIN modelos mo ON mo.codigo=fac.modelo_fk		 
		where ex.estado_fk=1
		and fac.modelo_fk=$modelo";

		$result=DB::select($sql);

		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];

			for($ind2=0;$ind2<count($arradatosInd);$ind2++){

				if($objDato->indicador_fk==$arradatosInd[$ind2]->codigo){
					$arradatosInd[$ind2]->cantidad++;
					$arradatosInd[$ind2]->verdaderas=$objDato->calificacion;
					$arradatosInd[$ind2]->tipo_indicador=$objDato->tipo_indicador;
				}
			}
			
		}		

//ind3335
		$sql="select ex.*, round(avg(c3),2) as calificacion,ind.tipo_indicador_fk as tipo_indicador
		from ind3335 ex
		INNER JOIN indicadores ind ON ind.codigo=ex.indicador_fk
		INNER JOIN aspectos asp ON asp.codigo=ind.aspectos_fk
		INNER JOIN caracteristicas car ON car.codigo=asp.caracteristicas_fk
		INNER JOIN factores fac on fac.codigo=car.factores_fk
		INNER JOIN modelos mo ON mo.codigo=fac.modelo_fk		 
		where ex.estado_fk=1
		and fac.modelo_fk=$modelo";

		$result=DB::select($sql);

		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];

			for($ind2=0;$ind2<count($arradatosInd);$ind2++){

				if($objDato->indicador_fk==$arradatosInd[$ind2]->codigo){
					$arradatosInd[$ind2]->cantidad++;
					$arradatosInd[$ind2]->verdaderas=$objDato->calificacion;
					$arradatosInd[$ind2]->tipo_indicador=$objDato->tipo_indicador;
				}
			}
			
		}		


//ind3336
		$sql="select ex.*, round(avg(c3),2) as calificacion,ind.tipo_indicador_fk as tipo_indicador
		from ind3336 ex
		INNER JOIN indicadores ind ON ind.codigo=ex.indicador_fk
		INNER JOIN aspectos asp ON asp.codigo=ind.aspectos_fk
		INNER JOIN caracteristicas car ON car.codigo=asp.caracteristicas_fk
		INNER JOIN factores fac on fac.codigo=car.factores_fk
		INNER JOIN modelos mo ON mo.codigo=fac.modelo_fk		 
		where ex.estado_fk=1
		and fac.modelo_fk=$modelo";

		$result=DB::select($sql);

		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];

			for($ind2=0;$ind2<count($arradatosInd);$ind2++){

				if($objDato->indicador_fk==$arradatosInd[$ind2]->codigo){
					$arradatosInd[$ind2]->cantidad++;
					$arradatosInd[$ind2]->verdaderas=$objDato->calificacion;
					$arradatosInd[$ind2]->tipo_indicador=$objDato->tipo_indicador;
				}
			}
			
		}		

//ind3341
		$sql="select ex.*, round(avg(c3),2) as calificacion,ind.tipo_indicador_fk as tipo_indicador
		from ind3341 ex
		INNER JOIN indicadores ind ON ind.codigo=ex.indicador_fk
		INNER JOIN aspectos asp ON asp.codigo=ind.aspectos_fk
		INNER JOIN caracteristicas car ON car.codigo=asp.caracteristicas_fk
		INNER JOIN factores fac on fac.codigo=car.factores_fk
		INNER JOIN modelos mo ON mo.codigo=fac.modelo_fk		 
		where ex.estado_fk=1
		and fac.modelo_fk=$modelo";

		$result=DB::select($sql);

		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];

			for($ind2=0;$ind2<count($arradatosInd);$ind2++){

				if($objDato->indicador_fk==$arradatosInd[$ind2]->codigo){
					$arradatosInd[$ind2]->cantidad++;
					$arradatosInd[$ind2]->verdaderas=$objDato->calificacion;
					$arradatosInd[$ind2]->tipo_indicador=$objDato->tipo_indicador;
				}
			}
			
		}		

//ind3342
		$sql="select ex.*, round(avg(c3),2) as calificacion,ind.tipo_indicador_fk as tipo_indicador
		from ind3342 ex
		INNER JOIN indicadores ind ON ind.codigo=ex.indicador_fk
		INNER JOIN aspectos asp ON asp.codigo=ind.aspectos_fk
		INNER JOIN caracteristicas car ON car.codigo=asp.caracteristicas_fk
		INNER JOIN factores fac on fac.codigo=car.factores_fk
		INNER JOIN modelos mo ON mo.codigo=fac.modelo_fk		 
		where ex.estado_fk=1
		and fac.modelo_fk=$modelo";

		$result=DB::select($sql);

		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];

			for($ind2=0;$ind2<count($arradatosInd);$ind2++){

				if($objDato->indicador_fk==$arradatosInd[$ind2]->codigo){
					$arradatosInd[$ind2]->cantidad++;
					$arradatosInd[$ind2]->verdaderas=$objDato->calificacion;
					$arradatosInd[$ind2]->tipo_indicador=$objDato->tipo_indicador;
				}
			}
			
		}		

//ind3343
		$sql="select ex.*, round(avg(c3),2) as calificacion,ind.tipo_indicador_fk as tipo_indicador
		from ind3343 ex
		INNER JOIN indicadores ind ON ind.codigo=ex.indicador_fk
		INNER JOIN aspectos asp ON asp.codigo=ind.aspectos_fk
		INNER JOIN caracteristicas car ON car.codigo=asp.caracteristicas_fk
		INNER JOIN factores fac on fac.codigo=car.factores_fk
		INNER JOIN modelos mo ON mo.codigo=fac.modelo_fk		 
		where ex.estado_fk=1
		and fac.modelo_fk=$modelo";

		$result=DB::select($sql);

		for($ind=0;$ind<count($result);$ind++){
			$objDato=$result[$ind];

			for($ind2=0;$ind2<count($arradatosInd);$ind2++){

				if($objDato->indicador_fk==$arradatosInd[$ind2]->codigo){
					$arradatosInd[$ind2]->cantidad++;
					$arradatosInd[$ind2]->verdaderas=$objDato->calificacion;
					$arradatosInd[$ind2]->tipo_indicador=$objDato->tipo_indicador;
				}
			}
			
		}		

		if($arrainput['tipo_result']=="json"){
			return Response::json(array("datos"=>$arradatosInd,"status"=>'ok'));
		}else{
			return $arradatos;
		}
		
	}

}
