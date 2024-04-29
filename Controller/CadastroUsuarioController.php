<?php 

class CadastroUsuarioController extends Controller {



    function saveIMG() {
        // Definindo o array de dados do usuário
        $model = new Usuario();
     
        $usuario_id = $_SESSION['usuario_id'];
        $model = new Usuario ();
        $dados = $model->getByColumn('id',$usuario_id);
          $dir = '..'.DIRECTORY_SEPARATOR ;
          $tempo_expiracao = time() + 15;
        // Verifica se um arquivo de imagem foi enviado
        if(isset($_FILES['foto'])) {
            $foto = $_FILES['foto'];
    
            // Verifica se houve erro no envio do arquivo
            if($foto['error']) {
                $mensagemERRO = "Falha ao enviar o arquivo!";
                $this->view('PerfilUsuario',compact("dados","dir","mensagemERRO"));
  
            }
            // Verifica se o tamanho do arquivo excede 3MB
            elseif ($foto['size'] > (3 * 1024 * 1024)) {
                $mensagemERRO = "Arquivo muito grande. Máximo permitido: 3MB.";
                $this->view('PerfilUsuario',compact("dados","dir","mensagemERRO"));
  
            } 
            else {
                // Define o diretório para salvar a imagem
                $pasta ='view' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
                // Obtém o nome original do arquivo
                $nome_arquivo = $foto['name'];
                // Gera um novo nome único para o arquivo
                $novoNomefile = uniqid();
                // Obtém a extensão do arquivo
                $extensaoFile = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));
                // Array com as extensões permitidas
                $permitidos = array('jpg', 'jpeg', 'webp', 'png');
    
                $path = $pasta .$novoNomefile. "." .$extensaoFile;
                

                // Verifica se a extensão do arquivo é permitida
                if(!in_array($extensaoFile, $permitidos)) {
                    $mensagemERRO = "Formato de extensão de arquivo não permitido.";
                    
                    $this->view('PerfilUsuario',compact('mensagemERRO','dados',"dir"));

                } else {
                  
                    // Move o arquivo para o diretório de destino com o novo nome
                    $fotoUP = move_uploaded_file($foto['tmp_name'], $path);
                    // Verifica se o upload foi bem-sucedido
                  
                    if($fotoUP) {
                        $mensagem = "Arquivo enviado com sucesso.";
                        
                        $dados['id'] =   $_SESSION['usuario_id'];
                        $dados['foto'] = $path;
                    
                        $model->atualizar($dados);
                          
                setcookie("mensagem", $mensagem, $tempo_expiracao, "/APPWEB", "localhost");
                        
                        $this->redirect('CadastroUsuario/perfilUsuario');
                      
                        
                    

                    } else {
                        $mensagemERRO = "Erro ao enviar o arquivo.";
                        $this->view('PerfilUsuario',compact('mensagemERRO','dados',"dir"));
                    }
                }
            }
        } else {
            $mensagem = "Nenhum arquivo de imagem enviado.";
            
            $this->view('PerfilUsuario',compact('mensagemERRO'));

        }
      

       
    }
    
    
    function perfilUsuario (){


     $usuario_id = $_SESSION['usuario_id'];
      $model = new Usuario ();
      $dados = $model->getByColumn('id',$usuario_id);
        $dir = '..'.DIRECTORY_SEPARATOR ;
        if(empty($dados['data_nascimento'])){
            $data_formatada =  $dados ['data_nascimento '] =  date("Y-m-d"); 
        } else{
        $data_formatada = date("d/m/Y", strtotime($dados['data_nascimento'])); 
        }

        if (isset($_COOKIE['mensagem']) && !isset($_COOKIE['mensagemERRO'])) {
            $mensagem = $_COOKIE['mensagem'];
            setcookie("mensagem", "", 0, "/APPWEB", "localhost");  
            $this->view('PerfilUsuario',compact("dados","dir","mensagem","data_formatada")); 
           
            return;
        } elseif (isset($_COOKIE['mensagemERRO']) && !isset($_COOKIE['mensagem'])) {
            $mensagemERRO = $_COOKIE['mensagemERRO'];
            setcookie("mensagemERRO", "", 0, "/APPWEB", "localhost"); 
            $this->view('PerfilUsuario',compact("dados","dir","data_formatada","mensagemERRO"));
            return;
        }
        $mensagem = "";
        $mensagemERRO = "";

        $this->view('PerfilUsuario',compact("dados","dir","mensagem","data_formatada","mensagemERRO"));

    }

    function infoPerfilAtualizar(){
        $dados['data_nascimento'] = $_POST['data_nascimento'];
        $dados['nome'] = $_POST['nome'];
        $dados['email'] = $_POST['email'];
        $dados['id'] = $_SESSION['usuario_id'];
    
        $model = new Usuario();
        // Obtenha os dados do usuário atual
        $usuarioAtual = $model->getByColumn('id', $_SESSION['usuario_id']);
    
        // Verifica se o e-mail enviado já está cadastrado, excluindo o e-mail do usuário atual
        if($usuarioAtual['email'] != $dados['email']) {
            $usuarioComEmail = $model->getByColumn('email', $dados['email']);
            if($usuarioComEmail && $usuarioComEmail['id'] != $_SESSION['usuario_id']) {
                $mensagemERRO = "Email já cadastrado no sistema, por favor, tente outro.";
            } else {
                $model->atualizar($dados);
                $mensagem = "Perfil atualizado com sucesso";
            }
        } else {
            // Se o e-mail enviado for o mesmo do usuário atual, não há necessidade de verificar
            $model->atualizar($dados);
            $mensagem = "Perfil atualizado com sucesso";
        }
    
        $tempo_expiracao = time() + 15;
        setcookie("mensagem", $mensagem, $tempo_expiracao, "/APPWEB", "localhost");
        setcookie("mensagemERRO", $mensagemERRO, $tempo_expiracao, "/APPWEB", "localhost");
              
        $this->redirect('CadastroUsuario/perfilUsuario');
    }
    
    function TrocarSenha() {
        $senha_atual = $_POST['senha_atual'];
        $senha_nova = $_POST['nova_senha'];
        $senha_confir =  $_POST['confirmar_nova_senha'];
        $dados['id'] = $_SESSION['usuario_id'];
        $model = new Usuario();
       
        $usuarioAtual = $model->getByColumn('id', $_SESSION['usuario_id']);
        if(!isset($_POST['senha_atual']) || !isset($_POST['nova_senha'])){
                $mensagemERRO = 'Nenhuma senha inserida';
                
        }

        if   (password_verify( $senha_atual, $usuarioAtual['senha_hash'])) {
            if ($senha_nova == $senha_confir) {
                $dados['senha_hash'] = password_hash($senha_confir,PASSWORD_DEFAULT);
                $model->atualizar($dados);
                $mensagem = "Senha alterda com sucesso !";
              
            } else {
                $mensagemERRO = "A nova senha não está igual para confirmar";
               
            }
        } else {
            $mensagemERRO = "A senha atual inserida está incorreta, digite novamente";
                    
            
           
        }
        
        $tempo_expiracao = time() + 15;
        setcookie("mensagem", $mensagem, $tempo_expiracao, "/APPWEB", "localhost");
        setcookie("mensagemERRO", $mensagemERRO, $tempo_expiracao, "/APPWEB", "localhost");
              
        $this->redirect('CadastroUsuario/perfilUsuario');
    }
    

}
?>