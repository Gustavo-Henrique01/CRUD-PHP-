<?php
// mostrar erros no navegador
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("APP", "http://localhost/APPWEB/");

// Inclua os arquivos necessários
include_once "autoload.php";

// Verifique a URL e defina a rota padrão, se necessário
if (isset($_GET['url'])) {
  $url = $_GET['url'];
} else {
  $url = "index/index";
}
$parametros = explode('/', $url);

$nomeControlador = ucfirst($parametros[0]).'Controller';
$controller = new $nomeControlador();
$action = $parametros[1];


if ($nomeControlador != 'LoginController'  ) {
  session_start();
  if (!isset($_SESSION['usuario_id'])) {
    header('location: '.APP.'login/login');
  }
}

if (sizeof($parametros)==2) {
  $controller->$action();
} else {
  $id = $parametros[2];
  $controller->$action($id);
}
