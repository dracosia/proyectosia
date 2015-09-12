@extends('backoffice.index')
@section('contenido')   
        <div class="row">
            <div style="margin-left:15px;">
                <h2>Administración de Indicador 4.8.2.1<br />
				Proyectos y actividades de extensión o proyección a la comunidad desarrollados por directivos, profesores y estudiantes del programa en los últimos cinco años.</h2>
            </div>
            
            <div class="col-md-4">
                <form class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Gestión</strong> de Indicador 4.8.2.1</h3>
                             <ul class="panel-controls">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>                                
                            </ul>                            
                        </div>

                        
                        <div class="panel-body">
                            <div class="row">
                                 <div class="col-md-12">


                                    <!-- Programas -->
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
                                    <!-- Modelos -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Modelo</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" data-live-search="true" id="fimodelo" onchange="buscar_factores('')">
                                            <option value="">Ninguno</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Factores -->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Factor</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" data-live-search="true" id="fifactores" onchange="buscar_caracteristicas('')">
											<option value="">Ninguno</option>                                           
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Caracteristicas -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Característica</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" data-live-search="true" id="ficaracteristicas" onchange="buscar_aspectos('')">
                                            <option value="">Ninguno</option>                                           
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Aspectos -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Aspecto</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" data-live-search="true" id="fiaspecto"onchange="buscar_indicadores('')">
                                            <option value="">Ninguno</option>                                           
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <!-- Indicadores -->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Indicador (Tipo Análisis Documental)</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" data-live-search="true" id="fiindicador">
                                            <option value="">Ninguno</option>                                           
                                            </select>
                                        </div>
                                    </div>

                                     <!-- Cohortes -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Año</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="fic1" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Año</span>
                                        </div>
                                    </div>

                                     <!-- No. -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Nombre del proyecto o actividad</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="fic2" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Nombre del proyecto o actividad</span>
                                        </div>
                                    </div>
									
									<!-- % -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">No. de Directivos</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="fic3" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">No. de Directivos</span>
                                        </div>
                                    </div>

									<!-- Total -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">No. de Profesores</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="fic4" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">No. de Profesores</span>
                                        </div>
                                    </div>

									<!-- Fuente -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">No. de Estudiantes</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="fic5" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">No. de Estudiantes</span>
                                        </div>
                                    </div>
                                     <!-- Estado -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Estado</label>
                                        <div class="col-md-9">                                                                                                                                        
                                            <label class="check"><input type="checkbox" id="fiestado" checked/> Activo</label>
                                            <span class="help-block">Estado del registro por defecto "Activo"</span>
                                        </div>
                                    </div>                                     
                                    <hr />

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
           
                <div class="panel panel-default">
                     <div class="panel-heading">
                        <h3 class="panel-title"><strong>Listado</strong> de Registros Indicador 4.8.2.1</h3>

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
                                            
											<select class="form-control select" data-live-search="true" id="txtindicadores">
												<option value="">Indicadores</option> 
	                                             @foreach ($arra_indicadores as $indicador) 
												 @if($indicador->tipo_indicador_fk==7)
												 <option value="{{$indicador->codigo}}">{{$indicador->id_codigo." - ".$indicador->nombre}}</option>                                                 @endif
	                                              @endforeach
	                                            </select>

                                        </div>


                                        <div class="col-md-3">                            
                                            
											<select class="form-control select" data-live-search="true" id="txtprogramas">
												<option value="">Programas</option> 
	                                             @foreach ($arra_programas as $programa) 
	                                                <option value="{{$programa->codigo}}">{{$programa->nombre}}</option>                                                
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
                                            <th>Programa</th>
                                            <th>Codigo</th>
											<th>Indicador</th>
											<th>Año</th>
                                            <th>Proyecto o Actividad</th>
                                            <th>Directivos</th>
                                            <th>Profesores</th>
											<th>Estudiantes</th>
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
     //   cargar_listado();        
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

        var indicadores=$("#txtindicadores").val();
        var programa=$("#txtprogramas").val();
        var c1=$("#txtc1").val();
		var c2=$("#txtc2").val();
		var c3=$("#txtc3").val();
		var c4=$("#txtc4").val();
		var c5=$("#txtc5").val();

        var tipo_indicador="";
        var script="";


        var request = $.ajax({
          url: "buscar_4821",
          type: "POST",
          data:{
            
            indicadores:""+indicadores,
            programa:""+programa,
			c1:""+c1,
			c2:""+c2,
			c3:""+c3,
			c4:""+c4,
			c5:""+c5,
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
                cadena_tabla+='<td style="width:85px;">'+datos_modelos[i].programa+'</td>';
                cadena_tabla+='<td style="width:20% !important;">'+datos_modelos[i].codigo_indicador+'</td>';
                cadena_tabla+='<td style="width:20% !important;">'+datos_modelos[i].indicadores+'</td>';
                cadena_tabla+='<td style="width:20% !important;">'+datos_modelos[i].c1+'    </td>';
				cadena_tabla+='<td style="width:20% !important;">'+datos_modelos[i].c2+'    </td>';
				cadena_tabla+='<td style="width:20% !important;">'+datos_modelos[i].c3+'    </td>';
				cadena_tabla+='<td style="width:20% !important;">'+datos_modelos[i].c4+'    </td>';
				cadena_tabla+='<td style="width:20% !important;">'+datos_modelos[i].c5+'    </td>';
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
    var ind_seleccionado=-1; 
    var visual="";   
    function visualizar(ind){
       // limpiar();
        ind_seleccionado=parseFloat(ind);
        visual="visualizar";
	   
        indice_select=ind;
        cod_seleccionado=""+datos_modelos[ind].codigo;
        $("#ficodigo").val(""+datos_modelos[ind].id_codigo);
        $('#fiprogramas').selectpicker('val', ""+datos_modelos[ind].programa_fk);
		$('#fimodelo').selectpicker('val', ""+datos_modelos[ind].modelo_fk);
        $('#fic1').val(""+datos_modelos[ind].c1);
		$('#fic2').val(""+datos_modelos[ind].c2);
		$('#fic3').val(""+datos_modelos[ind].c3);
		$('#fic4').val(""+datos_modelos[ind].c4);
		$('#fic5').val(""+datos_modelos[ind].c5);
       // buscar_entrevistas('visualizar');




      

        if(datos_modelos[ind].estado_fk=="1"){
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

		 $("#fic1").val("");
		 $("#fic2").val("");
		 $("#fic3").val("");
		 $("#fic4").val("");
		 $("#fic5").val("");
		 
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
		if(tipo_operacion=="eliminar")return true;
        if($("#fiindicador").val().trim()==""){
            mostrar_mensaje("error","El campo indicador es obligatorio ");  
            return false;
        }
        if($("#fiprogramas").val().trim()==""){
            mostrar_mensaje("error","El campo programas es obligatorio ");  
            return false;
        }
        if($("#fic1").val().trim()==""){
            mostrar_mensaje("error","El campo es obligatorio ");  
            return false;
        }      

        if($("#fic2").val().trim()==""){
            mostrar_mensaje("error","El campo es obligatorio ");  
            return false;
        }  

        if($("#fic3").val().trim()==""){
            mostrar_mensaje("error","El campo es obligatorio ");  
            return false;
        }  
 
         if($("#fic4").val().trim()==""){
            mostrar_mensaje("error","El campo es obligatorio ");  
            return false;
        }  

        if($("#fic5").val().trim()==""){
            mostrar_mensaje("error","El campo es obligatorio ");  
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

       var programa=$("#fiprogramas").val();
       var indicadores=$("#fiindicador").val();
       var c1=$("#fic1").val();
	   var c2=$("#fic2").val();
	   var c3=$("#fic3").val();
	   var c4=$("#fic4").val();
	   var c5=$("#fic5").val();

        var estado="";
        if($("#fiestado").is(":checked")){
            estado="1";
        }else{
             estado="2";
        }

        var request = $.ajax({
          url: "guardar_4821",
          type: "POST",
          data:{

            codigo_id:""+cod_seleccionado,
            tipo:tipo_operacion,

            programa:""+programa,
            indicadores:""+indicadores,
            c1:""+c1,
			c2:""+c2,
			c3:""+c3,
			c4:""+c4,
			c5:""+c5,
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

             if(visual=='visualizar'){
             	$('#fifactores').selectpicker('val', ""+datos_modelos[ind_seleccionado].factores_fk);
                
             }
			 else
			 {
			 	buscar_caracteristicas($("#fifactores").val());
			 }
            // buscar_caracteristicas(tipo);

             


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

             if(visual=='visualizar'){
                $('#ficaracteristicas').selectpicker('val', ""+datos_modelos[ind_seleccionado].caracteristicas_fk);
             }
			else
			{
				buscar_aspectos($("#ficaracteristicas").val());
			}	
            // buscar_aspectos(tipo);
             


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

             if(visual=='visualizar'){
                $('#fiaspecto').selectpicker('val', ""+datos_modelos[ind_seleccionado].aspectos_fk);
             }
			else
			{
			buscar_indicadores($("#fiaspecto").val());
			}
            // buscar_indicadores(tipo);
             


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

             if(visual=='visualizar'){
                $('#fiindicador').selectpicker('val', ""+datos_modelos[ind_seleccionado].indicador_fk);
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
