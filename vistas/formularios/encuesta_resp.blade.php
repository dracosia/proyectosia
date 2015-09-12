@extends('backoffice.index')
@section('contenido')   
        <div class="row">
            <div style="margin-left:15px;">
                
                
                <div class="col-md-8 col-md-offset-2">
                        

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong id="txtperiodo">Periodo 1 </strong><span id="txtano">Año 2015</span> </h3>
                        </div>  
                        
                         <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <h2 id="txtnombre">Encuesta Administración de Empresas</h2>
                                    
                                    <p id="txtdescripcion">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero reprehenderit, reiciendis eum facilis, ex ab consequatur recusandae ipsam sequi magnam minima doloremque optio veritatis, blanditiis eos inventore rerum dolorum ea?</p>
                                    






                                    <div id="contain_indicadores" style="width:100%; height:auto;">
                                        
                                    </div>





                                </div>
                            </div>
                        </div>
                        
                        <div class="panel-footer">                                                        
                            <button class="btn btn-success pull-right" id="btnguardar" onclick="enviar_encuesta()">Enviar Encuesta</button>
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


      /*
                 
                */
    var codigo_usuario="{{$codigo_usuario}}";

    var codigo_encuesta="";

    var arraTipo1=new Array();
    var arraTipo2=new Array();
    var arraTipo3=new Array();
    var arraTipo4=new Array();
    var arraTipo5=new Array();

    function cargartipo(){
        arraTipo1.push("Totalmente");
        arraTipo1.push("Parcialmente");
        arraTipo1.push("Mínimamente");
        arraTipo1.push("No responde");
        arraTipo1.push("No aplica");



        arraTipo2.push("Muy Apropiados");
        arraTipo2.push("Apropiados");
        arraTipo2.push("Poco apropiados");
        arraTipo2.push("No existen");
        arraTipo2.push("No conoce");



        arraTipo3.push("Alta");
        arraTipo3.push("Media");
        arraTipo3.push("Baja");
        arraTipo3.push("No Responde");
        arraTipo3.push("No Aplica");

        arraTipo4.push("Amplia");
        arraTipo4.push("Escasa");
        arraTipo4.push("Ninguna");
        arraTipo4.push("No Responde");
        arraTipo4.push("No Aplica");
        

        arraTipo5.push("SI");
        arraTipo5.push("NO");
    
        

    }

    var arra_respuesta_multi;
    $( document ).ready(function() {
        cargartipo();
        cargar_listado();            
    });

    var estamento="{{$estamento}}";

    function cargar_listado(){


       
        var request = $.ajax({
          url: "get_encuesta_activa",
          type: "POST",
          data:{
            estamento:estamento,
            tipo_result:"json"
          }
        });
        

        request.done(function(obj) { 
              
       
          if( obj.status == "ok"){     
            var i=0;          
            datos_modelos=obj.datos;
            var cadena_tabla="";
             for(i=0;i<datos_modelos.length;i++){
                $("#txtperiodo").html("Periodo "+datos_modelos[i].periodo);   
                $("#txtano").html(" Año "+datos_modelos[i].anoperiodo);
                $("#txtnombre").html(""+datos_modelos[i].nombreencuesta);
                $("#txtdescripcion").html(""+datos_modelos[i].descripcionencuesta);

                codigo_encuesta=""+datos_modelos[i].encuesta_fk;

                cargar_listado_preguntas(datos_modelos[i].codigoencuesta);
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

var objIndicador=new Object();
var objPregunta=new Object();
var objRespuesta=new Object();

var arra_responde=new Array();





function cargar_listado_preguntas(idcodigo){
        var codigo=idcodigo;

        var request = $.ajax({
          url: "lineas_encuesta",
          type: "POST",
          data:{
            encuesta:""+codigo,
            tipo_result:"json"
          }
        });

        request.done(function(obj) {

          if( obj.status == "ok"){     
            var i=0; 
            var j=0;          

            arra_responde=new Array();

            objPregunta=obj.datos_preguntas;
            objRespuesta=obj.datos_respuestas;
            objIndicador=obj.datos_indicador;
           
            var indicadores_arra=new Array();

            var cadena_indicadores="";

            for(i=0;i<objIndicador.length;i++){
                cadena_indicadores+='<div style="width:100%; height:auto; padding:10px; background-color:#DDD; border-radius: 10px; margin-bottom:15px;" class="row">';
                cadena_indicadores+='  <div class="col-md-12" style="margin-bottom:10px; font-size:13px">';
                cadena_indicadores+='      <STRONG>'+objIndicador[i].id_codigo+'  '+objIndicador[i].nombre+'</STRONG> ';

                cadena_indicadores+='       <div id="contain_preguntas_'+objIndicador[i].codigo+'">';
                cadena_indicadores+='       </div>';

                cadena_indicadores+='  </div>';




                cadena_indicadores+='</div>';                               
            }

            $("#contain_indicadores").html(cadena_indicadores);

            var cadena_preguntas="";
             
            var conta_preguntas=0;

            var contass=0;

            for(i=0;i<objPregunta.length;i++){
                conta_preguntas++;
                cadena_preguntas+='<div class="col-md-12" style="margin-bottom:10px; margin-top:10px;">';
                cadena_preguntas+='   '+objPregunta[i].descripcion+'';
                cadena_preguntas+='</div>';
                cadena_preguntas+='<div class="col-md-12" style="margin-bottom:10px;" id="respuestas_1">';

                for(j=0;j<objRespuesta.length;j++){
                    var descripcion_pregunta="";
                    if(objRespuesta[j].pregunta_fk==objPregunta[i].codigo){


                        console.log("este "+objRespuesta[j].valor);

                        descripcion_pregunta=""+objRespuesta[j].descripcion;

                        if(objRespuesta[j].descripcion=="" || objRespuesta[j].descripcion=="null"){

                            if(objPregunta[i].tipo_preguntas_fk==1){
                                descripcion_pregunta=""+arraTipo1[parseInt(objRespuesta[j].valor)];
                            }
                            if(objPregunta[i].tipo_preguntas_fk==2){
                                descripcion_pregunta=""+arraTipo2[parseInt(objRespuesta[j].valor)];
                            }
                            if(objPregunta[i].tipo_preguntas_fk==3){
                                descripcion_pregunta=""+arraTipo3[parseInt(objRespuesta[j].valor)];
                            }
                            if(objPregunta[i].tipo_preguntas_fk==4){
                                descripcion_pregunta=""+arraTipo4[parseInt(objRespuesta[j].valor)];
                            }
                            if(objPregunta[i].tipo_preguntas_fk==5){
                                descripcion_pregunta=""+arraTipo5[parseInt(objRespuesta[j].valor)];
                            }

                        }

                        //console.log(""+objPregunta[i].tipo_preguntas_fk);

                        if(objPregunta[i].tipo_preguntas_fk!=7){
                            cadena_preguntas+='<input type="radio" name="pregunta_'+objPregunta[i].codigo+'" value="" onclick="modificar_respuesta('+objPregunta[i].codigo+','+objRespuesta[j].codigo+',0)"> '+descripcion_pregunta+'<br /><br />';
                        }else{
                            cadena_preguntas+='<input type="checkbox" value="" id="check_dk_'+objRespuesta[j].codigo+'" onclick="modificar_respuesta('+objPregunta[i].codigo+','+objRespuesta[j].codigo+',1)"> '+descripcion_pregunta+'<br /><br />';
                        }

                        


                        var obj_detail=new Object();

                        obj_detail.codigo_pregunta=""+objPregunta[i].codigo;
                        obj_detail.codigo_respuesta=""+objRespuesta[j].codigo;
                        obj_detail.valor="";
                        
                        if(objPregunta[i].codigo==10){
                            contass++;
                        }



                        arra_responde.push(obj_detail);


                    }                    
                }

                

                cadena_preguntas+='</div>';
                cadena_preguntas+='<div class="col-md-12" style="margin-bottom:10px;">';
                cadena_preguntas+='     <hr />';
                cadena_preguntas+='</div>';

                 $("#contain_preguntas_"+objPregunta[i].indicadores_fk).append(cadena_preguntas);

                 cadena_preguntas="";
            }

            console.log(""+contass);

           



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



    function modificar_respuesta(code_pregunta,code_respuesta,check_item){
        var i=0;
        
        if(check_item==0){
            for(i=0;i<arra_responde.length;i++){
            
                if(""+arra_responde[i].codigo_pregunta==""+code_pregunta){               
                    arra_responde[i].valor="";                
                }
            }
        }
        
        var valor_resp="SI";
        if(check_item==1){
            if($("#check_dk_"+code_respuesta).is(":checked")){
                valor_resp="SI";
            }else{
                valor_resp="";
            }
        }
        
        for(i=0;i<arra_responde.length;i++){
            if(""+arra_responde[i].codigo_respuesta==""+code_respuesta){
                arra_responde[i].valor=""+valor_resp;
            }
        }
    }



    function get_cadena(){
        var cadena="";
        for(i=0;i<arra_responde.length;i++){
            cadena+=""+arra_responde[i].codigo_pregunta+"::";
            cadena+=""+arra_responde[i].codigo_respuesta+"::";
            cadena+=""+arra_responde[i].valor+"@@";
        }

        return cadena;
    }

    function enviar_encuesta(){
        console.log(get_cadena());
        var request = $.ajax({
          url: "enviar_respuestas",
          type: "POST",
          data:{
            cadena_respuestas:get_cadena(),
            codigo_usuario:codigo_usuario,
            codigo_encuesta:codigo_encuesta,
            tipo_result:"json"
          }
        });
        

        request.done(function(obj) { 
              
       
          if( obj.status == "ok"){     
            alert("Encuesta guarda correctamente");
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
