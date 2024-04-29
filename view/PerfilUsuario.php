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
.container{
width: 70%;

}
.main-container {
    background-color: #22333b;
    padding: 1.5rem;
    margin: 50px auto 50px;
    width: 80%;
    max-width: 100%; 
}
</style>

<div class="container">
    <div class="card overflow-hidden">
        <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                    <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">Informações Gerais</a>
                    <a class="list-group-item list-group-item-action" id="trocar-senha-link"  data-toggle="list" href="#account-change-password">Trocar senha</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="account-general">
                        <form class="caixa" action="<?php echo APP . 'CadastroUsuario/saveIMG'; ?>" method="POST" enctype="multipart/form-data">
                            <div class="profile-image">
                                <label class="label">
                                    <input type="file" id="foto" name="foto">
                                    <figure class="profile-figure">
                                        <img src="<?php echo $dir. $dados['foto']; ?>" class="profile-avatar" alt="avatar">
                                        <figcaption class="profile-figcaption">
                                            <img src="https://raw.githubusercontent.com/ThiagoLuizNunes/angular-boilerplate/master/src/assets/imgs/camera-white.png">
                                        </figcaption>
                                    </figure>
                                </label>
                            </div>

                            <span>
                                <p>Permitido fotos nos seguintes formatos: JPG, WEBP ou PNG. Tamanho máximo de 2MB </p>
                                <button type="submit">Enviar arquivo</button> <!-- Adicionei o botão de enviar arquivo -->
                            </span>
                        </form>

                        <hr class="border-light m-0">

                        <form class="card-body" action="<?php echo APP.'CadastroUsuario/infoPerfilAtualizar'; ?>"  method="POST">
                            <input type="hidden" class="form-control mb-1" id="id" name="id" value="<?php echo $dados['id']; ?>">
                            <div class="form-group">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control mb-1" id="nome" name="nome" value="<?php echo $dados['nome']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $dados['email']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control mb-1" id="data_nascimento" name="data_nascimento" value="<?php  echo $dados['data_nascimento']; ?>">
                            </div>
                            <div class="text-right margin-right mt-3">
                                <button type="submit" class="btn btn-primary">Salvar alterações</button>&nbsp;
                               
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="account-change-password">
                        <form class="caixa"  id="trocarSenhaForm" action="<?php echo APP . 'CadastroUsuario/TrocarSenha'; ?>" method="POST">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Senha atual</label>
                                    <input type="password" class="form-control" id="senha_atual" name="senha_atual">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nova senha</label>
                                    <input type="password" class="form-control" id="nova_senha" name="nova_senha">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repita a nova senha</label>
                                    <input type="password" class="form-control" id="confirmar_nova_senha" name="confirmar_nova_senha">
                                </div>
                            </div>
                            <div class="text-right  mt-3">
                                <button type="submit"  class="btn btn-primary">Salvar alterações</button>&nbsp;
                             
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
