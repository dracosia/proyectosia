<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', function()
{

	Session::forget('auth');
	Session::put('empresa', "1");//por defecto para la udi
	Session::forget('prog');
	return Redirect::to('/login');

});
Route::get('/home2', function()
{
	//verificacion de session
	$value = Session::get('auth');
	$pagina_controller=new AdminController();
	$result=$pagina_controller->verified($value);


	//si la sesion == ok entra
	if($result=="ok"){		
		//carga la vista del formulario.
		return View::make('home.index');
	}else{		
		return Response::make('<h1>No estas autorizado para entrar a esta pagina</h1>', 401);
	}	
	
});


Route::get('/login', function()
{
	Session::put('empresa', "1");//por defecto para la udi
	$vista_formularios = View::make('login.index');

	$perfiles_controller=new PerfilesController();
	$input_val=array();
	$input_val['codigo']="";
	$input_val['nombre']="";
	$input_val['estamento']="";
	$input_val['tipo_result']="array";
	$perfiles_arra=$perfiles_controller->buscar($input_val);
	$vista_formularios->arra_perfiles=$perfiles_arra;		



	Session::put('auth', '');
	Session::put('prog', '');
	return $vista_formularios;
});

// ######################################################
// ################# RUTAS PARA IND6221      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_6221',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind6221Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_6221',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind6221Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND6142      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_6142',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind6142Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_6142',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind6142Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});
// ######################################################
// ################# RUTAS PARA IND6141      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_6141',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind6141Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_6141',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind6141Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});
// ######################################################
// ################# RUTAS PARA IND5271      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_5271',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind5271Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_5271',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind5271Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND5252      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_5252',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind5252Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_5252',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind5252Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});
// ######################################################
// ################# RUTAS PARA IND5251      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_5251',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind5251Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_5251',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind5251Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});
// ######################################################
// ################# RUTAS PARA IND5241      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_5241',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind5241Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_5241',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind5241Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND5221      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_5221',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind5221Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_5221',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind5221Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});
// ######################################################
// ################# RUTAS PARA IND5153      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_5153',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind5153Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_5153',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind5153Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});


// ######################################################
// ################# RUTAS PARA IND5152      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_5152',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind5152Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_5152',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind5152Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND5151      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_5151',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind5151Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_5151',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind5151Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});
// ######################################################
// ################# RUTAS PARA IND4861      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_4861',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind4861Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_4861',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind4861Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND4821      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_4821',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind4821Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_4821',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind4821Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND4651      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_4651',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind4651Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_4651',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind4651Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});


// ######################################################
// ################# RUTAS PARA IND3632      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_3632',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3632Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_3632',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3632Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND3631      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_3631',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3631Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_3631',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3631Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});
// ######################################################
// ################# RUTAS PARA IND3612      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_3612',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3612Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_3612',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3612Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND3611      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_3611',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3611Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_3611',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3611Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND3422      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_3422',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3422Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_3422',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3422Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND3343      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_3421',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3421Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_3421',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3421Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND3343      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_3343',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3343Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_3343',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3343Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND3342      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_3342',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3342Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_3342',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3342Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND3341      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_3341',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3341Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_3341',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3341Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND3336      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_3336',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3336Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_3336',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3336Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND3335      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_3335',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3335Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_3335',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3335Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND3334      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_3334',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3334Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_3334',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3334Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});


// ######################################################
// ################# RUTAS PARA IND3333      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_3333',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3333Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_3333',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3333Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND3332      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_3332',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3332Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_3332',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3332Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND3331      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_3331',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3331Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_3331',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3331Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND3321c      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_3321c',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3321cController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_3321c',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3321cController();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND3321b      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_3321b',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3321bController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_3321b',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3321bController();		
		return $pagina_controller->guardar($arrainput);
	}	
});


// ######################################################
// ################# RUTAS PARA IND3321a      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_3321a',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3321aController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_3321a',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3321aController();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND3231       ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_3231',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3231Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_3231',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind3231Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});
// ######################################################
// ################# RUTAS PARA IND2236       ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_2236',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind2236Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_2236',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind2236Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND2235       ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_2235',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind2235Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_2235',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind2235Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA IND2122       ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_2122',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind2122Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_2122',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind2122Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});


// ######################################################
// ################# RUTAS PARA IND2121       ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_2121',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind2121Controller();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_2121',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ind2121Controller();		
		return $pagina_controller->guardar($arrainput);
	}	
});


// ######################################################
// ########## RUTAS PARA CONFIGURACION ENCUESTA##########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_configuracionencuesta',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ConfiguracionEncuestaController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_configuracionencuesta',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ConfiguracionEncuestaController();		
		return $pagina_controller->guardar($arrainput);
	}	
});


// ######################################################
// ################# RUTAS PARA CONFIGURACION#############
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_configuracion',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ConfiguracionController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_configuracion',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ConfiguracionController();		
		return $pagina_controller->guardar($arrainput);
	}	
});


// ######################################################
// ################# RUTAS PARA ENTREVISTAS   ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_entrevistas',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new EntrevistasController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_entrevistas',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new EntrevistasController();		
		return $pagina_controller->guardar($arrainput);
	}	
});


// ######################################################
// ################# RUTAS PARA TALLERES      ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_talleres',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new TalleresController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_talleres',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new TalleresController();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA GRUPOS FOCALES###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_gruposfocales',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new GruposfocalesController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_gruposfocales',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new GruposfocalesController();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA OBSERVACIÓN   ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_observacion',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ObservacionController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_observacion',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ObservacionController();		
		return $pagina_controller->guardar($arrainput);
	}	
});


// ######################################################
// ################# RUTAS PARA EXISTENCIAS   ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_entrevistas',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new EntrevistasController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_entrevistas',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new EntrevistasController();		
		return $pagina_controller->guardar($arrainput);
	}	
});


// ######################################################
// ################# RUTAS PARA EXISITENCIAS  ###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_exisitencias',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ExistenciasController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_existencias',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ExistenciasController();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA TIPO INDICADOR###########
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_tipoindicadores',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new TipoindicadoresController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_tipoindicadores',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new TipoindicadoresController();		
		return $pagina_controller->guardar($arrainput);
	}	
});




// ######################################################
// ################# RUTAS PARA SEDES  #################
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_sedes',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new SedesController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_sedes',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new SedesController();		
		return $pagina_controller->guardar($arrainput);
	}	
});


// ######################################################
// ################# RUTAS PARA EMPRESAS#################
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_empresas',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new EmpresasController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_empresas',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new EmpresasController();		
		return $pagina_controller->guardar($arrainput);
	}	
});




// ######################################################
// ################# RUTAS PARA USUARIOS#################
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_usuarios',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new UsuariosController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_usuarios',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new UsuariosController();		
		return $pagina_controller->guardar($arrainput);
	}	
});



// ######################################################
// ################# RUTAS PARA PERFILES#################
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_perfiles',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new PerfilesController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_perfiles',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new PerfilesController();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ################# RUTAS PARA FORMULARIOS##############
// ################# autor: JULIAN ALBERTO BALESTEROS####
// ######################################################
Route::post('/buscar_formularios',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new FormulariosController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_formularios',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new FormulariosController();		
		return $pagina_controller->guardar($arrainput);
	}	
});

// ######################################################
// ########### RUTAS PARA FORMULARIOS-PERFILES ##########
// ########### autor: JULIAN ALBERTO BALESTEROS #########
// ######################################################
Route::post('/buscar_formulariosperfiles',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new FormulariosperfilController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_formulariosperfiles',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new FormulariosperfilController();		
		return $pagina_controller->guardar($arrainput);
	}	
});



// ######################################################
// ################# RUTAS PARA MODELOS #################
// ################# autor: ANGEL FERNANDO LIZCANO ######
// ######################################################
Route::post('/buscar_modelo',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ModelosController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_modelo',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ModelosController();		
		return $pagina_controller->guardar($arrainput);
	}	
});



// ######################################################
// ################# RUTAS PARA PROGRAMAS ###############
// ################# autor: ANGEL FERNANDO LIZCANO ######
// ######################################################
Route::post('/buscar_programas',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ProgramasController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_programas',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ProgramasController();		
		return $pagina_controller->guardar($arrainput);
	}	
});



// ######################################################
// ################# RUTAS PARA FACTORES #################
// ################# autor: ANGEL FERNANDO LIZCANO ######
// ######################################################
Route::post('/buscar_factores',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new FactoresController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_factores',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new FactoresController();		
		return $pagina_controller->guardar($arrainput);
	}	
});


// ######################################################
// ################# RUTAS PARA CARACTERISTICAS #########
// ################# autor: ANGEL FERNANDO LIZCANO ######
// ######################################################
Route::post('/buscar_caracteristicas',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new CaracteristicasController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_caracteristicas',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new CaracteristicasController();		
		return $pagina_controller->guardar($arrainput);
	}	
});



// ######################################################
// ################# RUTAS PARA ASPECTOS ################
// ################# autor: ANGEL FERNANDO LIZCANO ######
// ######################################################
Route::post('/buscar_aspectos',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new AspectosController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_aspectos',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new AspectosController();		
		return $pagina_controller->guardar($arrainput);
	}	
});




// ######################################################
// ################# RUTAS PARA ASPECTOS ################
// ################# autor: ANGEL FERNANDO LIZCANO ######
// ######################################################
Route::post('/buscar_scripts',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ScriptsController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_scripts',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ScriptsController();		
		return $pagina_controller->guardar($arrainput);
	}	
});


// ######################################################
// ################# RUTAS PARA ASPECTOS ################
// ################# autor: ANGEL FERNANDO LIZCANO ######
// ######################################################
Route::post('/buscar_indicadores',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new IndicadoresController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_indicadores',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new IndicadoresController();		
		return $pagina_controller->guardar($arrainput);
	}	
});



// ######################################################
// ################# RUTAS PARA  modelo_programa ########
// ################# autor: ANGEL FERNANDO LIZCANO ######
// ######################################################
Route::post('/buscar_modelo_programa',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ProgramamodeloController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_modelo_programa',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new ProgramamodeloController();		
		return $pagina_controller->guardar($arrainput);
	}	
});



// ######################################################
// ################# RUTAS PARA  encuestas  ########
// ################# autor: ANGEL FERNANDO LIZCANO ######
// ######################################################
Route::post('/buscar_encuestas',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new CrearEncuestasController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/guardar_encuesta',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new CrearEncuestasController();		
		return $pagina_controller->guardar($arrainput);
	}	
});


Route::post('/lineas_encuesta',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new CrearEncuestasController();		
		return $pagina_controller->lineas($arrainput);
	}	
});



Route::post('/eliminar_encuesta',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new CrearEncuestasController();		
		return $pagina_controller->eliminar($arrainput);
	}	
});







Route::post('/get_encuesta_activa',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new RespEncuestaController();		
		return $pagina_controller->buscar($arrainput);
	}	
});


Route::post('/enviar_respuestas',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new RespEncuestaController();		
		return $pagina_controller->guardar_encuesta($arrainput);
	}	
});




// ######################################################
// ################# RUTAS PARA  calificacion    ########
// ################# autor: ANGEL FERNANDO LIZCANO ######
// ######################################################
Route::post('/buscar_calificacion',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new CalificacionController();
		
		return $pagina_controller->buscar($arrainput);
		
	}	
});

Route::post('/buscar_indicador_modelo',function(){
	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$pagina_controller=new IndicadoresController();
		
		return $pagina_controller->buscar_modelo($arrainput);
		
	}	
});




// RUTA GERNERICA PARA FORMULARIOS
// ######################################################
Route::get('/{formulario}', function($formulario)
{
	//verificacion de session
	$value = Session::get('auth');
	$pagina_controller=new AdminController();
	$result=$pagina_controller->verified($value);




	//si la sesion == ok entra
	if($result[0]["status"]=="ok"){		
		//carga la vista del formulario. Los datos del Usuario
		$datos_usuario=$result[0]["datos"];		
		if($formulario=="home"){
			$vista_formularios = View::make('home.index');
		}else{
			$vista_formularios = View::make('formularios.'.$formulario);
		}

		$vista_formularios->formulario=$formulario;
		

		$vista_formularios->nombre_usuario="".$datos_usuario[0]->nombres_usuario;
		$vista_formularios->perfil="".$datos_usuario[0]->perfil;

		$vista_formularios->perfil_fk="".$datos_usuario[0]->perfil_fk;

		$codigo_usuario="".$datos_usuario[0]->codigo;
		$vista_formularios->codigo_usuario="".$codigo_usuario;
		$estamento="".$datos_usuario[0]->estamento;

		$vista_formularios->estamento="".$estamento;

		
		//Enviar Modelos 
		$modelos_controller=new ModelosController();
		$input_val=array();
		$input_val['codigo']="";
		$input_val['nombre']="";
		$input_val['tipo_result']="array";
		$modelos_arra=$modelos_controller->buscar($input_val);
		$vista_formularios->arra_modelos=$modelos_arra;		


		//Enviar Factores 
		$factores_controller=new FactoresController();
		$input_val=array();
		$input_val['codigo']="";
		$input_val['nombre']="";
		$input_val['modelo']="";		
		$input_val['tipo_result']="array";
		$factores_arra=$factores_controller->buscar($input_val);
		$vista_formularios->arra_factores=$factores_arra;

		//datos para el combo de Modelos



		//Enviar Caracteristicas 
		$caracteristicas_controller=new CaracteristicasController();
		$input_val=array();
		$input_val['codigo']="";
		$input_val['nombre']="";
		$input_val['modelo']="";		
		$input_val['factor']="";		
		$input_val['tipo_result']="array";
		$caracteristicas_arra=$caracteristicas_controller->buscar($input_val);
		$vista_formularios->arra_caracteristicas=$caracteristicas_arra;


		//Enviar tipo scripts 
		$tipo_scripts_controller=new TiposcriptController();
		$input_val=array();
		$input_val['tipo_result']="array";
		$tipo_scripts_arra=$tipo_scripts_controller->buscar($input_val);
		$vista_formularios->arra_tipo_scripts=$tipo_scripts_arra;


		//Enviar tipo scripts 
		$tipo_indicadores_controller=new TipoindicadoresController();
		$input_val=array();
		$input_val['codigo']="";
		$input_val['nombre']="";
		$input_val['tipo_result']="array";
		$tipo_indicadores_arra=$tipo_indicadores_controller->buscar($input_val);
		$vista_formularios->arra_tipo_indicadores=$tipo_indicadores_arra;

		//Enviar scripts 
		$scripts_controller=new ScriptsController();
		$input_val=array();
		$input_val['codigo']="";
		$input_val['nombre']="";
		$input_val['tipo_script']="";		
		$input_val['tipo_result']="array";
		$scripts_arra=$scripts_controller->buscar($input_val);
		$vista_formularios->arra_scripts=$scripts_arra;

		//Enviar Aspectos 
		$aspectos_controller=new AspectosController();
		$input_val=array();
		$input_val['codigo']="";
		$input_val['nombre']="";
		$input_val['modelo']="";		
		$input_val['caracteristica']="";		
		$input_val['tipo_result']="array";
		$aspectos_arra=$aspectos_controller->buscar($input_val);
		$vista_formularios->arra_aspectos=$aspectos_arra;

		//Enviar Indicaodores 
		$indicadores_controller=new IndicadoresController();
		$input_val=array();
		$input_val['codigo']="";
		$input_val['nombre']="";
		$input_val['modelo']="";		
		$input_val['aspecto']="";		
		$input_val['tipo_result']="array";
		$input_val['tipo_indicador']="";
		$input_val['script']="";
		$indicadores_arra=$indicadores_controller->buscar($input_val);
		$vista_formularios->arra_indicadores=$indicadores_arra;


		//Enviar Modelos 
		$programas_controller=new ProgramasController();
		$input_val=array();
		$input_val['codigo']="";
		$input_val['nombre']="";
		$input_val['tipo_result']="array";
		$programas_arra=$programas_controller->buscar($input_val);
		$vista_formularios->arra_programas=$programas_arra;		



		//Enviar Perfiles --- JULIAN ALBERTO BALLESTEROS
		$perfiles_controller=new PerfilesController();
		$input_val=array();
		$input_val['codigo']="";
		$input_val['nombre']="";
		$input_val['estamento']="";
		$input_val['tipo_result']="array";
		$perfiles_arra=$perfiles_controller->buscar($input_val);
		$vista_formularios->arra_perfiles=$perfiles_arra;		



		//Enviar Formularios --- JULIAN ALBERTO BALLESTEROS
		$formularios_controller=new FormulariosController();
		$input_val=array();
		$input_val['codigo']="";
		$input_val['nombre']="";
		$input_val['tipo_result']="array";
		$formularios_arra=$formularios_controller->buscar($input_val);
		$vista_formularios->arra_formularios=$formularios_arra;	

		//Enviar Empresas --- JULIAN ALBERTO BALLESTEROS
		$empresas_controller=new EmpresasController();
		$input_val=array();
		$input_val['codigo']="";
		$input_val['nombre']="";
		$input_val['tipo_result']="array";
		$empresas_arra=$empresas_controller->buscar($input_val);
		$vista_formularios->arra_empresas=$empresas_arra;		

		//Enviar arra encuesta --- JULIAN ALBERTO BALLESTEROS
		$encuesta_controller=new CrearEncuestasController();
		$input_val=array();
		$input_val['codigo']="";
		$input_val['nombre']="";
		$input_val['modelo']="";
		$input_val['tipo_result']="array";
		$encuesta_arra=$encuesta_controller->buscar($input_val);
		$vista_formularios->arra_encuesta=$encuesta_arra;

		//Enviar Configuracion --- JULIAN ALBERTO BALLESTEROS
		$configuracion_controller=new ConfiguracionController();
		$input_val=array();
		$input_val['codigo']="";
		$input_val['periodo']="";
		$input_val['anoperiodo']="";
		$input_val['sede']="";	
		$input_val['empresa']="";			
		$input_val['tipo_result']="array";
		$configuraciones_arra=$configuracion_controller->buscar($input_val);
		$vista_formularios->arra_configuraciones=$configuraciones_arra;				

		//Enviar Sedes --- JULIAN ALBERTO BALLESTEROS
		$sedes_controller=new SedesController();
		$input_val=array();
		$input_val['codigo']="";
		$input_val['nombre']="";
		$input_val['empresa']="";		
		$input_val['tipo_result']="array";
		$sedes_arra=$sedes_controller->buscar($input_val);
		$vista_formularios->arra_sedes=$sedes_arra;		

		$fechaactual=date("Y-m-d");  
		$vista_formularios->fechaactual=$fechaactual;


		$estamentos_controller=new CrearEncuestasController();
		$input_val=array();
		$input_val['tipo_result']="array";
		$estamentos_arra=$estamentos_controller->get_estamentos($input_val);
		$vista_formularios->arra_estamentos=$estamentos_arra;		

		
		return $vista_formularios;
	}else{		
		return Response::make('<h1>No estas autorizado para entrar a esta pagina</h1>', 401);
	}	
});





Route::post('/login2', function()
{

	if(Request::ajax()){
		$arrainput=array();
		$arrainput=Input::all();

		$usuario=$arrainput["usuario"];
		$password=$arrainput["password"];
		$perfil=$arrainput["perfil"];
	


		$sql_uni="SELECT us.*, per.nombre as perfil 
				  from usuarios us
				  LEFT JOIN perfiles per ON per.codigo=us.perfil_fk
				  where us.usuario='$usuario' and us.password=password('$password') and us.perfil_fk=$perfil";
		$results = DB::select($sql_uni);	


		
		$nombre_perfil="";
		$programa_academico="";
		for($ind=0;$ind<count($results);$ind++){
			$objDato=$results[$ind];
			$nombre_perfil="".$objDato->perfil;
			$programa_academico="".$objDato->programa_fk;
		}
		
		if(count($results)>0){
			$hoy = date('h-i-s,j-m-y');
			$sessid = Hash::make($hoy."$usuario");
			Session::put('auth', $sessid);

			Session::put('prog', $programa_academico);

			$sql_uni="UPDATE usuarios SET sesid='$sessid' where usuario='$usuario'";
			$results = DB::update($sql_uni);	
			
			return Response::json(array('mensaje' =>    'Bienvenido', "status"=>'ok', "perfil"=>"$nombre_perfil"));
		}else{
			Session::forget('auth');
			return Response::json(array('mensaje' =>    'El usuario no existe', "status"=>'error'));
		}	

	}

});




