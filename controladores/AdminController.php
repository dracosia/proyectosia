<?php

class AdminController extends BaseController {

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

	
	public function verified($sessid){

						
		$sql_uni="SELECT usu.*, concat_ws(' ',usu.nombre,usu.apellidos)as nombres_usuario, per.nombre as perfil , per.estamento_fk as estamento
				  from usuarios usu
				  left join perfiles per ON per.codigo=usu.perfil_fk
				  where usu.sesid='$sessid' and usu.sesid is not null and usu.sesid!=''";

		$results = DB::select($sql_uni);	

		$arraUsuario=array();	

		for($ind=0;$ind<count($results);$ind++){
			$objDato=$results[$ind];
			array_push($arraUsuario,$objDato);
		}
		if(count($results)>0){
			$arra_result=array();
			array_push($arra_result, array("status"=>'ok',"datos"=>$arraUsuario));
			return $arra_result;
		}else{
			$arra_result=array();
			array_push($arra_result, array("status"=>'error'));
			return $arra_result;
		}	
	
	}

}