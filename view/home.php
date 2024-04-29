
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="..\view\css\index.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
 <style> 
  body {
    background-color: #22333b;
}

.bg-black {
    background-color: #000;
}

#logo {
    width: 30px;
    height: 30px;
    border-radius: 4px;
}

.navbar-brand {
    padding: 14px 20px;
    font-size: 16px;
}

.navbar-nav {
    width: 100%;
}

.nav-item {
    padding: 6px 14px;
    text-align: center;
}

.nav-link {
    padding-bottom: 10px; 
}

.v-line {
    background-color: gray;
    width: 1px;
    height: 20px;
}

.navbar-collapse.collapse.in {
    display: block !important;
}


.main-container {
    background-color: white;
    padding: 1.5rem;
    margin: 50px auto 50px;
    width: 70%;
    max-width: 100%; 
   
}

.box {
        width: 100%;
        margin: 0 auto 0  :
}




@media (max-width: 576px) {
    .nav-item {
        width: 100%;
        text-align: left;
    }

    .v-line {
        display: none;
    }
}

</style>  
</head>

<body>
<div class="container-fluid px-0">
    <nav class="navbar navbar-expand-sm navbar-dark bg-black py-0 px-0">
        <a class="navbar-brand" href=""><img id="logo" src="https://cdn-icons-png.flaticon.com/512/5164/5164023.png"> &nbsp;&nbsp;&nbsp;ANOTEI</a>
        <span class="v-line"></span>
        <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo APP; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo APP.'CadastroCliente/novoCadastroCliente'; ?>">Cadastrar Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo APP.'CadastroCliente/listar'; ?>">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo APP.'PedidoCliente/NovoPedido'; ?>">Pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo APP.'PedidoCliente/listar'; ?>">listagem Pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo APP.'Login/sairLogin'; ?>">sair</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo APP.'CadastroUsuario/perfilUsuario'; ?>">Perfil</a>
                </li>
               
            </ul>
        </div>
    </nav>
</div>
     <main class="main-container" >
      <div class="box">
    
        <?php   
            include_once 'view/'.$visao.'.php';
        ?>
        
    </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
