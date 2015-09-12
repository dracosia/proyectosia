@extends('backoffice.index')
@section('contenido')   
        <div class="row">
            <div style="margin-left:15px;">
                <h2>Administración de Sedes.</h2>
            </div>
            
            <div class="col-md-5">
                <form class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Gestión</strong> Sedes</h3>
                             <ul class="panel-controls">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>                                
                            </ul>                            
                        </div>

                        
                        <div class="panel-body">
                            <div class="row">
                                 <div class="col-md-12">


                                    <!-- Código -->

                                     <!-- Nombre -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Nombre</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="finombre" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Nombre de la Sede</span>
                                        </div>
                                    </div>

                                    <!-- Descripción -->
                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Descripción</label>
                                        <div class="col-md-9 col-xs-12">                                            
                                            <textarea class="form-control" id="fidescripcion" rows="5"></textarea>
                                            <span class="help-block">Descripción de la Sede</span>
                                        </div>
                                    </div>

                                     <!-- Nit -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Nit</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="finit" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Nit</span>
                                        </div>
                                    </div>

                                     <!-- Logo -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Logo</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="filogo" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Logo</span>
                                        </div>
                                    </div>

                                     <!-- Imagen Login -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Imagen Marca Login</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="fiimagen_marca_login" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Imagen Marca Login</span>
                                        </div>
                                    </div>

                                     <!-- Imagen Marca Backoffice -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Imagen Marca Backoffices</label>
                                        <div class="col-md-9">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" id="fiimagen_marca_backoffice" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Imagen Marca Backoffice</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Empresas</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" data-live-search="true" id="fiempresas">
											<option value="">Ninguno</option> 
                                             @foreach ($arra_empresas as $empresas) 
                                                <option value="{{$empresas->codigo}}">{{$empresas->nombre}}</option>                                                
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>

                                     <!-- Estado -->
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Estado</label>
                                        <div class="col-md-9">                                                                                                                                        
                                            <label class="check"><input type="checkbox" id="fiestado" checked/> Activo</label>
                                            <span class="help-block">Estado de la Sede por defecto "Activo"</span>
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
                        <h3 class="panel-title"><strong>Listado</strong> Sedes</h3>

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
                                                                          
                                                <input type="text" id="txtcodigo" class="form-control" placeholder="Codigo"/>
                                               
                                            </div>
                                        </div>

                                        <div class="col-md-5">                            
                                             <div class="form-group">
                                                                                                        
                                                <input type="text" id="txtnombre" class="form-control" placeholder="Nombre"/>
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-2">                            
                                            
											<select class="form-control select" data-live-search="true" id="txtempresas">
												<option value="">Empresa</option> 
	                                             @foreach ($arra_empresas as $empresas) 
	                                                <option value="{{$empresas->codigo}}">{{$empresas->nombre}}</option>                                                
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
                                            <th>Empresa</th>
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

    var datos_empresas=new Object();

   

    function cargar_listado(){
        var codigo=$("#txtcodigo").val();
        var nombre=$("#txtnombre").val();
        var empresa=$("#txtempresas").val();


        var request = $.ajax({
          url: "buscar_sedes",
          type: "POST",
          data:{
            codigo:""+codigo,
            nombre:""+nombre,
            empresa:""+empresa,
            tipo_result:"json"
          }
        });
        

        request.done(function(obj) { 
              
       
          if( obj.status == "ok"){     
            var i=0;          
            datos_empresas=obj.datos;
            var cadena_tabla="";
             for(i=0;i<datos_empresas.length;i++){
                cadena_tabla+=' <tr>';
                cadena_tabla+='<td style="width:85px;">'+datos_empresas[i].codigo+'</td>';
                cadena_tabla+='<td style="width:35% !important;">'+datos_empresas[i].nombre+'</td>';
                cadena_tabla+='<td style="width:35% !important;">'+datos_empresas[i].descripcion+'    </td>';
                cadena_tabla+='<td style="width:25% !important;">'+datos_empresas[i].empresa+'    </td>';
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
            

			mostrar_mensaje("error",""+obj.mensaje);                         
          }

        });
         



         //respuesta si falla
        request.fail(function(jqXHR, textStatus) {
			mostrar_mensaje("Error de servidor",""+obj.mensaje);                                  
        });
    }

    var cod_seleccionado="";    
    function visualizar(ind){
        limpiar();
        cod_seleccionado=""+datos_empresas[ind].codigo;
        $("#ficodigo").val(""+datos_empresas[ind].id_codigo);
        $("#finombre").val(""+datos_empresas[ind].nombre);
        $("#fidescripcion").val(""+datos_empresas[ind].descripcion);
        $("#finit").val(""+datos_empresas[ind].nit);
        $("#filogo").val(""+datos_empresas[ind].logo);
        $("#fiimagen_marca_login").val(""+datos_empresas[ind].imagen_marca_login);
        $("#fiimagen_marca_backoffice").val(""+datos_empresas[ind].imagen_marca_backoffice);
        $('#fiempresas').selectpicker('val', ""+datos_empresas[ind].empresa_fk);
		
        if(datos_empresas[ind].estado_fk=="1"){
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
        $("#finit").val("");
        $("#filogo").val("");
        $("#fiimagen_marca_login").val("");
        $("#fiimagen_marca_backoffice").val("");
        $("#btnguardar").prop("disabled",false);
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
         if($("#finombre").val().trim()==""){
            mostrar_mensaje("error","El campo nombre es obligatorio ");  
            return false;
        }
        if($("#fidescripcion").val().trim()==""){
            mostrar_mensaje("error","El campo descripción es obligatorio ");  
            return false;
        }      

        if($("#finit").val().trim()==""){
            mostrar_mensaje("error","El campo nit es obligatorio ");  
            return false;
        }      

        if($("#filogo").val().trim()==""){
            mostrar_mensaje("error","El campo logo es obligatorio ");  
            return false;
        }      

        if($("#fiimagen_marca_login").val().trim()==""){
            mostrar_mensaje("error","El campo marca login es obligatorio ");  
            return false;
        }      

        if($("#fiimagen_marca_backoffice").val().trim()==""){
            mostrar_mensaje("error","El campo marca backoffice es obligatorio ");  
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


        var nombre=$("#finombre").val();
        var descripcion=$("#fidescripcion").val();
        var nit=$("#finit").val();
        var logo=$("#filogo").val();
        var imagen_marca_login=$("#fiimagen_marca_login").val();
        var imagen_marca_backoffice=$("#fiimagen_marca_backoffice").val();
        var empresa=$("#fiempresas").val();		
        var estado="";
		
        if($("#fiestado").is(":checked")){
            estado="1";
        }else{
             estado="2";
        }

        var request = $.ajax({
          url: "guardar_sedes",
          type: "POST",
          data:{
            nombre:""+nombre,
            descripcion:""+descripcion,
            nit:""+nit,
            logo:""+logo,
            imagen_marca_login:""+imagen_marca_login,
            imagen_marca_backoffice:""+imagen_marca_backoffice,
            codigo_id:""+cod_seleccionado,
            tipo:tipo_operacion,
            empresa:empresa,
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
