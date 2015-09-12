@extends('backoffice.index')
@section('contenido')   
        <div class="row">
            <div style="margin-left:15px;">
                <h2>Administración de Formularios - Perfil.</h2>
            </div>
            
            <div class="col-md-5">
                <form class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Gestión</strong> Formularios Perfil</h3>
                             <ul class="panel-controls">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>                                
                            </ul>                            
                        </div>

                        
                        <div class="panel-body">
                            <div class="row">
                                 <div class="col-md-12">


                                     <!-- Insertar -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Insertar</label>
                                        <div class="col-md-9">                                                                                                                                        
                                            <label class="check"><input type="checkbox" id="fiinsertar" checked/> Si</label>
                                            <span class="help-block">Si</span>
                                        </div>
                                    </div>

 
                                    <!-- Visualizar -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Visualizar</label>
                                        <div class="col-md-9">                                                                                                                                        
                                            <label class="check"><input type="checkbox" id="fivisualizar" checked/> Si</label>
                                            <span class="help-block">Si</span>
                                        </div>
                                    </div>

                                    <!-- Modificar -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Modificar</label>
                                        <div class="col-md-9">                                                                                                                                        
                                            <label class="check"><input type="checkbox" id="fimodificar" checked/> Si</label>
                                            <span class="help-block">Si</span>
                                        </div>
                                    </div>

                                    <!-- Eliminar -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Eliminar</label>
                                        <div class="col-md-9">                                                                                                                                        
                                            <label class="check"><input type="checkbox" id="fieliminar" checked/> Si</label>
                                            <span class="help-block">Si</span>
                                        </div>
                                    </div>

                                    <!-- Imprimir -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Imprimir</label>
                                        <div class="col-md-9">                                                                                                                                        
                                            <label class="check"><input type="checkbox" id="fiimprimir" checked/> Si</label>
                                            <span class="help-block">Si</span>
                                        </div>
                                    </div>

                                    <!-- Perfiles -->

                                





                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Perfiles</label>
                                        <div class="col-md-9">                                                                                
                                             <select class="form-control select" data-live-search="true" id="fiperfiles">
                                                <option value="">Ninguno</option> 
                                                 @foreach ($arra_perfiles as $perfiles) 
                                                    <option value="{{$perfiles->codigo}}">{{$perfiles->nombre}}</option>                                                
                                                  @endforeach
                                                </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Formularios</label>
                                        <div class="col-md-9">                                                                                
                                             <select class="form-control select" data-live-search="true" id="fiformularios">
                                                     <option value="">Formulario</option> 
                                                     @foreach ($arra_formularios as $formularios) 
                                                        <option value="{{$formularios->codigo}}">{{$formularios->nombre}}</option>                                                
                                                      @endforeach
                                                    </select>
                                        </div>
                                    </div>

                                    
										
                                     <!-- Estado -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Estado</label>
                                        <div class="col-md-9">                                                                                                                                        
                                            <label class="check"><input type="checkbox" id="fiestado" checked/> Activo</label>
                                            <span class="help-block">Estado del Formulario - Peril por defecto "Activo"</span>
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
                        <h3 class="panel-title"><strong>Listado</strong> Formularios</h3>

                         <ul class="panel-controls">
                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                            
                        </ul>                 
                        
                    </div>


                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="row" style="margin-bottom:15px;">

                                        <div class="col-md-4">                            
                                            
											<select class="form-control select" data-live-search="true" id="txtformularios">
												<option value="">Formulario</option> 
	                                             @foreach ($arra_formularios as $formularios) 
	                                                <option value="{{$formularios->codigo}}">{{$formularios->nombre}}</option>                                                
	                                              @endforeach
	                                            </select>

                                        </div>

                                        <div class="col-md-4">                            
                                            
											<select class="form-control select" data-live-search="true" id="txtperfiles">
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
                                            <th>Insertar</th>
                                            <th>Visualizar</th>
                                            <th>Modificar</th>
                                            <th>Eliminar</th>
                                            <th>Imprimir</th>
                                            <th>Perfil</th>
                                            <th>Formulario</th>
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

    var datos_formulariosperfil=new Object();

   

    function cargar_listado(){
        var perfiles=$("#txtperfiles").val();
        var formularios=$("#txtformularios").val();
								
        var request = $.ajax({
          url: "buscar_formulariosperfiles",
          type: "POST",
          data:{
            perfiles:""+perfiles,
            formularios:""+formularios,
            tipo_result:"json"
          }
        });
        

        request.done(function(obj) { 
              
       
          if( obj.status == "ok"){     
            var i=0;          
            datos_perfiles=obj.datos;
            var cadena_tabla="";
             for(i=0;i<datos_perfiles.length;i++){
                cadena_tabla+=' <tr>';
                cadena_tabla+='<td style="width:25% !important;">'+datos_perfiles[i].insertar+'</td>';
                cadena_tabla+='<td style="width:25% !important;">'+datos_perfiles[i].visualizar+'    </td>';
                cadena_tabla+='<td style="width:25% !important;">'+datos_perfiles[i].modificar+'    </td>';
                cadena_tabla+='<td style="width:25% !important;">'+datos_perfiles[i].eliminar+'    </td>';
                cadena_tabla+='<td style="width:25% !important;">'+datos_perfiles[i].imprimir+'    </td>';

                cadena_tabla+='<td style="width:25% !important;">'+datos_perfiles[i].perfiles+'    </td>';
                cadena_tabla+='<td style="width:25% !important;">'+datos_perfiles[i].formularios+'    </td>';

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
		
		if(datos_perfiles[ind].insertar=="Si"){
            $("#fiinsertar").prop("checked",true);
        }else{
            $("#fiinsertar").prop("checked",false);
        }
      
	  	if(datos_perfiles[ind].visualizar=="Si"){
            $("#fivisualizar").prop("checked",true);
        }else{
            $("#fivisualizar").prop("checked",false);
        }
		
		if(datos_perfiles[ind].modificar=="Si"){
            $("#fimodificar").prop("checked",true);
        }else{
            $("#fimodificar").prop("checked",false);
        }

		if(datos_perfiles[ind].eliminar=="Si"){
            $("#fieliminar").prop("checked",true);
        }else{
            $("#fieliminar").prop("checked",false);
        }

		if(datos_perfiles[ind].imprimir=="Si"){
            $("#fiimprimir").prop("checked",true);
        }else{
            $("#fiimprimir").prop("checked",false);
        }
		
        if(datos_perfiles[ind].estado_fk=="1"){
            $("#fiestado").prop("checked",true);
        }else{
            $("#fiestado").prop("checked",false);
        }
        $("#btnguardar").prop("disabled",true);
        
        
    }

    function limpiar(){
        cod_seleccionado="";
        $("#ficodigo").val("");
        $("#fiinsertar").val("");
        $("#fivisualizar").val("");
        $("#fimodificar").val("");
        $("#fieliminar").val("");
        $("#fiimprimir").val("");
        $("#btnguardar").prop("disabled",false);
        $('#fiperfiles').selectpicker('val', "");
        $('#fiformularios').selectpicker('val', "");
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
        if($("#fiinsertar").val().trim()==""){
            mostrar_mensaje("error","El campo insertar es obligatorio ");  
            return false;
        }
        if($("#fivisualizar").val().trim()==""){
            mostrar_mensaje("error","El campo visualizar es obligatorio ");  
            return false;
        }      

        if($("#fimodificar").val().trim()==""){
            mostrar_mensaje("error","El campo modificar es obligatorio ");  
            return false;
        }      

        if($("#fieliminar").val().trim()==""){
            mostrar_mensaje("error","El campo eliminar es obligatorio ");  
            return false;
        }      

        if($("#fiimprimir").val().trim()==""){
            mostrar_mensaje("error","El campo imprimir es obligatorio ");  
            return false;
        }      

        if($("#fiformularios").val().trim()==""){
            mostrar_mensaje("error","El campo formulario es obligatorio ");  
            return false;
        }      

        if($("#fiperfiles").val().trim()==""){
            mostrar_mensaje("error","El campo perfil es obligatorio ");  
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


        var insertar="";
        if($("#fiinsertar").is(":checked")){
            insertar="Si";
        }else{
             insertar="No";
        }

        var visualizar="";
        if($("#fivisualizar").is(":checked")){
            visualizar="Si";
        }else{
             visualizar="No";
        }

        var modificar="";
        if($("#fimodificar").is(":checked")){
            modificar="Si";
        }else{
             modificar="No";
        }

        var eliminar="";
        if($("#fieliminar").is(":checked")){
            eliminar="Si";
        }else{
             eliminar="No";
        }

        var imprimir="";
        if($("#fiimprimir").is(":checked")){
            imprimir="Si";
        }else{
             imprimir="No";
        }

		
        var perfil=$("#fiperfiles").val();

        var formulario=$("#fiformularios").val();

        var estado="";
        if($("#fiestado").is(":checked")){
            estado="1";
        }else{
             estado="2";
        }

        var request = $.ajax({
          url: "guardar_formulariosperfiles",
          type: "POST",
          data:{
            insertar:""+insertar,
            visualizar:""+visualizar,
            modificar:""+modificar,
            eliminar:""+eliminar,
            imprimir:""+imprimir,
            codigo_id:""+cod_seleccionado,
            tipo:tipo_operacion,
            formulario:formulario,
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
