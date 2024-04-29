<div class="container mt-5">
    <h2 class="mb-4">Registro de Usuário</h2>
    <form action="<?php echo APP.'Login/save';?>" method="POST">
        <input type="hidden" id="id" name="id" value="<?php echo $dados['id'];?>" >
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required value="<?php echo $dados['nome'];?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" required value="<?php echo $dados['email'];?>"> 
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" class="form-control" id="senha_hash" name="senha_hash" required value="<?php echo $dados['senha_hash'];?>">
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
