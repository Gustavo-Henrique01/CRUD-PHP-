<?php
  class Controller {
    function view($visao, $parameters) {
      extract($parameters);
      include_once "view/home.php";   
    
    }
    function redirect($path) {
      
        header('location: '.APP.$path);
    }
  }
?>