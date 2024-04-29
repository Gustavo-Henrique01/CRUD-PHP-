<?php 

class LoginController extends Controller {


    function login () {
        if (isset($_COOKIE['mensagem']) && !isset($_COOKIE['mensagemERRO'])) {
            $mensagem = $_COOKIE['mensagem'];
            setcookie("mensagem", "", 0, "/APPWEB", "localhost");   
            $this->view('FrmLogin', compact('mensagem'));
            return;
        } elseif (isset($_COOKIE['mensagemERRO']) && !isset($_COOKIE['mensagem'])) {
            $mensagemERRO = $_COOKIE['mensagemERRO'];
            setcookie("mensagemERRO", "", 0, "/APPWEB", "localhost"); 
            $this->view('FrmLogin', compact('mensagemERRO'));  
            return;
        }
    
        $mensagem = "";
        $mensagemERRO = "";
        $this->view('FrmLogin', compact('mensagem', 'mensagemERRO'));
    }
    
    



    function logar (){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $model = new Usuario();
    $dados  =  $model->getByColumn('email',$email);
   
  
    if(!$dados){
        $mensagemERRO = "Email não encontrado, digite novamente";
       
        $this->redirect('Login/login');
    } else {

        if(password_verify($senha, $dados['senha_hash'])){
           
            session_start();
            session_unset();
            session_destroy();
            session_start();
            
            $_SESSION['usuario_id'] = $dados['id'];
            $mensagem = "Bem vindo ";
            $this->redirect("/");
        }else {
            $mensagemERRO ="Senha incorreta, digite novamente";
            $this->redirect('Login/login');
        }
    }
    $tempo_expiracao = time() + 15;
    setcookie("mensagem", $mensagem, $tempo_expiracao, "/APPWEB", "localhost");
    setcookie("mensagemERRO", $mensagemERRO, $tempo_expiracao, "/APPWEB", "localhost");
          

}

        function sairLogin (){

            session_start();
            session_destroy();
            session_start(); 

            $this->redirect('login/login');

        }


        function novoUsuario (){

            $dados = array();
            $dados['id'] = 0;
            $dados['nome'] ="";
            $dados['email'] ="";
            $dados['senha_hash'] ="";
            $this->view('FrmcadastroUsuario', compact('dados'));
        }
    
        function save (){
    
            $dados['id'] = $_POST['id'];
            $dados['nome']= $_POST['nome'];
            $dados['email'] = $_POST['email'];
            $dados['senha_hash'] = password_hash($_POST['senha_hash'], PASSWORD_DEFAULT);
            $model = new Usuario ();
            $issetEmail = $model->getByColumn('email',$_POST['email']);
           
            if($issetEmail){
                $mensagemERRO = "O email: ".$dados['email']. " já está cadastrado, tente outro endereço de email";
            }
            else {
    
                $model = new Usuario();
                if($dados['id']==0){
                    $model->inserir($dados);
                    
                    $this->redirect('Login/login');
                }
                else{
                    $mensagem = "Perfil atualizado com sucesso";
                    $model->atualizar($dados);
                    $this->view("PerfilUsuario",compact("dados","mensagem"));
                }
    
            }
            $tempo_expiracao = time() + 15;
            setcookie("mensagem", $mensagem, $tempo_expiracao, "/APPWEB", "localhost");
            setcookie("mensagemERRO", $mensagemERRO, $tempo_expiracao, "/APPWEB", "localhost");
                  
    
        }

        
      



}