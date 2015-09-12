<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Sistema de Autoevaluaci&oacute;n de Programas Acad&eacute;micos</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="../public/assets/faviconco" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="../public/assets/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
        
        <img src="../public/assets/img/backoffice/imagen_derecha.png" style="position:absolute; bottom:0px; right:10px; width:45%; ">
        

        <div class="login-container lightmode">
            
            <div class="login-box animated fadeInDown">
                <img src="../public/assets/img/backoffice/logo_superior_inver_big.png" style="width:95%; margin-bottom:15px;">
                <div class="login-body">
                    <div class="login-title"><strong>Ingresa </strong> a tu cuenta </div>
                    <form action="/" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" id="txtusuario" class="form-control" placeholder="Usuario"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" id="txtpassword" class="form-control" placeholder="Password"/>
                        </div>
                    </div>
                    
                     <div class="form-group">
                        <div class="col-md-12">
                           <select style="width:100%;" id="txtperfil">
                               @foreach ($arra_perfiles as $perfil) 
                                <option value="{{$perfil->codigo}}">{{$perfil->nombre}}</option>                                                
                              @endforeach
                           </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-link btn-block">Olvidaste tu password?</a>
                        </div>
                        <div class="col-md-6">
                            <button  id="btn_login" class="btn btn-info btn-block">Ingresar</button>
                        </div>
                    </div>
                   
                  
                    <!--<div class="login-subtitle">
                        No tienes una cuenta Gold School ? <a href="#">Crea una cuenta nueva</a>
                    </div>-->
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2015 SIA- Sistema de Autoevaluación de Programas Académicos.
                    </div>
                   <!-- <div class="pull-right">
                        <a href="#">About</a> |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div>-->
                </div>
                <img src="../public/assets/img/backoffice/marca_agua.png" style="width:95%; margin-bottom:15px;">
            </div>
            
        </div>

       
        
    </body>

    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>



    <script type="text/javascript">

    $("#btn_login").click(function( event ) {
         event.preventDefault();
         ir_backoffice();
    });  


    function ir_backoffice(){

        var usuario=$("#txtusuario").val();
        var password=$("#txtpassword").val();
        var perfil=$("#txtperfil").val();

        var request = $.ajax({
          url: "login2",
          type: "POST",
          data:{
               usuario:usuario,
               password:password,
               perfil:perfil
          }
        });

        
        

        request.done(function(obj) { 
              
       
          if( obj.status == "ok"){

            var p=obj.perfil;
            console.log(""+p);
            if( p.toUpperCase() == "ADMINISTRADOR"){
                //window.open("home","_parent");   
                 window.open("home","_parent");      
            }else{
                 window.open("encuesta_resp","_parent");      
            }

            
             //window.open("home","_parent");        
          }else{
            alert(""+obj.mensaje);
          }

        });
         

         //respuesta si falla
        request.fail(function(jqXHR, textStatus) {
          alert( "Error de servidor  " + textStatus );
        });
            
        
    }
        </script>
</html>






