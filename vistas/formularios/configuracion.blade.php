@extends('backoffice.index')
@section('contenido')   
        <div class="row">
            <div style="margin-left:15px;">
                <h2>Administración de Configuración</h2>
            </div>
            
            <div class="col-md-5">
                <form class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Gestión</strong> Configuración</h3>
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
                                        <label class="col-md-3 control-label">Periodo</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="fiperiodo" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Periodo</span>
                                        </div>
                                    </div>

                                    <!-- Código -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Año Periodo</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="fianoperiodo" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Año Periodo</span>
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
                        <h3 class="panel-title"><strong>Listado</strong> Configuración</h3>

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


                                         <div class="col-md-1">    

                                         	 <div class="form-group">
                                                <a href="#" class="btn btn-success btn-lg mb-control-close" onclick="cargar_listado()">Filtrar</a>
                                            </div>                        
                                            
                                            
                                        </div>


                                    </div>
                               

                               <table class="table" id="tabla_generica">
                                    <thead>
                                        <tr>
                                           
                                            <th>Periodo</th>
                                            <th>Año Periodo</th>
                                            <th>Empresa</th>
                                            <th>Sede</th>                                    
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
        var sede=$("#txtsede").val();
		var empresa=$("#txtempresa").val();


        var request = $.ajax({
          url: "buscar_configuracion",
          type: "POST",
          data:{
            //codigo:""+codigo,
			//periodo:""+periodo,
			//	anoperiodo:""+anoperiodo,
			sede:""+sede,
            empresa:""+empresa,
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
                cadena_tabla+='<td style="width:25% !important;">'+datos_configuracion[i].periodo+'    </td>';
                cadena_tabla+='<td style="width:25% !important;">'+datos_configuracion[i].anoperiodo+'    </td>';
                cadena_tabla+='<td style="width:25% !important;">'+datos_configuracion[i].sede+'    </td>';
                cadena_tabla+='<td style="width:25% !important;">'+datos_configuracion[i].empresa+'    </td>';


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
        $("#fiperiodo").val(""+datos_configuracion[ind].periodo);
        $("#fianoperiodo").val(""+datos_configuracion[ind].anoperiodo);
        $('#fisedes').selectpicker('val', ""+datos_configuracion[ind].sede_fk);
        $('#fiempresas').selectpicker('val', ""+datos_configuracion[ind].empresa_fk);


        $("#btnguardar").prop("disabled",true);
        
        
    }

    function limpiar(){
        cod_seleccionado="";
        //$("#ficodigo").val("");
        $("#fiperiodo").val("");
        $("#fianoperiodo").val("");
        $("#btnguardar").prop("disabled",false);
        $('#fisedes').selectpicker('val', "");
        $('#fiempresas').selectpicker('val', "");
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

        if($("#fiperiodo").val().trim()==""){
            mostrar_mensaje("error","El campo periodo es obligatorio ");  
            return false;
        }
        if($("#fianoperiodo").val().trim()==""){
            mostrar_mensaje("error","El campo año del periodo es obligatorio ");  
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

        return true;  
    }
    var tipo_operacion="";
    //funcion para guardar, modificar, eliminar
    function enviar_informacion(){
        if(!validacion()){
            return;
        }


        var codigo=$("#ficodigo").val();
        var periodo=$("#fiperiodo").val();
        var anoperiodo=$("#fianoperiodo").val();
        var sede=$("#fisedes").val();
	    var empresa=$("#fiempresas").val();

		
		
		var estado="";
        if($("#fiestado").is(":checked")){
            estado="1";
        }else{
             estado="2";
        }

        var request = $.ajax({
          url: "guardar_configuracion",
          type: "POST", 
          data:{
            //codigo:""+codigo,
            periodo:""+periodo,
			anoperiodo:""+anoperiodo,
            codigo_id:""+cod_seleccionado,
            tipo:tipo_operacion,
            sede:sede,
            empresa:empresa


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
