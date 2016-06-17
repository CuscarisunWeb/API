<?php
if(!isset($_POST['code'])){
  header("location: ".URL."index/index");
}else{
$code = $_POST['code'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalle</title>    
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css">      
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css">
</head>
<header> <?php require 'header.php'; ?></header>
<body>
 <section>
   <div class="container">
      <div class="jumbotron">
        <h3>Detalle de licitacion - codigo: <?php print $code; ?></h3>           
      </div> 
   </div>
 </section>   
 <section>
   <div class="container">
     <div class="row">
       <div class="col-sm-6" id="general"></div>       
       <div class="col-sm-6" id="comprador"></div>
     </div>
     <div class="row">
       <div class="col-sm-6" id="adicional"></div>
       <div class="col-sm-6"></div>
     </div>
   </div>
 </section> 
        
<script src="<?php echo URL; ?>public/js/jquery.js"></script>  
<script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script> 
<script>
  var licita = '<?php print $code;?>';
  var uri = "http://api.mercadopublico.cl/servicios/v1/publico/licitaciones.json?codigo="+licita+"&ticket=7F258E67-8449-45AF-8F88-674FED6FE26A";
  var cam = Array;
  $.getJSON(uri)
  .done(function( data ) {                 
  $.each(data.Listado, function(i, campo){
  $("#general").html("<div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title'>Licitación</h3></div><div class='panel-body'>\n\
        Nombre de Licitación :"+campo.Nombre+ "<br /> \n\
        Codigo Externo :"+campo.CodigoExterno+ "<br /> \n\
        Fecha Cierre : "+campo.FechaCierre+ "<br /> \n\
        Codigo Estado :"+campo.CodigoEstado+ "<br /> \n\
        Descripcion :"+campo.Descripcion+ "<br /> \n\
        Estado :"+campo.Estado);  
       /* console.log(campo.Comprador.CodigoOrganismo); */   
       
   $("#comprador").html("<div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title'>Datos del Comprador</h3></div><div class='panel-body'>\n\
        Nombre del Organismo Comprador : "+campo.Comprador.NombreOrganismo+ "<br />\n\
        Codigo Organismo :"+campo.Comprador.CodigoOrganismo+ "<br /> \n\
        Rut Unidad : "+campo.Comprador.RutUnidad+ "<br /> \n\
        Codigo Unidad :"+campo.Comprador.CodigoUnidad+ "<br /> \n\
        Nombre Unidad :"+campo.Comprador.NombreUnidad+ "<br /> \n\
        Direccion Unidad :"+campo.Comprador.DireccionUnidad+ "<br />\n\
        Comuna Unidad : "+campo.Comprador.ComunaUnidad+ "<br /> \n\
        Region Unidad : "+campo.Comprador.RegionUnidad+ "<br /> \n\
        Rut Usuario : "+campo.Comprador.RutUsuario+ "<br /> \n\
        Codigo Usuario : "+campo.Comprador.CodigoUsuario+ "<br /> \n\
        Nombre Usuario : "+campo.Comprador.NombreUsuario+ "<br /> \n\
        Cargo Usuario : "+campo.Comprador.CargoUsuario); 
    
    $("#general").html("<div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title'>Licitación</h3></div><div                    class='panel-body'>Nombre de Licitacion :"
        +campo.Nombre+ "<br /> Codigo Externo :"
        +campo.CodigoExterno+ "<br /> Fecha Cierre : "
        +campo.FechaCierre+ "<br /> Codigo Estado :"
        +campo.CodigoEstado+ "<br /> Descripcion :"
        +campo.Descripcion+ "<br /> Estado :"
        +campo.Estado); 
                          
        });
  
      });
</script>
</body>
</html>