@extends('backoffice.index')
@section('contenido')   
        <div class="row">
            <div style="margin-left:15px;">
                <h2>Administración de Aspectos.</h2>
            </div>
            
            <div class="col-md-5">
                <form class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Gestión</strong> Aspectos</h3>
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
                                            <span class="help-block">Código del Aspecto</span>
                                        </div>
                                    </div>


                                     <!-- Nombre -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Nombre</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="finombre" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Nombre del Aspectos</span>
                                        </div>
                                    </div>

                                    <!-- Descripción -->
                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Descripción</label>
                                        <div class="col-md-9 col-xs-12">                                            
                                            <textarea class="form-control" id="fidescripcion" rows="5"></textarea>
                                            <span class="help-block">Descripción del Aspectos</span>
                                        </div>
                                    </div>


                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Modelo</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" data-live-search="true" id="fimodelo" onchange="buscar_factores('')">
											<option value="">Ninguno</option> 
                                             @foreach ($arra_modelos as $modelo) 
                                                <option value="{{$modelo->codigo}}">{{$modelo->nombre}}</option>                                                
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Factor</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" data-live-search="true" id="fifactores" onchange="buscar_caracteristicas('')">
											<option value="">Ninguno</option>                                           
                                            </select>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Característica</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" data-live-search="true" id="ficaracteristicas">
                                            <option value="">Ninguno</option>                                           
                                            </select>
                                        </div>
                                    </div>


                                     <!-- Estado -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Estado</label>
                                        <div class="col-md-9">                                                                                                                                        
                                            <label class="check"><input type="checkbox" id="fiestado" checked/> Activo</label>
                                            <span class="help-block">Estado de la característica por defecto "Activo"</span>
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
                        <h3 class="panel-title"><strong>Listado</strong> Aspectos</h3>

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


                                        <div class="col-md-2">                            
                                            
											<select class="form-control select" data-live-search="true" id="txtcaracteristicas">
												<option value="">Caracteristicas</option> 
	                                             @foreach ($arra_caracteristicas as $caracteristicas) 
	                                                <option value="{{$caracteristicas->codigo}}">{{$caracteristicas->nombre}}</option>                                                
	                                              @endforeach
	                                            </select>

                                        </div>

                                         <div class="col-md-1">    

                                         	 <div class="form-group">
                                                <a href="#" class="btn btn-success btn-lg mb-control-close" onclick="cargar_listado()">Filtrar</a>
                                            </div>                        
                                            
                                            
                                        </div>


                                    </div>
                               
                                <div id="conten_tabla">                                    
                                    
                                </div>
                            
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

    var datos_modelos=new Object();

   

    function cargar_listado(){
        var codigo=$("#txtcodigo").val();
        var nombre=$("#txtnombre").val();
        var caracteristica=$("#txtcaracteristicas").val();

        var request = $.ajax({
          url: "buscar_aspectos",
          type: "POST",
          data:{
            codigo:""+codigo,
            nombre:""+nombre,
            caracteristica:""+caracteristica,
            tipo_result:"json"
          }
        });


        
         var estru_tabla='<table class="table" id="tabla_generica">';
            estru_tabla+='                 <thead>';
            estru_tabla+='                                <tr>';
            estru_tabla+='                                    <th style="width:85px;">Codigo</th>';
            estru_tabla+='                                    <th>Nombre</th>';
            estru_tabla+='                                    <th>Descripción</th>';
            estru_tabla+='                                    <th>Característica</th>';
            estru_tabla+='                                    <th></th>';
            estru_tabla+='                                    <th></th>';
            estru_tabla+='                                    <th></th>  ';                                  
            estru_tabla+='                                </tr>';
            estru_tabla+='                            </thead>';
            estru_tabla+='                            <tbody id="tbody_tabla">';
                                       
            estru_tabla+='                            </tbody>';
            estru_tabla+='                        </table>';

        $("#conten_tabla").html(estru_tabla);

        request.done(function(obj) { 
              
       
          if( obj.status == "ok"){     
            var i=0;          
            datos_modelos=obj.datos;
            var cadena_tabla="";
             for(i=0;i<datos_modelos.length;i++){
                cadena_tabla+=' <tr>';
                cadena_tabla+='<td style="width:85px;">'+datos_modelos[i].id_codigo+'</td>';
                cadena_tabla+='<td style="width:25% !important;">'+datos_modelos[i].nombre+'</td>';
                cadena_tabla+='<td style="width:25% !important;">'+datos_modelos[i].descripcion+'    </td>';
                cadena_tabla+='<td style="width:25% !important;">'+datos_modelos[i].caracteristica+'    </td>';
                cadena_tabla+='<td><a href="#"><span style="font-size:15px;   color:green;" onclick="modificar('+i+')" class="fa fa-edit"></span></a></td>';
                cadena_tabla+='<td><a href="#"><span style="font-size:15px;" onclick="visualizar('+i+')" class="fa fa-eye"></a></td>';
                cadena_tabla+='<td><a href="#"><span style="font-size:15px; color:red;" class="fa fa-times-circle-o"  onclick="eliminar_registro('+i+')" ></a></td>';
                cadena_tabla+=' </tr>';
             }

            $("#tbody_tabla").html(""+cadena_tabla);  
             $('#tabla_generica').dataTable( { "ordering": false, "info": false, "lengthChange": false,"searching": false} );

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
     var ind_seleccionado=-1; 
    var visual="";   
    function visualizar(ind){
        //limpiar();
        ind_seleccionado=parseFloat(ind);
        visual="visualizar";
        cod_seleccionado=""+datos_modelos[ind].codigo;
        $("#ficodigo").val(""+datos_modelos[ind].id_codigo);
        $("#finombre").val(""+datos_modelos[ind].nombre);
        $("#fidescripcion").val(""+datos_modelos[ind].descripcion);
        $('#fimodelo').selectpicker('val', ""+datos_modelos[ind].modelo);

       // buscar_factores('visualizar');




      

        if(datos_modelos[ind].estados_fk=="1"){
            $("#fiestado").prop("checked",true);
        }else{
            $("#fiestado").prop("checked",false);
        }
        $("#btnguardar").prop("disabled",true);
        
        
    }

    function limpiar(){
        ind_seleccionado=-1; 
        cod_seleccionado="";
        visual="";
        
        $("#ficodigo").val("");
        $("#finombre").val("");
        $("#fidescripcion").val("");
        $("#btnguardar").prop("disabled",false);
        $('#fimodelo').selectpicker('val', "");

        $('#fifactores').html("").selectpicker('update');
        $('#fifactores').selectpicker('val', "");

        $('#ficaracteristicas').html("").selectpicker('update');
        $('#ficaracteristicas').selectpicker('val', "");

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
        if($("#finombre").val().trim()==""){
            mostrar_mensaje("error","El campo nombre es obligatorio ");  
            return false;
        }
        if($("#fidescripcion").val().trim()==""){
            mostrar_mensaje("error","El campo descripción es obligatorio ");  
            return false;
        }      

        if($("#ficaracteristicas").val().trim()==""){
            mostrar_mensaje("error","El campo caracteristica es obligatorio ");  
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
        var nombre=$("#finombre").val();
        var descripcion=$("#fidescripcion").val();

        var caracteristica=$("#ficaracteristicas").val();

        var estado="";
        if($("#fiestado").is(":checked")){
            estado="1";
        }else{
             estado="2";
        }

        var request = $.ajax({
          url: "guardar_aspectos",
          type: "POST",
          data:{
            codigo:""+codigo,
            nombre:""+nombre,
            descripcion:""+descripcion,
            codigo_id:""+cod_seleccionado,
            tipo:tipo_operacion,
            caracteristica:caracteristica,
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




    //buscar factores

    function buscar_factores(tipo){
        var modelo=$("#fimodelo").val();
      

        var request = $.ajax({
          url: "buscar_factores",
          type: "POST",
          data:{
            codigo:"",
            nombre:"",
            modelo:""+modelo,
            tipo_result:"json"
          }
        });        

        request.done(function(obj) { 
              
       
          if( obj.status == "ok"){     
            var i=0;          
           var dato_factor=obj.datos;
            var cadena_combo="";
             for(i=0;i<dato_factor.length;i++){
                cadena_combo+=' <option value="'+dato_factor[i].codigo+'" " >'+dato_factor[i].nombre+'</option>';
               
             }

             if(modelo==""){
             	cadena_combo=' <option value="">Ninguno</option>';
             }
             $("#fifactores").html(""+cadena_combo).selectpicker('refresh');  

            

            if(visual=='visualizar'){
                $('#fifactores').selectpicker('val', ""+datos_modelos[ind_seleccionado].factor);
             }
			else
			{
				buscar_caracteristicas($('#fifactores').val());
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


     //buscar factores

    function buscar_caracteristicas(tipo){
        var factor=$("#fifactores").val();
      

        var request = $.ajax({
          url: "buscar_caracteristicas",
          type: "POST",
          data:{
            codigo:"",
            nombre:"",
            factor:""+factor,
            tipo_result:"json"
          }
        });        

        request.done(function(obj) { 
              
       
          if( obj.status == "ok"){     
            var i=0;          
           var dato_carac=obj.datos;
            var cadena_combo="";
             for(i=0;i<dato_carac.length;i++){
                cadena_combo+=' <option value="'+dato_carac[i].codigo+'">'+dato_carac[i].nombre+'</option>';
               
             }

             if(factor==""){
                cadena_combo=' <option value="">Ninguno</option>';
             }
             $("#ficaracteristicas").html(""+cadena_combo).selectpicker('refresh');  

             if(visual=='visualizar'){
                $('#ficaracteristicas').selectpicker('val', ""+datos_modelos[ind_seleccionado].caracteristicas_fk);
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

</script>
@stop
