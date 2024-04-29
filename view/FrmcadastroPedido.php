
<?php
if (isset($mensagem) && $mensagem != "" && !isset($mensagemERRO)) {
    echo " 
    <div class='alert alert-success'>
        $mensagem
    </div>                    
    ";
}
if (isset($mensagemERRO) && $mensagemERRO != "" && !isset($mensagem)) {
    echo " 
    <div class='alert alert-danger'>
        $mensagemERRO
    </div>                    
    ";
}
?>
<style> 
.container {
    
    padding: 1rem;
    width : 65% ;
   border: solid #5e503f 3px;
   background-color: #c6ac8f;
}
.main-container {
    background-color: #22333b;
    padding: 1.5rem;
    margin: 50px auto 50px;
    width: 80%;
    max-width: 100%; 
}
</style>

<div class="container mt-5">
  <h2>Cadastro de Pedido</h2>
  <form action="<?php echo APP.'PedidoCliente/save'; ?>" method="POST">
   
      <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $dados['id'];?>">
    
    <div class="form-group">
      <label for="data_pedido">Data do Pedido:</label>
      <input type="date" class="form-control" id="data_pedido" name="data_pedido" value="<?php echo $dados['data_pedido'];?>">
    </div>
    <div class="form-group">
      <label for="status_pedido">Status do Pedido:</label>
      <input type="text" class="form-control" id="status_pedido" name="status_pedido" placeholder="Digite o status do pedido" value="<?php echo $dados['status_pedido'];?>">
    </div>
    <div class="form-group">
      <label for="total_pedido">Total do Pedido:</label>
      <input type="text" class="form-control" id="total_pedido" name="total_pedido" placeholder="Digite o total do pedido" value="<?php echo $dados['total_pedido'];?>">
    </div>
    <div class="form-group">
      <input type="hidden" class="form-control" id="cliente_id" name="cliente_id"  value="<?php echo $dados['cliente_id'];?>">
    </div>
    <div class="form-group">
      <label for="cpf_cliente">CPF do Cliente:</label>
      <input type="text" class="form-control" id="cpf_cliente" name="cpf_cliente" placeholder="Digite o CPF do Cliente" value="<?php echo $cliente['cpf'];?>">
    </div>
    <div class="form-group">
      <label for="endereco_entrega">Endereço de Entrega:</label>
      <input type="text" class="form-control" id="endereco_entrega" name="endereco_entrega" placeholder="Digite o endereço de entrega" value="<?php echo $dados['endereco_entrega'];?>">
    </div>
    <div class="form-group">
      <label for="metodo_pagamento">Método de Pagamento:</label>
      <input type="text" class="form-control" id="metodo_pagamento" name="metodo_pagamento" placeholder="Digite o método de pagamento" value="<?php echo $dados['metodo_pagamento'];?>">
    </div>
    <div class="form-group">
      <label for="data_entrega_esperada">Data de Entrega Esperada:</label>
      <input type="date" class="form-control" id="data_entrega_esperada" name="data_entrega_esperada" value="<?php echo $dados['data_entrega_esperada'];?>">
    </div>
    <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['usuario_id']; ?>">
    <button type="submit" class="btn btn-primary">Cadastrar Pedido</button>
  </form>
</div>
