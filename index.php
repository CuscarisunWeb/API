<?php

// Se incluye las constantes 
require "config.php";

// Si la url no tiene nada , por defecto sera // http://localhost/proyecto/Index/index
$url = (isset($_GET['url'])) ? $_GET["url"] : "index/index";

// Se usa la funcion de php explode() para separar la url con slash 
$url = explode("/", $url);

// Se define la url como Controllers/Method/Params
if(isset($url[0])){ if($url[0] != ''){$controller = $url[0];}}
if(isset($url[1])){ if($url[1] != ''){$method = $url[1];}}
if(isset($url[2])){ if($url[2] != ''){$params = $url[2];}}

// Spl_autoload_register() es una funcion que detecta la clases y  las incluye
  spl_autoload_register(function($class){
      
     if(file_exists(LIBS.$class.".php")){
         require LIBS.$class.".php";
     }
  });
  
// Si exisite un controlador que lo cargue
  if(file_exists('./controllers/'.$controller.'.php')){
      
      require './controllers/'.$controller.'.php';
      $controller = new $controller();      
      if(isset($method)){
          
          if(method_exists($controller, $method)){
              
              if(isset($params)){
                  
                  $controller->{$method}($params);
              }
              else{ $controller->{$method}();                    
              }                            
          }
          else{
              echo 'Error1';
              }
      }else{            
           $controller->index();        
      }
  }
else
  {
      echo 'Error2';
  }

?>