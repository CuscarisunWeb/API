<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>    
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css">      
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css">
</head>
<header><?php require 'header.php'; ?></header>
<body>
 <section>
   <div class="container">
      <div class="jumbotron">
          <h3>API - Elige la lista que quieres ver</h3>    
          <div class="row">
              <div class="col-sm-12">
              <button class="btn btn-success btn-group" id="Publicada">Publicada</button>
              <button class="btn btn-success btn-group" id="Cerrada">Cerrada</button>
              <button class="btn btn-success btn-group" id="Desierta">Desierta</button>
              <button class="btn btn-success btn-group" id="Adjudicada">Adjudicada</button>
              <button class="btn btn-success btn-group" id="Revocada">Revocada</button>
              <button class="btn btn-success btn-group" id="Suspendida">Suspendida</button>
              <button class="btn btn-success btn-group" id="Todos">Todos</button>
              <button class="btn btn-success btn-group" id="guardar_">Guardar</button>
              </div>
          </div>
          <br />
       <div class="row"> 
           
       </div>
       <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                 <p id="est"></p>
                 <p id="cant"></p> 
                </div>
            </div>
       </div>
      </div>
   </div>
 </section>   
 <section>
   <div class="container">
    
     <div class="row"> 
      <form action="<?php echo URL;?>index/guardar" method="post">  
       <div class="col-sm-12" id="ocho">
       <!-- <div class="gifLoad">
          <img src="<?php echo URL;?>public/img/loading.gif">
        </div>-->
         
       </div>
       </form>          
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
  /*var uri = "<?php echo JSON;?>estado=activas&ticket=<?php echo TIC;?>"; */
$("#Todos").click(function(){   
    if($("#ocho").length){ $("#ocho").html(" "); }  
    var uri = "<?php echo JSON;?>estado=Todos&ticket=<?php echo TIC;?>";
    $.getJSON(uri).done(function( data ) {              
             $("#cant").html('Cantidad : '+data.Cantidad)
             $("#est").html('Estado : Todos');
     $.each(data.Listado, function(i, campo){    
       $("#ocho").append("<form method='POST' action='<?php echo URL;?>index/inicio'><div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title text-lowercase'><div  class='text-capitalize'>"
                        +campo.Nombre+ "</div></h3></div><div class='panel-body'>Codigo Externo :<input type='text' value='"
                        +campo.CodigoExterno+ "' name='code'/><br /> Fecha Cierre : "
                        +campo.FechaCierre+ "<br /> Codigo Estado :"
                        +campo.CodigoEstado+ "<br /> <button class='btn btn-info btn-sm'>Detalle</button></div></div></form>");                                  
            });
          });             
});
$("#Cerrada").click(function(){   
    if($("#ocho").length){ $("#ocho").html(" "); }  
    var uri = "<?php echo JSON;?>estado=Cerrada&ticket=<?php echo TIC;?>";
    $.getJSON(uri).done(function( data ) {  
         $("#cant").html('Cantidad : '+data.Cantidad)
             $("#est").html('Estado : Cerrada');
     $.each(data.Listado, function(i, campo){    
       $("#ocho").append("<form method='POST' action='<?php echo URL;?>index/inicio'><div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title text-lowercase'><div  class='text-capitalize'>"
                        +campo.Nombre+ "</div></h3></div><div class='panel-body'>Codigo Externo :<input type='text' value='"
                        +campo.CodigoExterno+ "' name='code'/><br /> Fecha Cierre : "
                        +campo.FechaCierre+ "<br /> Codigo Estado :"
                        +campo.CodigoEstado+ "<br /> <button class='btn btn-info btn-sm'>Detalle</button></div></div></form>");                                  
            });
          });             
});
$("#Desierta").click(function(){   
if($("#ocho").length){ $("#ocho").html(" "); }  
var uri = "<?php echo JSON;?>estado=Desierta&ticket=<?php echo TIC;?>";
$.getJSON(uri).done(function( data ) {  
            $("#cant").html('Cantidad : '+data.Cantidad)
             $("#est").html('Estado : Desierta');
 $.each(data.Listado, function(i, campo){    
   $("#ocho").append("<form method='POST' action='<?php echo URL;?>index/inicio'><div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title text-lowercase'><div  class='text-capitalize'>"
                    +campo.Nombre+ "</div></h3></div><div class='panel-body'>Codigo Externo :<input type='text' value='"
                    +campo.CodigoExterno+ "' name='code'/><br /> Fecha Cierre : "
                    +campo.FechaCierre+ "<br /> Codigo Estado :"
                    +campo.CodigoEstado+ "<br /> <button class='btn btn-info btn-sm'>Detalle</button></div></div></form>");                                  
        });
      });             
});
$("#Adjudicada").click(function(){   
if($("#ocho").length){ $("#ocho").html(" "); }  
var uri = "<?php echo JSON;?>estado=Adjudicada&ticket=<?php echo TIC;?>";
$.getJSON(uri).done(function( data ) {  
             $("#cant").html('Cantidad : '+data.Cantidad)
             $("#est").html('Estado : Adjudicada');
 $.each(data.Listado, function(i, campo){    
   $("#ocho").append("<form method='POST' action='<?php echo URL;?>index/inicio'><div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title text-lowercase'><div  class='text-capitalize'>"
                    +campo.Nombre+ "</div></h3></div><div class='panel-body'>Codigo Externo :<input type='text' value='"
                    +campo.CodigoExterno+ "' name='code'/><br /> Fecha Cierre : "
                    +campo.FechaCierre+ "<br /> Codigo Estado :"
                    +campo.CodigoEstado+ "<br /> <button class='btn btn-info btn-sm'>Detalle</button></div></div></form>");                                  
        });
      });             
});
$("#Revocada").click(function(){   
if($("#ocho").length){ $("#ocho").html(" "); }  
var uri = "<?php echo JSON;?>estado=Revocada&ticket=<?php echo TIC;?>";
$.getJSON(uri).done(function( data ) {  
             $("#cant").html('Cantidad : '+data.Cantidad)
             $("#est").html('Estado : Revocada');
 $.each(data.Listado, function(i, campo){    
   $("#ocho").append("<form method='POST' action='<?php echo URL;?>index/inicio'><div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title text-lowercase'><div  class='text-capitalize'>"
                    +campo.Nombre+ "</div></h3></div><div class='panel-body'>Codigo Externo :<input type='text' value='"
                    +campo.CodigoExterno+ "' name='code'/><br /> Fecha Cierre : "
                    +campo.FechaCierre+ "<br /> Codigo Estado :"
                    +campo.CodigoEstado+ "<br /></div></div></form>");                                  
        });
      });             
});
$("#Suspendida").click(function(){   
if($("#ocho").length){ $("#ocho").html(" "); }  
var uri = "<?php echo JSON;?>estado=Suspendida&ticket=<?php echo TIC;?>";
$.getJSON(uri).done(function( data ) {  
             $("#cant").html('Cantidad : '+data.Cantidad)
             $("#est").html('Estado : Suspendida');
 $.each(data.Listado, function(i, campo){    
   $("#ocho").append("<form method='POST' action='<?php echo URL;?>index/inicio'><div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title text-lowercase'><div  class='text-capitalize'>"
                    +campo.Nombre+ "</div></h3></div><div class='panel-body'>Codigo Externo :<input type='text' value='"
                    +campo.CodigoExterno+ "' name='code'/><br /> Fecha Cierre : "
                    +campo.FechaCierre+ "<br /> Codigo Estado :"
                    +campo.CodigoEstado+ "<br /> <button class='btn btn-info btn-sm'>Detalle</button></div></div></form>");                                  
        });
      });             
});
$("#Publicada").click(function(){   
    if($("#ocho").length){ $("#ocho").html(" "); }    
    var uri = "<?php echo JSON;?>estado=Publicada&ticket=<?php echo TIC;?>";
    $.getJSON(uri).done(function( data ) {  
             $("#cant").html('Cantidad : '+data.Cantidad)
             $("#est").html('Estado : Publicada');
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
});
    $("#guardar_").click(function(){
        $("form").submit();
    });

  
 
  
</script>
</body>
</html>