<?php
  spl_autoload_register(function($classe) {
        $dirs = array(
            'Controller/',
            'model/', 
            'System/',  
        );   
        foreach ($dirs as $dir) {
            if (file_exists($dir.$classe.'.php')) {
                require_once($dir.$classe.'.php');
                return;
            }        
        } 
      });

  
?>