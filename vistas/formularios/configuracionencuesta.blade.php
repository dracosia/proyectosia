@extends('backoffice.index')
@section('contenido')   
        <div class="row">
            <div style="margin-left:15px;">
                <h2>Administración de Configuración de Encuesta</h2>
            </div>
            
            <div class="col-md-5">
                <form class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Gestión</strong> Configuración de Encuesta</h3>
                             <ul class="panel-controls">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>                                
                            </ul>                            
                        </div>

                        
                        <div class="panel-body">
                            <div class="row">
                                 <div class="col-md-12">
                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Encuesta</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" data-live-search="true" id="fiencuesta">
											<option value="">Ninguno</option> 
                                             @foreach ($arra_encuesta as $encuestas) 
                                                <option value="{{$encuestas->codigo}}">{{$encuestas->codigo." - ".$encuestas->descripcion}}</option>                                                
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Configuración</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" data-live-search="true" id="ficonfiguracion">
											<option value="">Ninguno</option> 
                                             @foreach ($arra_configuraciones as $configuraciones) 
                                                <option value="{{$configuraciones->codigo}}">{{$configuraciones->codigo." - Periodo(".$configuraciones->periodo.") del Año ".$configuraciones->anoperiodo}}</option>                                                
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>
									
                                     <!-- Estado -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Estado</label>
                                        <div class="col-md-9">                                                                                                                                        
                                            <label class="check"><input type="checkbox" id="fiestado" checked/> Activo</label>
                                            <span class="help-block">Estado de la configuración de encuesta por defecto "Activo"</span>
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
                        <h3 class="panel-title"><strong>Listado</strong> Configuración de Encuestas</h3>

                         <ul class="panel-controls">
                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                            
                        </ul>                 
                        
                    </div>


                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="row" style="margin-bottom:15px;">

                                        <div class="col-md-2">                            
                                            
											<select class="form-control select" data-live-search="true" id="txtencuestas">
												<option value="">Encuesta</option> 
	                                             @foreach ($arra_estamentos as $encuestas) 
	                                                <option value="{{$encuestas->codigo}}">{{$encuestas->nombre}}</option>                                                
	                                              @endforeach
	                                            </select>

                                        </div>

                                       <div class="col-md-2">                            
                                            
											<select class="form-control select" data-live-search="true" id="txtconfiguraciones">
												<option value="">Configuración</option> 
	                                             @foreach ($arra_configuraciones as $configuraciones) 
	                                                <option value="{{$configuraciones->codigo}}">{{$configuraciones->codigo}}</option>                                                
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
                                           
                                            <th>Encuesta</th>
                                            <th>Configuración</th>
                                            <th></th>
                                            <th></th>                                    
											<th></th>
											<th></th>
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
 
      	//var codigo=$("#txtcodigo").val();
        var encuesta=$("#txtencuestas").val();
		var configuracion=$("#txtconfiguraciones").val();


        var request = $.ajax({
          url: "buscar_configuracionencuesta",
          type: "POST",
          data:{
            //codigo:""+codigo,
			//periodo:""+periodo,
			//	anoperiodo:""+anoperiodo,
			encuesta:""+encuesta,
            configuracion:""+configuracion,
			tipo_result:"json"
          }
        });
        

        request.done(function(obj) { 
              
       
          if( obj.status == "ok"){     
            var i=0;          
            datos_configuracion=obj.datos;
            var cadena_tabla="";
             for(i=0;i<datos_configuracion.length;i++){
                cadena_tabla+=' <tr>';
               // cadena_tabla+='<td style="width:85px;">'+datos_configuracion[i].codigo+'</td>';
                cadena_tabla+='<td style="width:50% !important;">'+datos_configuracion[i].encuesta+'    </td>';
                cadena_tabla+='<td style="width:50% !important;">'+datos_configuracion[i].configuracion+'    </td>';


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
        cod_seleccionado=""+datos_configuracion[ind].codigo;
        //$("#ficodigo").val(""+datos_configuracion[ind].codigo);
		$('#ficonfiguracion').selectpicker('val', ""+datos_configuracion[ind].configuracion_fk);
		$('#fiencuesta').selectpicker('val', ""+datos_configuracion[ind].encuesta_fk);

        if(datos_configuracion[ind].estado_fk=="1"){
            $("#fiestado").prop("checked",true);
        }else{
            $("#fiestado").prop("checked",false);
        }
        $("#btnguardar").prop("disabled",true);
        
        
    }

    function limpiar(){
        cod_seleccionado="";
        //$("#ficodigo").val("");
        $('#fiencuesta').selectpicker('val', "");
        $('#ficonfiguracion').selectpicker('val', "");
        $("#btnguardar").prop("disabled",false);
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


        if($("#fiencuesta").val().trim()==""){
            mostrar_mensaje("error","El campo encuesta es obligatorio ");  
            return false;
        }      

        if($("#ficonfiguracion").val().trim()==""){
            mostrar_mensaje("error","El campo configuracion es obligatorio ");  
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


        var encuesta=$("#fiencuesta").val();
        var configuracion=$("#ficonfiguracion").val();
		
		var estado="";
        if($("#fiestado").is(":checked")){
            estado="1";
        }else{
             estado="2";
        }

        var request = $.ajax({
          url: "guardar_configuracionencuesta",
          type: "POST", 
          data:{
            //codigo:""+codigo,
            encuesta:""+encuesta,
			configuracion:""+configuracion,
            codigo_id:""+cod_seleccionado,
            tipo:tipo_operacion,
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
