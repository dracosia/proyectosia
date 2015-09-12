@extends('backoffice.index')
@section('contenido')   
        <div class="row">
            <div style="margin-left:15px;">
                <h2>Administración de Usuarios</h2>
            </div>
            
            <div class="col-md-5">
                <form class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Gestión</strong> Usuarios</h3>
                             <ul class="panel-controls">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>                                
                            </ul>                            
                        </div>

                        
                        <div class="panel-body">
                            <div class="row">
                                 <div class="col-md-12">


                                    <!-- Código -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Código</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="ficodigo" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Código del Usuario</span>
                                        </div>
                                    </div>

                                    <!-- Código -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Código</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="ficod_universidad" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Código de Universidad</span>
                                        </div>
                                    </div>

                                    <!-- Código -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Identificación</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="fiidentificacion" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Identificación</span>
                                        </div>
                                    </div>


                                     <!-- Nombre -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Nombres</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="finombre" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Nombres</span>
                                        </div>
                                    </div>

                                     <!-- Apellido -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Apellidos</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="fiapellido" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Apellidos</span>
                                        </div>
                                    </div>

                                     <!-- Telefono -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Telefono</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="fitelefono" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Telefono</span>
                                        </div>
                                    </div>

                                     <!-- Dirección -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Dirección</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="fidireccion" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Dirección</span>
                                        </div>
                                    </div>

                                     <!-- email -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">E-Mail</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="fiemail" class="form-control"/>

                                            </div>                                            
                                            <span class="help-block">E-Mail</span>
                                        </div>
                                    </div>

                                     <!-- foto -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Foto</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="fifoto" class="form-control"/>

                                            </div>                                            
                                            <span class="help-block">Foto</span>
                                        </div>
                                    </div>

                                     <!-- Password -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Password</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="fipassword" class="form-control"/>

                                            </div>                                            
                                            <span class="help-block">Password</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Sedes</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" data-live-search="true" id="fisedes">
											<option value="">Ninguno</option> 
                                             @foreach ($arra_sedes as $sedes) 
                                                <option value="{{$sedes->codigo}}">{{$sedes->nombre}}</option>                                                
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Empresa</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" data-live-search="true" id="fiempresas">
											<option value="">Ninguno</option> 
                                             @foreach ($arra_empresas as $empresas) 
                                                <option value="{{$empresas->codigo}}">{{$empresas->nombre}}</option>                                                
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Perfil</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" data-live-search="true" id="fiperfiles">
											<option value="">Ninguno</option> 
                                             @foreach ($arra_perfiles as $perfiles) 
                                                <option value="{{$perfiles->codigo}}">{{$perfiles->nombre}}</option>                                                
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>

                                     <!-- Estado -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Estado</label>
                                        <div class="col-md-9">                                                                                                                                        
                                            <label class="check"><input type="checkbox" id="fiestado" checked/> Activo</label>
                                            <span class="help-block">Estado del Usuario por defecto "Activo"</span>
                                        </div>
                                    </div>

                                     <!-- Sesión -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Sesión</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="fisesid" class="form-control"/>

                                            </div>                                            
                                            <span class="help-block">Sesión</span>
                                        </div>
                                    </div>

                                     <!-- Usuario -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Usuario</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="fiusuario" class="form-control"/>

                                            </div>                                            
                                            <span class="help-block">Usuario</span>
                                        </div>
                                    </div>



                                 </div>
                            </div>
                        </div>


                        <!--Botones -->
                        <div class="panel-footer">
                            <button class="btn btn-default" id="btncancelar">Cancelar</button>                                    
                            <button class="btn btn-success pull-right" id="btnguardar">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>




            <div class="col-md-7">
                <div class="panel panel-default">
                     <div class="panel-heading">
                        <h3 class="panel-title"><strong>Listado</strong> Usuarios</h3>

                         <ul class="panel-controls">
                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                            
                        </ul>                 
                        
                    </div>


                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="row" style="margin-bottom:15px;">

                                        <div class="col-md-3">                            
                                             <div class="form-group">
                                              
                                                                                         
                                                        <input type="text" id="txtcodigo" placeholder="Codigo" class="form-control"/>
                                             
                                            </div>
                                        </div>

                                        <div class="col-md-5">                            
                                             <div class="form-group">
                                                
                                                                                              
                                                 <input type="text" id="txtnombre" placeholder="Nombre" class="form-control"/>
                                               
                                            </div>
                                        </div>

                                        <div class="col-md-5">                            
                                             <div class="form-group">
                                                
                                                                                              
                                                 <input type="text" id="txtapellidos" placeholder="Apellidos" class="form-control"/>
                                               
                                            </div>
                                        </div>

                                        <div class="col-md-2">                            
                                            
											<select class="form-control select" data-live-search="true" id="txtempresa">
												<option value="">Empresa</option> 
	                                             @foreach ($arra_empresas as $empresas) 
	                                                <option value="{{$empresas->codigo}}">{{$empresas->nombre}}</option>                                                
	                                              @endforeach
	                                            </select>

                                        </div>

                                       <div class="col-md-2">                            
                                            
											<select class="form-control select" data-live-search="true" id="txtsede">
												<option value="">Sede</option> 
	                                             @foreach ($arra_sedes as $sedes) 
	                                                <option value="{{$sedes->codigo}}">{{$sedes->nombre}}</option>                                                
	                                              @endforeach
	                                            </select>

                                        </div>


                                        <div class="col-md-2">                            
                                            
											<select class="form-control select" data-live-search="true" id="txtperfil">
												<option value="">Perfil</option> 
	                                             @foreach ($arra_perfiles as $perfiles) 
	                                                <option value="{{$perfiles->codigo}}">{{$perfiles->nombre}}</option>                                                
	                                              @endforeach
	                                            </select>

                                        </div>

                                         <div class="col-md-1">    

                                         	 <div class="form-group">
                                                <a href="#" class="btn btn-success btn-lg mb-control-close" onclick="cargar_listado()">Filtrar</a>
                                            </div>                        
                                            
                                            
                                        </div>


                                    </div>
                               

                               <table class="table" id="tabla_generica">
                                    <thead>
                                        <tr>
                                            <th style="width:85px;">Codigo</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Sede</th>
                                            <th>Empresa</th>
                                            <th>Perfil</th>
                                            <th></th>                                    
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_tabla">
                                         

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


                </div>
            </div>

        </div>

        <div class="message-box animated fadeIn" data-sound="alert" id="alerta_confirmacion">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times-circle-o"></span>Quieres Eliminar este <strong>Registro</strong> ?</div>
                    <div class="mb-content">
                        <div id="mensaje_confirmacion"></div>
                       
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <button class="btn btn-danger btn-lg mb-control-close" id="btnyes">SI</button>
                            <button class="btn btn-default btn-lg mb-control-close" id="btnno">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



         <div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="alerta_error">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times"></span> Error!</div>
                    <div class="mb-content">
                        <p id="mensaje_error"></p>                    
                    </div>
                    <div class="mb-footer">
                        <button class="btn btn-default btn-lg pull-right mb-control-close" onclick="cerrar_mensaje()">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="message-box message-box-info animated fadeIn" data-sound="fail" id="alerta_alert">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-check"></span> Exito!</div>
                    <div class="mb-content">
                        <p id="mensaje_exito"></p>                    
                    </div>
                    <div class="mb-footer">
                        <button class="btn btn-default btn-lg pull-right mb-control-close" onclick="cerrar_mensaje()">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

@stop

@section('scripts')  
 <script type="text/javascript">


    $( document ).ready(function() {
        cargar_listado();        
    });


    $("#btnguardar").click(function( event ) {
         event.preventDefault();
         tipo_operacion="modificar_registro";
         enviar_informacion();
    });  

    $("#btncancelar").click(function( event ) {
         event.preventDefault();
         limpiar();
    });  

    var datos_usuarios=new Object();

   

    function cargar_listado(){
 
      	var codigo=$("#txtcodigo").val();
        var nombre=$("#txtnombre").val();
	    var apellido=$("#txtapellidos").val();
        var sede=$("#txtsede").val();
		var empresa=$("#txtempresa").val();
		var perfil=$("#txtperfil").val();

        var request = $.ajax({
          url: "buscar_usuarios",
          type: "POST",
          data:{
            codigo:""+codigo,
			nombre:""+nombre,
			apellido:""+apellido,
			sede:""+sede,
            empresa:""+empresa,
            perfil:""+perfil,
            tipo_result:"json"
          }
        });
        

        request.done(function(obj) { 
              
       
          if( obj.status == "ok"){     
            var i=0;          
            datos_usuarios=obj.datos;
            var cadena_tabla="";
             for(i=0;i<datos_usuarios.length;i++){
                cadena_tabla+=' <tr>';
                cadena_tabla+='<td style="width:85px;">'+datos_usuarios[i].codigo+'</td>';
                cadena_tabla+='<td style="width:25% !important;">'+datos_usuarios[i].nombre+'    </td>';
                cadena_tabla+='<td style="width:25% !important;">'+datos_usuarios[i].apellidos+'    </td>';
                cadena_tabla+='<td style="width:25% !important;">'+datos_usuarios[i].sede+'    </td>';
                cadena_tabla+='<td style="width:25% !important;">'+datos_usuarios[i].empresa+'    </td>';
                cadena_tabla+='<td style="width:25% !important;">'+datos_usuarios[i].perfil+'    </td>';

                cadena_tabla+='<td><a href="#"><span style="font-size:15px;   color:green;" onclick="modificar('+i+')" class="fa fa-edit"></span></a></td>';
                cadena_tabla+='<td><a href="#"><span style="font-size:15px;" onclick="visualizar('+i+')" class="fa fa-eye"></a></td>';
                cadena_tabla+='<td><a href="#"><span style="font-size:15px; color:red;" class="fa fa-times-circle-o"  onclick="eliminar_registro('+i+')" ></a></td>';
                cadena_tabla+=' </tr>';
             }

             $('#tabla_generica').dataTable( { destroy: true, "ordering": false, "info": false, "lengthChange": false,"searching": false} );

             $("#tbody_tabla").html(""+cadena_tabla);  



             if($("#tabla_generica").length > 0){    
                
                $("#tabla_generica").on('page.dt',function () {
                    onresize(100);
                });                
            }


          }else{
            

            $("#message-box-sound-2").show();
            $("#mensaje_error").html(""+obj.mensaje);
          }

        });
         



         //respuesta si falla
        request.fail(function(jqXHR, textStatus) {
             $("#message-box-sound-2").show();
             $("#mensaje_error").html("Error de servidor  " + textStatus );
         
        }); 
    }

    var cod_seleccionado="";    
    function visualizar(ind){
        limpiar();
        cod_seleccionado=""+datos_usuarios[ind].codigo;
        $("#ficodigo").val(""+datos_usuarios[ind].codigo);
        $("#ficod_universidad").val(""+datos_usuarios[ind].cod_universidad);
        $("#fiidentificacion").val(""+datos_usuarios[ind].identificacion);
        $("#finombre").val(""+datos_usuarios[ind].nombre);
        $("#fiapellido").val(""+datos_usuarios[ind].apellidos);
        $("#fitelefono").val(""+datos_usuarios[ind].telefono);
        $("#fidireccion").val(""+datos_usuarios[ind].direccion);
        $("#fiemail").val(""+datos_usuarios[ind].email);
        $("#fifoto").val(""+datos_usuarios[ind].foto);
        $("#fipassword").val(""+datos_usuarios[ind].password);
        $('#fisedes').selectpicker('val', ""+datos_usuarios[ind].sede_fk);
        $('#fiempresas').selectpicker('val', ""+datos_usuarios[ind].empresa_fk);
        $('#fiperfiles').selectpicker('val', ""+datos_usuarios[ind].perfil_fk);
        $("#fisesid").val(""+datos_usuarios[ind].sesid);
        $("#fiusuario").val(""+datos_usuarios[ind].usuario);      

        if(datos_usuarios[ind].estado_fk=="1"){
            $("#fiestado").prop("checked",true);
        }else{
            $("#fiestado").prop("checked",false);
        }
        $("#btnguardar").prop("disabled",true);
        
        
    }

    function limpiar(){
        cod_seleccionado="";
        $("#ficodigo").val("");
        $("#ficod_universidad").val("");
        $("#finombre").val("");
		$("#fiidentificacion").val("");
		$("#fiapellido").val("");
        $("#fitelefono").val("");
        $("#fidireccion").val("");
        $("#fiemail").val("");
        $("#fifoto").val("");
        $("#fipassword").val("");
        $("#fisesid").val("");
        $("#fiusuario").val("");
        $("#btnguardar").prop("disabled",false);
        $('#fisedes').selectpicker('val', "");
        $('#fiempresas').selectpicker('val', "");
        $('#fiperfiles').selectpicker('val', "");
        band_modificar="";
    }

    function eliminar_registro(ind){
        visualizar(ind);
        band_modificar="SI";
        tipo_operacion="eliminar";
        mostrar_mensaje("confirmacion","<p>Está seguro que desea eliminar este registro?</p><p>Presiona No si quieres cancelar la operación. Presiona SI para eliminar eliminar el registro</p>");
        $("#btnno").click(function( event ) {
             event.preventDefault();
             $("#alerta_confirmacion").hide();
             limpiar();
        });  

         $("#btnyes").click(function( event ) {
             event.preventDefault();
             enviar_informacion();
             $("#alerta_confirmacion").hide();
        });  
    }

    

    function modificar(ind){
        visualizar(ind);
        $("#btnguardar").prop("disabled",false);
        band_modificar="SI";
    }

    function validacion(){
        if($("#ficodigo").val().trim()==""){
            mostrar_mensaje("error","El campo codigo es obligatorio ");  
            return false;
        }
        if($("#ficod_universidad").val().trim()==""){
            mostrar_mensaje("error","El campo codigo universidad es obligatorio ");  
            return false;
        }
        if($("#fiidentificacion").val().trim()==""){
            mostrar_mensaje("error","El campo identificacion es obligatorio ");  
            return false;
        }      

        if($("#finombre").val().trim()==""){
            mostrar_mensaje("error","El campo nombre es obligatorio ");  
            return false;
        }      

        if($("#fiapellido").val().trim()==""){
            mostrar_mensaje("error","El campo apellido es obligatorio ");  
            return false;
        }      

        if($("#fitelefono").val().trim()==""){
            mostrar_mensaje("error","El campo telefono es obligatorio ");  
            return false;
        }      

        if($("#fidireccion").val().trim()==""){
            mostrar_mensaje("error","El campo direccion es obligatorio ");  
            return false;
        }      

        if($("#fiemail").val().trim()==""){
            mostrar_mensaje("error","El campo email es obligatorio ");  
            return false;
        }      

        if($("#fifoto").val().trim()==""){
            mostrar_mensaje("error","El campo foto es obligatorio ");  
            return false;
        }      

        if($("#fipassword").val().trim()==""){
            mostrar_mensaje("error","El campo password es obligatorio ");  
            return false;
        }      

        if($("#fisedes").val().trim()==""){
            mostrar_mensaje("error","El campo sede es obligatorio ");  
            return false;
        }      

        if($("#fiempresas").val().trim()==""){
            mostrar_mensaje("error","El campo empresa es obligatorio ");  
            return false;
        }      

        if($("#fiperfiles").val().trim()==""){
            mostrar_mensaje("error","El campo perfil es obligatorio ");  
            return false;
        }      

        if($("#fisesid").val().trim()==""){
            mostrar_mensaje("error","El campo sesión es obligatorio ");  
            return false;
        }      

        if($("#fiusuario").val().trim()==""){
            mostrar_mensaje("error","El campo usuario es obligatorio ");  
            return false;
        }      

        return true;  
    }
    var tipo_operacion="";
    //funcion para guardar, modificar, eliminar
    function enviar_informacion(){
        if(!validacion()){
            return;
        }


        var codigo=$("#ficodigo").val();
        var cod_universidad=$("#ficod_universidad").val();
        var identificacion=$("#fiindetificacion").val();
        var nombre=$("#finombre").val();
        var apellido=$("#fiapellido").val();
        var telefono=$("#fitelefono").val();		
        var direccion=$("#fidireccion").val();
        var email=$("#fiemail").val();
        var foto=$("#fifoto").val();
        var password=$("#fipassword").val();
        var sesid=$("#fisesid").val();
        var usuario=$("#fiusuario").val();

        var sede=$("#fisedes").val();
	    var empresa=$("#fiempresas").val();
	    var perfil=$("#fiperfiles").val();
		
		
		var estado="";
        if($("#fiestado").is(":checked")){
            estado="1";
        }else{
             estado="2";
        }

        var request = $.ajax({
          url: "guardar_usuarios",
          type: "POST", 
          data:{
            codigo:""+codigo,
            cod_universidad:""+cod_universidad,
			identificacion:""+identificacion,
            nombre:""+nombre,
            apellido:""+apellido,
            telefono:""+telefono,
            direccion:""+direccion,
            email:""+email,
            foto:""+foto,
            password:""+password,
            sesid:""+sesid,
            usuario:""+usuario,
            codigo_id:""+cod_seleccionado,
            tipo:tipo_operacion,
            sede:sede,
            empresa:empresa,
            perfil:perfil,
            estado:estado
          }
        });
        

        request.done(function(obj) {       
          if( obj.status == "ok"){     
            mostrar_mensaje("alert",""+obj.mensaje);
            cargar_listado();
            limpiar();
          }else{
            mostrar_mensaje("error",""+obj.mensaje);                         
          }

      });

        request.fail(function(jqXHR, textStatus) {
           mostrar_mensaje("error","Error del servidor ");  
            
        });

    }

    var form_mensaje="";
    function mostrar_mensaje(tipo,mensaje){
        if(tipo=="error"){

            $("#mensaje_error").html(""+mensaje);
            $("#alerta_error").show();
            form_mensaje="alerta_error";

        }else if(tipo=="alert"){

            $("#mensaje_exito").html(""+mensaje);
            $("#alerta_alert").show();
            form_mensaje="alerta_alert";

        }else if(tipo=="confirmacion"){

            $("#mensaje_confirmacion").html(""+mensaje);
            $("#alerta_confirmacion").show();
            form_mensaje="alerta_confirmacion";

        }
       
    }

     function cerrar_mensaje(){
        $("#"+form_mensaje).hide();
    }

</script>
@stop
