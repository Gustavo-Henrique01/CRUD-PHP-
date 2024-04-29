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
    <h2>Formulário de Cadastro de Clientes</h2>
    <form action="<?php echo APP.'CadastroCliente/save'; ?>" method="POST">
        
    <input type="hidden" id="id" name="id" value="<?php echo $dados['id'];?>">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $dados['nome'];?>" placeholder="Digite o nome" maxlength="100" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $dados['cpf'];?>" placeholder="Digite o CPF" maxlength="11" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Digite o telefone" required value="<?php echo $dados['telefone'];?>">
        </div>
        
        <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['usuario_id']; ?>">
        
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
