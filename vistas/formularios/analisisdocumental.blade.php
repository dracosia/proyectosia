@extends('backoffice.index')
@section('contenido')   
        <div class="row">
            <div style="margin-left:15px;">
                <h2>Administración de Análisis Documental.</h2>
            </div>
            
            <div class="col-md-4">
                <form class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Gestión</strong> Análisis Documental</h3>
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
                                        <label class="col-md-3 control-label">Programa</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" data-live-search="true" id="fiprogramas" onchange="buscar_modelos_progamas('')">
                                            <option value="">Ninguno</option> 
                                             @foreach ($arra_programas as $prog) 
                                                <option value="{{$prog->codigo}}">{{$prog->nombre}}</option>                                                
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>


                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Modelo</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" data-live-search="true" id="fimodelo" onchange="buscar_factores('')">
                                            <option value="">Ninguno</option>
                                            </select>
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
                                            <span class="help-block">Nombre de la encuesta</span>
                                        </div>
                                    </div>

                                    <!-- Descripción -->
                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Descripción</label>
                                        <div class="col-md-9 col-xs-12">                                            
                                            <textarea class="form-control" id="fidescripcion" rows="5"></textarea>
                                            <span class="help-block">Descripción de la Encuesta</span>
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

                                    
                                    <hr />

                                     <h4>Agregar Indicador</h4>


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
                                            <select class="form-control select" data-live-search="true" id="ficaracteristicas" onchange="buscar_aspectos('')">
                                            <option value="">Ninguno</option>                                           
                                            </select>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Aspecto</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" data-live-search="true" id="fiaspecto">
                                            <option value="">Ninguno</option>                                           
                                            </select>
                                        </div>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Indicador (Tipo Análisis Documental)</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" data-live-search="true" id="fiindicador">
                                            <option value="">Ninguno</option>                                           
                                            </select>
                                        </div>
                                    </div>



                                     <button class="btn btn-info pull-right" id="btnagregar" >Agregar Indicador >> </button>

                                

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

            

             <div class="col-md-8">
            <div class="col-md-12">
                <div class="panel panel-default panel-toggled">
                     <div class="panel-heading">
                        <h3 class="panel-title"><strong>Listado</strong> Indicadores de Análisis Documental</h3>

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
                                            
											<select class="form-control select" data-live-search="true" id="txtaspectos">
												<option value="">Aspectos</option> 
	                                             @foreach ($arra_aspectos as $aspectos) 
	                                                <option value="{{$aspectos->codigo}}">{{$aspectos->nombre}}</option>                                                
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
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Aspecto</th>
                                            <th>Tipo</th>
                                            <th>Script</th>
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


                <div class="col-md-12">

                    <div class="panel panel-default">
                             <div class="panel-heading">
                                <h3 class="panel-title"><strong>Estructuración</strong> Del Análisis Documental</h3>

                                 <ul class="panel-controls">
                                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                    
                                </ul>                 
                                
                            </div>

                            
                             <div class="panel-body">
                                <div class="row" id="contenedor_indicadores">
                                    
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

    var arra_respuesta_multi;
    $( document ).ready(function() {
        arra_respuesta_multi=["Totalmente", "Parcialmente", "Mínimamente"];
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

    $("#btnagregar").click(function( event ) {
         event.preventDefault();
         agregar_indicador();
    });  

    

    var datos_modelos=new Object();

   

   

    function cargar_listado(){
        var codigo=$("#txtcodigo").val();
        var nombre=$("#txtnombre").val();
        var aspecto=$("#txtaspectos").val();

        var tipo_indicador="";
        var script="";


        var request = $.ajax({
          url: "buscar_indicadores",
          type: "POST",
          data:{
            codigo:""+codigo,
            nombre:""+nombre,
            aspecto:""+aspecto,
            tipo_indicador:""+tipo_indicador,
            script:""+script,
            tipo_result:"json"
          }
        });
        

        request.done(function(obj) { 
              
       
          if( obj.status == "ok"){     
            var i=0;          
            datos_modelos=obj.datos;
            var cadena_tabla="";
             for(i=0;i<datos_modelos.length;i++){
                cadena_tabla+=' <tr>';
                cadena_tabla+='<td style="width:85px;">'+datos_modelos[i].id_codigo+'</td>';
                cadena_tabla+='<td style="width:20% !important;">'+datos_modelos[i].nombre+'</td>';
                cadena_tabla+='<td style="width:20% !important;">'+datos_modelos[i].descripcion+'    </td>';
                cadena_tabla+='<td style="width:20% !important;">'+datos_modelos[i].aspecto+'    </td>';
                cadena_tabla+='<td style="width:20% !important;">'+datos_modelos[i].tipo_indicador+'    </td>';
                cadena_tabla+='<td style="width:20% !important;">'+datos_modelos[i].script+'    </td>';
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

    var cod_seleccionado=-1;    
    var indice_select="";
    function visualizar(ind){
        limpiar();
        indice_select=ind;
        cod_seleccionado=""+datos_modelos[ind].codigo;
        $("#ficodigo").val(""+datos_modelos[ind].id_codigo);
        $("#finombre").val(""+datos_modelos[ind].nombre);
        $("#fidescripcion").val(""+datos_modelos[ind].descripcion);

        $('#fiscript').selectpicker('val', ""+datos_modelos[ind].scripts_fk);
        $('#fitipoindicador').selectpicker('val', ""+datos_modelos[ind].tipo_indicador_fk);

        $('#fimodelo').selectpicker('val', ""+datos_modelos[ind].modelo);

        buscar_factores('visualizar');




      

        if(datos_modelos[ind].estado_fk=="1"){
            $("#fiestado").prop("checked",true);
        }else{
            $("#fiestado").prop("checked",false);
        }
        $("#btnguardar").prop("disabled",true);
        
        
    }

    function limpiar(){
        cod_seleccionado="";
        $("#ficodigo").val("");
        $("#finombre").val("");
        $("#fidescripcion").val("");
        $("#btnguardar").prop("disabled",false);

        $('#fitipoindicador').selectpicker('val', "");
        $('#fiscript').selectpicker('val', "");
        
        $('#fimodelo').selectpicker('val', "");

        $('#fifactores').html("").selectpicker('update');
        $('#fifactores').selectpicker('val', "");

        $('#ficaracteristicas').html("").selectpicker('update');
        $('#ficaracteristicas').selectpicker('val', "");

         $('#fiaspecto').html("").selectpicker('update');
        $('#fiaspecto').selectpicker('val', "");

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

        return true;  
    }
    var tipo_operacion="";
    //funcion para guardar, modificar, eliminar
    function enviar_informacion(){
        if(!validacion()){
            return;
        }

        var cadena_encuesta=get_cadena_encuesta();

        if(cadena_encuesta.trim()==""){
            mostrar_mensaje("error","No se agregó ninguna pregunta");  
            return false;
        }


        

       
        var request = $.ajax({
          url: "guardar_encuesta",
          type: "POST",
          data:{            
            cadena_encuesta:cadena_encuesta
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

    //buscar modelos...

     function buscar_modelos_progamas(tipo){
        var programas=$("#fiprogramas").val();
      

        var request = $.ajax({
          url: "buscar_modelo_programa",
          type: "POST",
          data:{
            codigo:"",
            nombre:"",
            programa:""+programas,
            modelo:"",
            tipo_result:"json"
          }
        });        

        

        request.done(function(obj) { 
                     
          if( obj.status == "ok"){     
            var i=0;          
           var dato_prog_modelos=obj.datos;
            var cadena_combo="";
             for(i=0;i<dato_prog_modelos.length;i++){
                cadena_combo+=' <option value="'+dato_prog_modelos[i].modelo_fk+'"  >'+dato_prog_modelos[i].modelo+'</option>';
               
             }

             if(programas==""){
                cadena_combo=' <option value="">Ninguno</option>';
             }
             $("#fimodelo").html(""+cadena_combo).selectpicker('refresh');  

             if(tipo=='visualizar'){
                $('#fimodelo').selectpicker('val', ""+datos_modelos[indice_select].modelo_fk);
                
             }
             buscar_factores();

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
                cadena_combo+=' <option value="'+dato_factor[i].codigo+'"  >'+dato_factor[i].id_codigo+' - '+dato_factor[i].nombre+'</option>';
               
             }

             if(modelo==""){
             	cadena_combo=' <option value="">Ninguno</option>';
             }
             $("#fifactores").html(""+cadena_combo).selectpicker('refresh');  

             if(tipo=='visualizar'){
             	$('#fifactores').selectpicker('val', ""+datos_modelos[indice_select].factor_fk);
                
             }
             buscar_caracteristicas(tipo);

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
                cadena_combo+=' <option value="'+dato_carac[i].codigo+'"> '+dato_carac[i].id_codigo+' - '+dato_carac[i].nombre+'</option>';
               
             }

             if(factor==""){
                cadena_combo=' <option value="">Ninguno</option>';
             }
             $("#ficaracteristicas").html(""+cadena_combo).selectpicker('refresh');  

             if(tipo=='visualizar'){
                $('#ficaracteristicas').selectpicker('val', ""+datos_modelos[indice_select].caracteristica_fk);
             }

             buscar_aspectos(tipo);
             


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

    function buscar_aspectos(tipo){
        var caracteristica=$("#ficaracteristicas").val();
      

        var request = $.ajax({
          url: "buscar_aspectos",
          type: "POST",
          data:{
            codigo:"",
            nombre:"",
            caracteristica:""+caracteristica,
            tipo_result:"json"
          }
        });        

        request.done(function(obj) { 
              
       
          if( obj.status == "ok"){     
            var i=0;          
           var dato_carac=obj.datos;
            var cadena_combo="";
             for(i=0;i<dato_carac.length;i++){
                cadena_combo+=' <option value="'+dato_carac[i].codigo+'">'+dato_carac[i].id_codigo+' -'+dato_carac[i].nombre+'</option>';
               
             }

             if(caracteristica==""){
                cadena_combo=' <option value="">Ninguno</option>';
             }
             $("#fiaspecto").html(""+cadena_combo).selectpicker('refresh');  

             if(tipo=='visualizar'){
                $('#fiaspecto').selectpicker('val', ""+datos_modelos[indice_select].aspecto_fk);
             }

             buscar_indicadores(tipo);
             


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



    var arra_indicador=new Array();

    function buscar_indicadores(tipo){
        var aspectos=$("#fiaspecto").val();
      
      arra_indicador=new Array();

        var request = $.ajax({
          url: "buscar_indicadores",
          type: "POST",
          data:{
            codigo:"",
            nombre:"",
            aspecto:""+aspectos,           
            tipo_indicador:"7",
            script:"",

            tipo_result:"json"
          }
        });        

        request.done(function(obj) { 
              
       
          if( obj.status == "ok"){     
            var i=0;          
           var dato_carac=obj.datos;
            var cadena_combo="";
             for(i=0;i<dato_carac.length;i++){
                cadena_combo+=' <option value="'+dato_carac[i].codigo+'">'+dato_carac[i].id_codigo+' - '+dato_carac[i].nombre+'</option>';

                arra_indicador.push(dato_carac[i]);
             }

             if(aspectos==""){
                cadena_combo=' <option value="">Ninguno</option>';
             }
             $("#fiindicador").html(""+cadena_combo).selectpicker('refresh');  

             if(tipo=='visualizar'){
                $('#fiindicador').selectpicker('val', ""+datos_modelos[indice_select].indicador_fk);
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



    // programacion para encuestas.

     function borrar_indicadores(id_ind){


        for(var i=0;i<arra_datos_encuesta.length;i++){
            if(arra_datos_encuesta[i].codigo_indicador==id_ind){
                arra_datos_encuesta[i].estado="eliminado";
                for(var j=0;j=arra_pregunta.length;j++){
                    if(arra_pregunta[j].codigo_indicador==id_ind){
                        arra_pregunta[j].estado="eliminado";
                        for (var k = 0; k < arra_respuestas.length; k++) {
                            if(arra_respuestas[k].codigo_pregunta==arra_pregunta[j].codigo){
                                arra_respuestas[k].estado="eliminado";
                            }
                        } 
                    }
                }
            }
        }

        $("#indicador_content_"+id_ind).remove();
    }

    function borrar_pregunta(id_ind){
        for(var i=0;i<arra_pregunta.length;i++){
            if(arra_pregunta[i].codigo_pregunta==id_ind){
                arra_pregunta[i].estado="eliminado";
            }
        }
        $("#panel_pregunta_"+id_ind).remove();
    }

   

    var arra_datos_encuesta=new Array();
    var arra_pregunta=new Array();
    var arra_respuestas=new Array();

    function agregar_indicador(){

        if($('#fiindicador').val()==""){
             $("#message-box-sound-2").show();
             $("#mensaje_error").html("Debe seleccionar un indicador");
             return;
        }
        var obj_indi_sel=new Object();
        var indicador_sel=""+$('#fiindicador').val();
        for(var i=0;i<arra_indicador.length;i++){
            if(arra_indicador[i].codigo==indicador_sel){
                obj_indi_sel=arra_indicador[i];
                break;
            }
        }
        var cod_gen_indicador=""+obj_indi_sel.id_codigo;
        var cod_indicador=""+obj_indi_sel.codigo;
        var descripcion_indicador=""+obj_indi_sel.descripcion;

        if(get_existe_indicador(cod_indicador)){
              mostrar_mensaje("error","El Indicador ya fue agregado, selecciona otro.");  
            return;
        }

        var cadena_indicad="";

        cadena_indicad+='<div class="col-md-12" style="background-color:#E5E8E5; padding:5px; margin-bottom:15px;" id="indicador_content_'+cod_indicador+'">';

        cadena_indicad+=' <ul class="panel-controls">';
        cadena_indicad+='     <li><a href="#" onclick="borrar_indicadores('+cod_indicador+')" class="eliminar_indicador"><span class="fa fa-times"></span></a></li>';
        cadena_indicad+=' </ul> ';

        cadena_indicad+='   <div class="row">';
        cadena_indicad+='       <div class="col-md-12" style="margin-top:10px;" >';
        cadena_indicad+='           <div class="form-group">';
        cadena_indicad+='               <div class="row">';
        cadena_indicad+='                  <label class="col-md-2 control-label">'+cod_gen_indicador+'</label>';
        cadena_indicad+='                  <div class="col-md-10">   ';
        cadena_indicad+='                      <p>'+descripcion_indicador+'</p>';
        cadena_indicad+='                 </div>';
        cadena_indicad+='               </div>';
        cadena_indicad+='               <div class="row" style="margin-top:10px; margin-bottom:10px;">';
        cadena_indicad+='                  <button class="btn btn-info col-md-12" id="btnguardar" onclick="agregar_pregunta('+cod_indicador+')"><i class="fa fa-plus-circle"></i>Agregar Pregunta a Indicador</button> ';
        cadena_indicad+='               </div>';
        cadena_indicad+='               <div id="contenedor_preguntas'+cod_indicador+'">';
        cadena_indicad+='               </div>';
        cadena_indicad+='           </div>';
        cadena_indicad+='       </div>';
        cadena_indicad+='   </div>';
        cadena_indicad+='</div>';

        $("#contenedor_indicadores").append(""+cadena_indicad);

        var obj_indicador=new Object();
        obj_indicador.codigo_indicador=cod_indicador;
        obj_indicador.estado="activo";
        arra_datos_encuesta.push(obj_indicador);

    }


    function get_existe_indicador(cod_indi){
        for(var i=0;i<arra_datos_encuesta.length;i++){
            if(arra_datos_encuesta[i].codigo_indicador==cod_indi && arra_datos_encuesta[i].estado=="activo"){
                return true;
            }
        }

        return false;
    }

    var cont_preguntas=0;

    function agregar_pregunta(cod_preg){
        cont_preguntas++;
        var cadena_preguntas="";
        cadena_preguntas ='<div style="margin:10px; background-color:#DDD; padding:5px; border: 1px solid #CCC; border-radius: 10px;" id="panel_pregunta_'+cont_preguntas+'">';
        cadena_preguntas+=' <ul class="panel-controls">';
        cadena_preguntas+='     <li><a href="#" class="eliminar_pregunta" onclick="borrar_pregunta('+cont_preguntas+')"><span class="fa fa-times"></span></a></li>';
        cadena_preguntas+=' </ul> ';
        cadena_preguntas+=' <div class="row">';
        cadena_preguntas+='     <label class="col-md-2 control-label">Pregunta</label>';
        cadena_preguntas+='     <div class="col-md-8">';
        cadena_preguntas+='         <textarea type="text" class="form-control" onfocusout="modificar_pregunta('+cont_preguntas+')"  id="descripcion_pregunta_'+cont_preguntas+'"></textarea>';
        cadena_preguntas+='     </div> ';
        cadena_preguntas+=' </div>';
        cadena_preguntas+=' <div class="row">';
        cadena_preguntas+='     <label class="col-md-2 control-label">Tipo Pregunta</label>';
        cadena_preguntas+='     <div class="col-md-8"> ';
        cadena_preguntas+='         <select class="form-control select" id="fitipopregunta'+cont_preguntas+'" onchange="change_tipo_pregunta('+cont_preguntas+')">';
        cadena_preguntas+='             <option value="0">Ninguna</option>     ';
        cadena_preguntas+='             <option value="1">Multiple Respuesta (Totalmente, parcialmente, mínimamente ....)</option>   ';
        cadena_preguntas+='         </select>';
        cadena_preguntas+='     </div>';
        cadena_preguntas+='    </div>';
        cadena_preguntas+=' <div style="margin-top:10px; margin-bottom:10px;">';        
        cadena_preguntas+='     <div id="contenedor_respuestas'+cont_preguntas+'"> ';
        cadena_preguntas+='     </div>';
        cadena_preguntas+=' </div>';
        cadena_preguntas+='</div>';

        $("#contenedor_preguntas"+cod_preg).append(cadena_preguntas);

        var obj_pregunta=new Object();

        obj_pregunta.codigo_pregunta=cont_preguntas;
        obj_pregunta.codigo_indicador=cod_preg;
        obj_pregunta.descripcion="";
        obj_pregunta.tipopregunta="0";
        obj_pregunta.estado="activo";


        arra_pregunta.push(obj_pregunta);
        
    }

    function modificar_pregunta(cod_pregunta){
        for(var i=0;i<arra_pregunta.length;i++){
            
            if(arra_pregunta[i].codigo_pregunta==cod_pregunta && arra_pregunta[i].estado=="activo"){
                var descripcion=""+$("#descripcion_pregunta_"+cod_pregunta).val();
                var tipopregunta=""+$("#fitipopregunta"+cod_pregunta).val();

                arra_pregunta[i].descripcion=""+descripcion;
                arra_pregunta[i].tipopregunta=""+tipopregunta;
                break;
            }
        }
    }

    function change_tipo_pregunta(preg_cod){
        var ind=$("#fitipopregunta"+preg_cod).val();
        $("#contenedor_respuestas"+preg_cod).html("");

        for (var i = 0; i < arra_respuestas.length; i++) {
            if(arra_respuestas[i].codigo_pregunta==preg_cod){
                arra_respuestas[i].estado="eliminado";
            }
        }          


        if(ind==1){
            agregar_respuesta_multiples(preg_cod);
        }

        modificar_pregunta(preg_cod);
    }

    

    function agregar_respuesta_multiples(preg_cod){
        //arra_respuesta_multi
        var cadena_respuestas="<hr /><h5>Respuestas</h5>";
        for(var i=0;i<10;i++){

            var cod_respuesta=""+preg_cod+'_'+(i+1);
            cadena_respuestas+='<div class="row" style="margin-top:5px; "> ';
            cadena_respuestas+='    <div class="col-md-10">';
            cadena_respuestas+='        <div class="input-group">';
            cadena_respuestas+='            <span class="input-group-addon"><span >'+(i+1)+'</span></span>';
            cadena_respuestas+='            <input type="text" class="form-control" id="respuesta_'+cod_respuesta+'" onfocusout="modificar_respuesta(&#39;'+cod_respuesta+'&#39;)"  />';
            cadena_respuestas+='            <!--<span class="input-group-addon"><span class="fa fa-times-circle"></span></span>-->';
            cadena_respuestas+='        </div>';
            cadena_respuestas+='    </div>';
            cadena_respuestas+='    <div class="col-md-2">';
            cadena_respuestas+='        <select class="form-control select" id="firespuesta_'+cod_respuesta+'" onchange="modificar_respuesta(&#39;'+cod_respuesta+'&#39;)">';
            cadena_respuestas+='            <option value="0">Numérico</option>';
            cadena_respuestas+='            <option value="1">Texto</option>';
            cadena_respuestas+='            <option value="2">Porcentaje</option>';
            cadena_respuestas+='     </select>';
            cadena_respuestas+='  </div>';
            cadena_respuestas+='</div>';

            var obj_pregunta=new Object();
            obj_pregunta.codigo_pregunta=""+preg_cod;
            obj_pregunta.codigo_respuesta=""+cod_respuesta;
            obj_pregunta.respuesta="";
            obj_pregunta.valor="";
            obj_pregunta.estado="activo";

            arra_respuestas.push(obj_pregunta);

        }  

        $("#contenedor_respuestas"+preg_cod).html(cadena_respuestas);
        
    }


    function modificar_respuesta(cod_respuesta){
        console.log("cod_respuesta==>"+cod_respuesta);
        for(var i=0;i<arra_respuestas.length;i++){
            
            if(arra_respuestas[i].codigo_respuesta==cod_respuesta && arra_respuestas[i].estado=="activo"){
                var descripcion=""+$("#respuesta_"+cod_respuesta).val();
                var valor=""+$("#firespuesta_"+cod_respuesta).val();

                arra_respuestas[i].respuesta=""+descripcion;
                arra_respuestas[i].valor=""+valor;           

                console.log("valor==>"+valor);   

                break;
            }
        }
    }


    


    function get_cadena_encuesta(){

        var cadena_guardar="";

        for(var i=0;i<arra_datos_encuesta.length;i++){
            if(arra_datos_encuesta[i].estado!="eliminado"){
                var obj=new Object();
                obj=arra_datos_encuesta[i];
                obj.arra_pregunta=get_arra_preguntas(arra_datos_encuesta[i].codigo_indicador);

                cadena_guardar+=""+arra_datos_encuesta[i].codigo_indicador+"##"+obj.arra_pregunta+"@breakindicador@";
            }               
        }

        return cadena_guardar;
    }

    
    function get_arra_preguntas(cod_indicador){
        var cadena_guardar="";
        for(var i=0;i<arra_pregunta.length;i++){
            if(arra_pregunta[i].codigo_indicador==cod_indicador  && arra_pregunta[i].estado!="eliminado"){
                var obj=new Object();
                obj=arra_pregunta[i];


                obj.arra_pregunta=get_arra_respuesta(arra_pregunta[i].codigo_pregunta);

                cadena_guardar+=""+obj.codigo_pregunta+"||";
                cadena_guardar+=""+obj.codigo_indicador+"||";
                cadena_guardar+=""+obj.descripcion+"||";
                cadena_guardar+=""+obj.tipopregunta+"||";
                cadena_guardar+=""+obj.arra_pregunta+"@breakpregunta@";
            }
        }

        return cadena_guardar;

    }   
    
    function get_arra_respuesta(cod_pregunta){

        var cadena_guardar="";

        for (var i=0; i<arra_respuestas.length;i++) {
            if(arra_respuestas[i].codigo_pregunta==cod_pregunta  && arra_respuestas[i].estado!="eliminado"){

                var obj=new Object();
                obj=arra_respuestas[i];               
                
               
                cadena_guardar+=""+obj.codigo_pregunta+"::";
                cadena_guardar+=""+obj.codigo_respuesta+"::";
                cadena_guardar+=""+obj.respuesta+"::";
                cadena_guardar+=""+obj.valor+"::";
                cadena_guardar+=""+obj.estado+"@breakrespuesta@";
            }
        } 

        return cadena_guardar;

    }   




   

</script>
@stop
