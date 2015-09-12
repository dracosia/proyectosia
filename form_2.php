<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style type="text/css"> 
.lienzo{
	width: 750px;
	height: auto;
	float: none;
	margin-right: auto;
	margin-left: auto;
	padding-bottom: 30px;
}

.logo{
	width: 285px;

}

.central_logo{
	text-align: center;
}

.texto_azul{
	font-weight: bold;
	font-size: 15px;
	color: #2E3192;
}
.texto_nota{
	text-align: justify;
	margin-bottom: 50px;
	margin-top: 20px;
	font-weight: bold;
}

.foto{
	width: 172px;
}
.espacio_componente{
	margin-top: 35px;
}
.texto_nota1{
    text-align: justify;
    margin-bottom: 30px;
    margin-top: 20px;
    font-weight: bold;

}
.texto_nota2{
    text-align: justify;
    margin-bottom: 50px;
    margin-top: 20px;
    font-weight: bold;


}
.texto_nota3{
    text-align: justify;
    margin-bottom: 30px;
    margin-top: 20px;
    font-weight: bold;
}

.boton_enviar{
    width: 100%;
    height: 50px;
    background-color: #2E3192;
    padding-top: 5px;
}

.botones{
    color: #fff;
    font-size: 25px;
}

.ancho_ticket{
    width: 150px !important;
}

</style>

 <title></title>
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">


</head>
<body>
	<div class="container">

     	<div  class="lienzo">

            <div class="row">
                <div class="col-md-12 central_logo"
                </div>
            </div>

            
            <div class="row">
                <div class="col-md-12 central_logo texto_azul">
                    LLena el siguiente formulario para informarte acerca de los programas que ofrecemos en Uniempresarial
                </div>
            </div>
            


            <div class="row espacio_componente">
                 <div class="col-md-1">    
                 </div>

                <div class="col-md-5 central_logo">                    
                    <input id="txtpregrado" type="radio" name="modalidad"  checked > Pregrado             
                </div>

                <div class="col-md-5 central_logo">                    
                    <input id="txtposgrado" type="radio" name="modalidad" > Posgrado                
                </div>
                
                 <div class="col-md-1">    
                 </div>

            </div>

            <div class="row espacio_componente">
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Fecha</span>
                        <input id="txtfecha" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>


            <div class="row espacio_componente">
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon2">Nombres y Apellidos</span>
                        <input id="txtnombres_apellidos" type="text" class="form-control" placeholder="" aria-describedby="basic-addon2">
                    </div>
                </div>
            </div>


            <div class="row espacio_componente">
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon3">Teléfono y/o Celular</span>
                        <input id="txttelefono_celular" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>


            <div class="row espacio_componente">
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Email</span>
                        <input id="txtemail" type="text" class="form-control" placeholder="" aria-describedby="basic-addon3">
                    </div>
                </div>
            </div>

            <div class="row espacio_componente">
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon4">Como se Enteró?</span>
                        <input id="txtcomo_entero" type="text" class="form-control" placeholder="" aria-describedby="basic-addon4">
                    </div>
                </div>
            </div>

            <div class="row espacio_componente">
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon5">Colegio</span>
                        <input id="txtcolegio" type="text" class="form-control" placeholder="" aria-describedby="basic-addon5">
                    </div>
                </div>
            </div>

              <div class="row espacio_componente">
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon6">Grado</span>
                         <select id="txtgrado"class="form-control" aria-describedby="basic-addon6" >
                              <option>Undécimo   </option>
                              <option>Décimo  </option>
                           </select>
                    </div>
                </div>
            </div>



              <div class="row espacio_componente">
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon7">Programa de Interés</span>
                        <select id="txtpprograma_interes"class="form-control" aria-describedby="basic-addon7" >
                              <option>Ingeniería de Sistemas   </option>
                              <option>Administración de Empresas  </option>
                           </select>
                    </div>
                </div>
            </div>



             <div class="row espacio_componente">
                 <div class="col-md-1">    
                 </div>

                <div class="col-md-5 central_logo">                    
                   <div class="boton_enviar central_logo">
                        <span class="botones">Enviar</span>
                   </div>
                </div>

                <div class="col-md-5 central_logo">                    
                    <div class="boton_enviar central_logo">
                        <span class="botones">Cancelar</span>
                   </div>        
                </div>
                
                 <div class="col-md-1">    
                 </div>

            </div>




        </div>
 </div><!-- /.container -->


</body>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript"> 
function enviarformulario(){
    var nombres_apellidos="";
    var modalidad="";
    var fecha=();
    var telefono_celular=();
    var email=();
    var como_entero=();
    var colegio=();
    var grado=();
    var programa_interes=();





    nombres_apellidos=$("#txtnombres_apellidos").val();
    fecha=$("#txtfecha").val();
    telefono_celular=$("#txttelefono_celular").val();
    email=$("#txtemail").val();
    como_entero=$("#txtcomo_entero").val()
    colegio=$("#txtcolegio").val();
    grado=$("#txtgrado").val();
    programa_interes=$("#txtpprograma_interes").val();



    if ($("#txtpregrado").is (":checked")){
        modalidad="PREGRADO"; 

    } else {
         modalidad="POSTGRADO"; 
    }
    console.log("el primer nombre es "+nombres_apellidos);
}
function limpiar(){

$("#txtnombres_apellidos").val("");
$("#txtfecha").val("");
$("#txttelefono_celular").val("");
$("#txtemail").val("");
$("#txtcomo_entero").val("");
$("#txtcolegio").val("");
prueba de cambio


}

cambiolines
cambiazo
prueba
</script>
</html>
