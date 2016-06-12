<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>    
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css">      
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css">
</head>
<body>
<div class="container">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">API FreeMerch</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Buscar <span class="sr-only">(current)</span></a></li>
        <li><a href="index.php">Inicio</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Detalles <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Detalles</a></li>
            <li><a href="#">Graficos</a></li>
            <li><a href="#">Que hace esta API</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Filtrar por Codigo</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Link Vacio</a></li>
          </ul>
        </li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Salir</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Descargar <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">PDF</a></li>
            <li><a href="#">Enviar a un correo</a></li>
            <li><a href="#">Link vacios</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Link vacio</a></li>
          </ul>
        </li>
      </ul>
    </div>    <!-- /.navbar-collapse -->
  </div>      <!-- /.container-fluid -->
</nav>   
</div>
 <section>
   <div class="container">
      <div class="jumbotron">
        <h3>Puedes consultar en la API, selecionando un detalle y mostrará el listado.</h3> 
        <button id="mostrar" class="btn btn-primary btn-lg">Mostrar</button>


        <button id="enviar" class="btn btn-warning btn-lg">enviar</button>   
      </div> 
   </div>
 </section>   
 <section>
   <div class="container">
    
     <div class="row">      
       <div class="col-sm-6" id="ocho">
       <!-- <div class="gifLoad">
          <img src="<?php echo URL;?>public/img/loading.gif">
        </div>-->
         
       </div>       
     </div>
   </div>
 </section>        
<script src="<?php echo URL; ?>public/js/jquery.js"></script>  
<script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script> 
<script>
  $("#enviar").hide();
  var datos = {};
  var nombre = new Array();
  var externo = new Array();
  var cierre = new Array();
  var estado = new Array();
  var cont = 0;
  var uri = "http://api.mercadopublico.cl/servicios/v1/publico/licitaciones.json?estado=activas&ticket=7F258E67-8449-45AF-8F88-674FED6FE26A"; 
$("#mostrar").click(function(){    
$.getJSON(uri).done(function( data ) {  
 
 $.each(data.Listado, function(i, campo){    
   $("#ocho").append("<form method='POST' action='<?php echo URL;?>index/inicio'><div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title text-lowercase'><div  class='text-capitalize'>"
                    +campo.Nombre+ "</div></h3></div><div class='panel-body'>Codigo Externo :<input type='text' value='"
                    +campo.CodigoExterno+ "' name='code'/><br /> Fecha Cierre : "
                    +campo.FechaCierre+ "<br /> Codigo Estado :"
                    +campo.CodigoEstado+ "<br /> <button class='btn btn-info btn-sm'>Detalle</button></div></div></form>");          
                     nombre[i] = campo.Nombre;
                    externo[i] = campo.CodigoExterno;
                     cierre[i] = campo.FechaCierre;
                     estado[i] = campo.CodigoEstado;            
                                   
               datos = {
                'nombre' : nombre[i],
                'externo' : externo[i],
                'cierre' : cierre[i],
                'estado' : estado[i]
              };
           
    
                                     
        });
      }); 
   
    /*$.ajax({
      type: 'GET',
       url : 'http://api.mercadopublico.cl/servicios/v1/publico/licitaciones.json?estado=activas&ticket=7F258E67-8449-45AF-8F88-674FED6FE26A',
      dataType: 'json',     
      success: function(data){
     
          $.each(data.Listado, function(i, campo){    
          $("#ocho").append("<form method='POST' action='<?php echo URL;?>index/inicio'><div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title text-lowercase'><div  class='text-capitalize'>"
                    +campo.Nombre+ "</div></h3></div><div class='panel-body'>Codigo Externo :<input type='text' value='"
                    +campo.CodigoExterno+ "' name='code'/><br /> Fecha Cierre : "
                    +campo.FechaCierre+ "<br /> Codigo Estado :"
                    +campo.CodigoEstado+ "<br /> <button class='btn btn-info btn-sm'>Detalle</button></div></div></form>");        
                    nombre[i] = campo.Nombre;
                    externo[i] = campo.CodigoExterno;
                     cierre[i] = campo.FechaCierre;
                     estado[i] = campo.CodigoEstado;
            console.log(typeof nombre[i]+"<br />"+
                        typeof externo[i]+"<br />"+
                        typeof cierre[i]+"<br />"+
                        typeof estado[i]+"<br />"
                       )
              
         
            
            cont += 1;
               datos = {
                'nombre' : nombre[i],
                'externo' : externo[i],
                'cierre' : cierre[i],
                'estado' : estado[i]
              };
            console.log(datos);
        });
         
      
    }
  });
   */
        $("#mostrar").hide();
        $("#enviar").show();
    });
  $("#enviar").click(function(){
    var otro = {};
   for(var i = 0 ; i < datos.cierre.length ; i++){
    otro = {
                'nombre' : nombre[i],
                'externo' : externo[i],
                'cierre' : cierre[i],
                'estado' : estado[i]
              };
  $.post('<?php echo URL;?>index/licitacion',otro);
   }
    });
  
 
  
</script>

</body>
</html>