@extends('backoffice.index')
@section('contenido')   
        <div class="row">
            <div style="margin-left:15px;">
                <h2>Calificación.</h2>
            </div>
            
            <div class="col-md-4">
                <form class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Calificación</strong></h3>
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
                                            <select class="form-control select" data-live-search="true" id="fiprograma" onchange="buscar_modelo()">
                                            <option value="">Ninguno</option> 
                                             @foreach ($arra_programas as $programa) 
                                                <option value="{{$programa->codigo}}">{{$programa->nombre}}</option>                                                
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>



                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Modelo</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" data-live-search="true" id="fimodelo">
                                            
                                            </select>
                                        </div>
                                    </div>
                                    


                                     

                                                                        

                                     <button class="btn btn-info pull-right" id="btnagregar" onclick="cargar_listado()" >Filtrar >> </button>

                                

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
                <div class="panel panel-default">
                     <div class="panel-heading">
                        <h3 class="panel-title"><strong>Listado</strong> Calificacion</h3>

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
                                            
											<select class="form-control select" data-live-search="true" id="txtmodelos">
												<option value="">Modelos</option> 
	                                             @foreach ($arra_modelos as $modelo) 
                                                <option value="{{$modelo->codigo}}">{{$modelo->nombre}}</option>                                                
                                              @endforeach
	                                            </select>

                                        </div>

                                         <div class="col-md-1">    

                                         	
                                            
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
         //agregar_indicador();
    });  

     function buscar_modelo(){
        var programa=$("#fiprograma").val();
      

        var request = $.ajax({
          url: "buscar_modelo_programa",
          type: "POST",
          data:{
            codigo:"",
            programa:""+programa,
            modelo:"",
            tipo_result:"json"
          }
        });        

        request.done(function(obj) { 
              
       
          if( obj.status == "ok"){     
            var i=0;          
           var dato_factor=obj.datos;
            var cadena_combo="";
             for(i=0;i<dato_factor.length;i++){
                cadena_combo+=' <option value="'+dato_factor[i].modelo_fk+'" " >'+dato_factor[i].modelo+'</option>';
               
             }

             if(programa==""){
                cadena_combo=' <option value="">Ninguno</option>';
             }
             $("#fimodelo").html(""+cadena_combo).selectpicker('refresh');  

            


          }else{
            

            $("#message-box-sound-2").show();
            $("#mensaje_error").html(""+obj.mensaje);
          }

        });
    }

    var datos_modelos=new Object();

   
    function get_calificacion(valor,script,cantidad){
        var calificacion=0;
		if(script==1){
			calificacion=valor;	
        }  
console.log(valor+"   script "+script);		
        if(script==2 || script==29){
            if(valor<=9.4){
                calificacion=1;
            }else if(valor>=9.5  && valor<=18.8){
                calificacion=2;
            }else if(valor>=18.9 && valor<=28.2){
                calificacion=3;
            }else if(valor>=28.3 && valor<=37.6){
                calificacion=4;
            }else if(valor>=37.7 && valor<=47){
                calificacion=5;
            }else if(valor>=47.1 && valor<=56.4){
                calificacion=6;
            }else if(valor>=56.5 && valor<=65.8){
                calificacion=7;
            }else if(valor>=65.9 && valor<=75.2 ){
                calificacion=8;
            }else if(valor>=75.3 && valor<=84.6 ){
                calificacion=8;
            }else if(valor>=84.7){
                calificacion=9;
            }
        }
		if(script==3){
			calificacion=valor;	
        }  

        if(script==5){
            if(valor<=80){
                calificacion=10;
            }else if(valor>=81  && valor<=89){
                 calificacion=5;
            }else if(valor>=90){
                 calificacion=1;
            }
        }


        if(script==7){
            if(valor<5){
                calificacion=1;
            }else if(valor>=5  && valor<=14.99){
                 calificacion=3;
            }else if(valor>=15  && valor<=24.99){
                 calificacion=7;
            }else if(valor>=25){
                 calificacion=10;
            }
        }

        if(script==10){
            if(valor<40){
                calificacion=10;
            }else if(valor>=40  && valor<60){
                 calificacion=5;
            }else if(valor>=60){
                 calificacion=1;
            }
        }

        if(script==11){
            if(valor>=30){
                calificacion=10;
            }else if(valor>15  && valor<30){
                 calificacion=5;
            }else if(valor<=15){
                 calificacion=1;
            }
        }

        if(script==12){
            if(valor>=15){
                calificacion=10;
            }else if(valor>8  && valor<15){
                 calificacion=5;
            }else if(valor<=8){
                 calificacion=1;
            }
        }

        if(script==13){
            if(valor>=20){
                calificacion=10;
            }else if(valor>=15  && valor<20){
                 calificacion=7;
            }else if(valor>=5  && valor<15){
                 calificacion=5;
            }else if(valor<5){
                 calificacion=1;
            }
        }


        if(script==32){
            if(valor<3){
                calificacion=1;
            }else if(valor>=3  && valor<=4.99){
                 calificacion=3;
            }else if(valor>=5  && valor<=6.99){
                 calificacion=5;
            }else if(valor>=7  && valor<=9.99){
                 calificacion=7;
            }else if(valor>=10){
                 calificacion=10;
            }
        }

        if(script==23){
            if(cantidad==0){
                calificacion=1;
            }
            if(cantidad==1){
                calificacion=3;
            }
             if(cantidad==3){
                calificacion=7;
            }
            if(cantidad>3){
                calificacion=10;
            }
        }

        if(script==4){
            if(valor==0){
                calificacion=1;
            }else if(valor>=1 && valor<=5){
                calificacion=3;
            }else if(valor>=6 && valor <=9){
                calificacion=5;
            }else
			{
				calificacion=10;
			}
				
			
        }


        return calificacion;


    }
   

    function cargar_listado(){
        var codigo=$("#txtcodigo").val();
        var nombre=$("#txtnombre").val();
        var modelo=$("#fimodelo").val();
       

      
        var script="";


        var request = $.ajax({
          url: "buscar_calificacion",
          type: "POST",
          data:{            
            modelo:""+modelo,
            tipo_result:"json"
          }
        });

        
        //aca
        var estru_tabla='<table class="table" id="tabla_generica">';
            estru_tabla+='                 <thead>';
            estru_tabla+='                        <tr>';
            estru_tabla+='                             <th style="width:25px;">Codigo</th>';
            estru_tabla+='                             <th>Nombre</th>';
            estru_tabla+='                             <th>Cantidad</th>';
            estru_tabla+='                              <th>Bien Contestadas</th>';  
            estru_tabla+='                              <th>Porcentaje</th>';                
            estru_tabla+='                              <th>Calificación</th>';                    
            estru_tabla+='                          </tr>';
            estru_tabla+='                    </thead>';
            estru_tabla+='                            <tbody id="tbody_tabla">';
                                       
            estru_tabla+='                            </tbody>';
            estru_tabla+='                        </table>';

        $("#conten_tabla").html(estru_tabla);

        //aca
        

        request.done(function(obj) { 
              
       
          if( obj.status == "ok"){     
            var i=0;          
            datos_modelos=obj.datos;
            var cadena_tabla="";
             for(i=0;i<datos_modelos.length;i++){

                var porcentaje=0;
                var porcentaje2=0;

                var calificacion=0;
				if (datos_modelos[i].tipo_indicador==6){// Existencias (si/no)
					porcentaje=datos_modelos[i].verdaderas;
				}else if(datos_modelos[i].tipo_indicador==3){//Talleres
					porcentaje=datos_modelos[i].verdaderas;
					
				}else if(datos_modelos[i].tipo_indicador==2){//Entrevistas
					porcentaje=datos_modelos[i].verdaderas;

				}else if(datos_modelos[i].tipo_indicador==4){//Grupo Focal
					porcentaje=datos_modelos[i].verdaderas;

				}else if(datos_modelos[i].tipo_indicador==5){//observacion
					porcentaje=datos_modelos[i].verdaderas;


				}else if(datos_modelos[i].tipo_indicador==7){//Análisis Documental
					porcentaje=datos_modelos[i].verdaderas;
					
				
				}else{
					if(datos_modelos[i].cantidad>0){//encuestas
                    	porcentaje=(datos_modelos[i].verdaderas*100)/datos_modelos[i].cantidad;
                	}
				}

                if(datos_modelos[i].scripts_fk==7){
                    if(datos_modelos[i].cantidad>0){//encuestas
                        porcentaje2=(datos_modelos[i].verdaderas*100)/datos_modelos[i].cantidad;
                    }

                    var promedio=(porcentaje+porcentaje2)/2;

                    porcentaje=promedio;

                }

                if(datos_modelos[i].scripts_fk==4){//ind2121, ind2122
					porcentaje=datos_modelos[i].verdaderas;
				}


                

                cadena_tabla+=' <tr>';
                cadena_tabla+='<td style="width:85px;">'+datos_modelos[i].id_codigo+'</td>';
                cadena_tabla+='<td style="width:20% !important;">'+datos_modelos[i].nombre+'</td>';
                cadena_tabla+='<td style="width:20% !important; text-align:center;">'+datos_modelos[i].cantidad+'    </td>';
                cadena_tabla+='<td style="width:20% !important; text-align:center;">'+datos_modelos[i].verdaderas+'    </td>';
                cadena_tabla+='<td style="width:20% !important; text-align:center;">'+porcentaje+'    </td>';
                cadena_tabla+='<td style="width:20% !important; text-align:center;">'+get_calificacion(porcentaje,datos_modelos[i].scripts_fk,datos_modelos[i].cantidad)+'    </td>';
               
               
                cadena_tabla+=' </tr>';
             }

            /*acá*/
             $("#tbody_tabla").html(""+cadena_tabla);  
             $('#tabla_generica').dataTable( { "ordering": false, "info": false, "lengthChange": false,"searching": false} );

             if($("#tabla_generica").length > 0){    
                
                $("#tabla_generica").on('page.dt',function () {
                    onresize(100);
                });                
            }

             /*acá*/


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
    var visual="";
    var ind_seleccionado=-1; 

    function visualizar(ind){
        
    }

    function limpiar(){
        
    }

    


  

    /*Traer Lineas de Preguntas y respuestas*/


    
   

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
             	
                
                
             }
             buscar_caracteristicas($('#fifactores').val());
             //

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
                
               
             }
              buscar_aspectos($('#ficaracteristicas').val());

             //
             


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
                

             }
              buscar_indicadores($('#fiaspecto').val());
             //
             /*
Hola Edgardo,
ya saqué las cuentas...
y quedariamos así.. un ganar ganar jeje
45% Edgardo
45% Angel
10% Mantenimiento,
se empezaría con un servidor normal y se irá actualizando gradualmente. a un VPS

             */


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
            tipo_indicador:"1",
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
