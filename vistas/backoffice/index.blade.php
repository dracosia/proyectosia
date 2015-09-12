<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Sistema de Autoevaluaci&oacute;n de Programas Acad&eacute;micos</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="../public/assets/favicoico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="../public/assets/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->     

         <style type="text/css">
            .botones{
                text-align: left;
                margin-top: 5px;
            }
            p{
                text-align: justify;
            }
         </style>                               
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.html">Sistema de Autoevaluaci&oacute;n de Programas Acad&eacute;micos</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="../public/assets/img/usuarios/anlizfer.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="../public/assets/img/usuarios/anlizfer.jpg" alt="Julian Ballesteros"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">{{$nombre_usuario}}</div>
                                <div class="profile-data-title">{{$perfil}}</div>
                            </div>
                            <div class="profile-controls">
                              <!--  <a href="pages-profile.html" class="profile-control-left" title="Edición de Perfil"><span class="fa fa-info"></span></a>
                                <a href="pages-messages.html" class="profile-control-right" title="Enlace de Afiliado"><span class="fa fa-link"></span></a>-->
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Menú</li>
                    <li class="active">
                        <a href="home"><span class="fa fa-home"></span> <span class="xn-text">Inicio</span></a>                        
                    </li>  

                    @if($formulario != "encuesta_resp")     

                     <li class="xn-openable">
                        <a href="#"><span class="fa fa-tasks"></span> <span class="xn-text">Definición del Modelo</span></a>
                        <ul>
                            <li><a href="modelos"><span class="fa fa-tasks"></span> Modelos</a></li>
                            <li><a href="programas"><span class="fa fa-tasks"></span> Programas Académicos</a></li>
                            <li><a href="modeloprograma"><span class="fa fa-tasks"></span> Asociar Modelos a Programas Académicos</a></li>
							<li><a href="factores"><span class="fa fa-tasks"></span> Factores</a></li>
                            <li><a href="caracteristicas"><span class="fa fa-tasks"></span> Características</a></li>
                            <li><a href="aspectos"><span class="fa fa-tasks"></span> Aspectos</a></li>
                            <li><a href="indicadores"><span class="fa fa-tasks"></span> Indicadores</a></li>
                            <li><a href="scripts"><span class="fa fa-tasks"></span> Scripts</a></li>				
                        </ul>
                    </li>   

                     <li class="xn-openable">
                        <a href="#"><span class="fa fa-tasks"></span> <span class="xn-text">Recolección de Información</span></a>
                        <ul>
                           <li><a href="encuesta"><span class="fa fa-tasks"></span> Encuestas</a></li>
						   <li><a href="analisisdocumental"><span class="fa fa-tasks"></span>Análisis Documental</a></li>
                            <li><a href="existencias"><span class="fa fa-tasks"></span> Existencias de Información</a></li>
                            <li><a href="entrevistas"><span class="fa fa-tasks"></span> Entrevistas</a></li>
                            <li><a href="talleres"><span class="fa fa-tasks"></span> Talleres</a></li>
                            <li><a href="gruposfocales"><span class="fa fa-tasks"></span> Grupos Focales</a></li>
                            <li><a href="observacion"><span class="fa fa-tasks"></span> Observación</a></li>
                        </ul>
                    </li>   

                     <li class="xn-openable">
                        <a href="#"><span class="fa fa-tasks"></span> <span class="xn-text">Resultados del Proceso</span></a>
                        <ul>
                            <li><a href="calificacion"><span class="fa fa-tasks"></span> Calificación</a></li>                
                            <li><a href="#"><span class="fa fa-tasks"></span> Fortalezas</a></li>                            
							<li><a href="#"><span class="fa fa-tasks"></span> Debilidades</a></li>                            
                        </ul>
                    </li>   

                     <li class="xn-openable">
                        <a href="#"><span class="fa fa-tasks"></span> <span class="xn-text">Acciones de Mejoramiento</span></a>
                        <ul>
                            <li><a href="mejoramiento"><span class="fa fa-tasks"></span> Definición del Plan de Mejoramiento</a></li>                
                            <li><a href="fortalecimiento"><span class="fa fa-tasks"></span> Definición del Plan de Fortalecimiento</a></li>                           
                        </ul>
                    </li>   

                     <li class="xn-openable">
                        <a href="#"><span class="fa fa-tasks"></span> <span class="xn-text">Documentación de Soporte</span></a>
                        <ul>
                            <li><a href="manuales"><span class="fa fa-tasks"></span> Manuales de Usuario</a></li>                
                            <li><a href="videos"><span class="fa fa-tasks"></span> Video Tutoriales</a></li>
                            <li><a href="formatos"><span class="fa fa-tasks"></span> Formatos del Modelo</a></li>                            
                        </ul>
                    </li>   

                     <li class="xn-openable">
                        <a href="#"><span class="fa fa-user"></span> <span class="xn-text">Administración</span></a>
                        <ul>
							<li><a href="configuracion"><span class="fa fa-user"></span> Configuración</a></li>
							<li><a href="configuracionencuesta"><span class="fa fa-user"></span> Configuración - Encuesta</a></li>
                            <li><a href="usuarios"><span class="fa fa-user"></span> Usuarios</a></li>
                            <li><a href="perfiles"><span class="fa fa-user"></span> Perfiles</a></li>
                            <li><a href="pages-gallery.html"><span class="fa fa-user"></span> Permisos</a></li>
                            <li><a href="pages-gallery.html"><span class="fa fa-user"></span> Backup</a></li>
                            <li><a href="formularios"><span class="fa fa-user"></span> Formularios</a></li>
                            <li><a href="formulariosperfil"><span class="fa fa-user"></span> Formularios - Perfi</a></li>
                            <li><a href="empresas"><span class="fa fa-user"></span> Empresas</a></li>
                            <li><a href="sedes"><span class="fa fa-user"></span> Sedes</a></li>


                        </ul>
                    </li>   
                    
                    @endif
                           

                     <li>
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out" ></span> <span class="xn-text">Salir</span></a>                        
                    </li>       
                   
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">

                <img src="../public/assets/img/backoffice/marca_agua2.png" style="position:absolute; bottom:10px; right:10px;">
                
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                  
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     

                <!-- START BREADCRUMB -->
                <!--<ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active">Inicio</li>
                </ul>-->
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-co<ntent-wrap">
                    
                    <!-- START WIDGETS -->                    
                    
                @yield('contenido')


                

                </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span>Quieres Cerrar <strong>Sesión</strong> ?</div>
                    <div class="mb-content">
                        <p>Está seguro de Salir de SIA?</p>                    
                        <p>Presiona No si aún quieres seguir trabajando. Presiona SI para cerrar la sesión</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="login" class="btn btn-success btn-lg">SI</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="../public/assets/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="../public/assets/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="../public/assets/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../public/assets/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../public/assets/js/plugins/bootstrap/bootstrap.min.js"></script>    
        <script type="text/javascript" src="../public/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='../public/assets/js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="../public/assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="../public/assets/js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="../public/assets/js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="../public/assets/js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="../public/assets/js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="../public/assets/js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='../public/assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='../public/assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='../public/assets/js/plugins/bootstrap/bootstrap-datepicker.js'></script>       

         <script type='text/javascript' src='../public/assets/js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='../public/assets/js/plugins/validationengine/jquery.validationEngine.js'></script>     

        <script type="text/javascript" src="../public/assets/js/plugins/bootstrap/bootstrap-select.js"></script>      
                  
        
        <script type="text/javascript" src="../public/assets/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="../public/assets/js/plugins/daterangepicker/daterangepicker.js"></script>
        
       
        <!-- END PAGE PLUGINS -->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="../public/assets/js/settings.js"></script>        
        <script type="text/javascript" src="../public/assets/js/plugins.js"></script>        
        <script type="text/javascript" src="../public/assets/js/actions.js"></script>        
        <!-- END TEMPLATE -->

        
        @yield('scripts')

        
    <!-- END SCRIPTS -->         
    </body>
</html>






