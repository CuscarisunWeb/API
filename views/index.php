<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>    
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css">      
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css">
</head>
<header> <?php require 'header.php'; ?></header>
<body>
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
  $("#ocho").append("<form method='POST' action='<?php echo URL;?>index/inicio'>\n\
                        <div class='panel panel-info'>\n\
                            <div class='panel-heading'>\n\
                            <h3 class='panel-title text-lowercase'>\n\
                                <div  class='text-capitalize'>" +campo.Nombre+ "</div></h3></div>\n\
                    <div class='panel-body'>Codigo Externo :<input type='text' value='"
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