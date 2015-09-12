<?php

class UsuariosController extends BaseController {

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

		if($arrainput['perfil']!=""){
			$cadena.=" and fa.perfil_fk='".$arrainput['perfil']."'";
		}
								
		if($arrainput['programa']!=""){
			$cadena.=" and fa.programa_fk='".$arrainput['programa']."'";
		}
		$sql_uni="Select fa.*, mo.nombre as sede, lo.nombre as empresa, ko.nombre as perfil, po.nombre as programa 
				 from usuarios fa 
				 left join sedes mo on mo.codigo = fa.sede_fk 
				 left join empresas lo on lo.codigo = fa.empresa_fk 
				 left join perfiles ko on ko.codigo = fa.perfil_fk
				 left join programas po on po.codigo = fa.programa_fk 
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
		
			if($arrainput['codigo']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El código es obligatorio'));
			}

			if($arrainput['cod_universidad']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El Codigo de Universidad es obligatorio'));
			}	

			if($arrainput['identificacion']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El campo identificación es obligatorio'));
			}	

			if($arrainput['nombre']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El Nombre es obligatorio'));
			}	

			if($arrainput['apellido']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El Apellido es obligatorio'));
			}	

			if($arrainput['telefono']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El Telefono es obligatorio'));
			}	

			if($arrainput['direccion']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El Direccion es obligatorio'));
			}	

			if($arrainput['email']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El E-Mail es obligatorio'));
			}	

			if($arrainput['foto']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El Foto es obligatorio'));
			}	

			if($arrainput['sesid']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El SesionId es obligatorio'));
			}	

			if($arrainput['usuario']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El Usuario es obligatorio'));
			}	

			if($arrainput['sede']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El sede es obligatorio'));
			}	

			if($arrainput['empresa']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El empresa es obligatorio'));
			}	
			if($arrainput['perfil']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El perfil es obligatorio'));
			}	
			
			if($arrainput['programa']==""){
				return Response::json(array("status"=>'error',"mensaje"=>'El programa es obligatorio'));
			}	

			
			$codigo=$arrainput['codigo'];
			$cod_universidad=$arrainput['cod_universidad'];
			$identificacion=$arrainput['identificacion'];
			$nombre=$arrainput['nombre'];
			$apellidos=$arrainput['apellido'];
			$telefono=$arrainput['telefono'];
			$direccion=$arrainput['direccion'];
			$email=$arrainput['email']; 
			$foto=$arrainput['foto'];
			$password=$arrainput['password'];
			$sesid=$arrainput['sesid'];						
			$usuario=$arrainput['usuario'];			
			$sede=$arrainput['sede'];			
			$empresa=$arrainput['empresa'];
			$perfil=$arrainput['perfil'];
			$programa=$arrainput['programa'];
			$estado=$arrainput['estado'];
			$cadenapassword="";
			if ($password!=""){
			$cadenapassword="password=password('$password'),";
			}
			$campos="codigo='$codigo', cod_universidad='$cod_universidad', identificacion='$identificacion', nombre='$nombre', apellidos='$apellidos', telefono='$telefono', direccion='$direccion', email='$email', foto='$foto', sede_fk=$sede, $cadenapassword, empresa_fk=$empresa, perfil_fk=$perfil, programa_fk=$programa, estado_fk=$estado, sesid='$sesid', usuario='$usuario'";
			
		}else{
			//campos para eliminar 
			$campos=" estado_fk= 2 ";
		}

 

		if($arrainput['codigo_id']==""){
			//insertar
			
			$result=DB::insert("insert into usuarios set $campos");
			
		}else{
			// modificar o eliminar 
			
			$result=DB::update("update usuarios set $campos where codigo=".$arrainput['codigo_id']);
			
		}
		
		return Response::json(array("status"=>'ok',"mensaje"=>"Proceso generado correctamente."));
	}

}
