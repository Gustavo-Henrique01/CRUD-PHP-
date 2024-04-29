<?php 

    class  CadastroClienteController extends Controller{
        function save() {
            $dados = array();
            $dados['id'] = $_POST['id'];
            $dados['nome'] = $_POST['nome'];
            $dados['cpf'] = $_POST['cpf'];
            $dados['telefone'] = $_POST['telefone'];
            $dados['usuario_id'] = $_SESSION['usuario_id'];
        
            $model = new Cliente();
        
            // Verifica se o CPF já está cadastrado para outro cliente
            $cpfIsset = $model->getByCPF($dados['cpf']);
        
            if ($dados['id'] == 0) {
                // Novo cliente
                if ($cpfIsset && $cpfIsset['usuario_id'] == $dados['usuario_id']) {
                    // O CPF já está cadastrado por outro usuário
                    $mensagemERRO = "Já existe cliente cadastrado com esse cpf nessa sessão";
                    $this->view('FrmcadastroCli', compact('dados', 'mensagemERRO'));
                } else {
                    // Permite o cadastro do novo cliente
                    $model->inserir($dados);
                    
                    $mensagemERRO = "Cliente cadastrado com sucesso";
                    setcookie("mensagemERRO", "", 0, "/APPWEB", "localhost");
                }
            } else {
                // Cliente existente
                if ($cpfIsset && $cpfIsset['id'] != $dados['id']) {
                    // O CPF já está cadastrado para outro cliente
                    $mensagemERRO = "CPF já cadastrado no sistema por outro cliente";
                    $this->view('FrmcadastroCli', compact('dados', 'mensagemERRO'));
                    
                } else {
                    // Atualiza o cliente
                    $model->atualizar($dados);
                    $mensagem = "Cliente atualizado com sucesso";
                    setcookie("mensagem", "", 0, "/APPWEB", "localhost");
                }
            }
        
            $this->redirect('CadastroCliente/listar');
        }
        
        
        function listar() {
            if (isset($_COOKIE['mensagem'])) {
                $mensagem = $_COOKIE['mensagem'];
                setcookie("mensagem", "", 0, "/APPWEB", "localhost");
            } else {
                $mensagem = "";
            }
            
        
            $usuario_id = $_SESSION['usuario_id'];
        
            $modelCliente = new Cliente();
        
            $dados= $modelCliente->getByColumnAll('usuario_id', $usuario_id);
        
            $this->view('listagemClientes', compact('dados', 'mensagem'));
        }


        function novoCadastroCliente (){

            $dados = array();
            $dados['id']= 0;
            $dados['nome']= "";
            $dados['cpf']= "";
            $dados['telefone']= "";
            $dados['usuario_id']= 0;

            $mensagem = "";
            $this->view('FrmcadastroCli', compact("dados", "mensagem"));

          }

          function excluir($id) {
       
                $model = new Cliente();
                $model->deletar($id);

            $this->redirect("CadastroCliente/listar");
        }
        
            function editar ($id){
                $Model = new Cliente ();
                 $dados = $Model->getIdRow($id);
                 $mensagem = "";
                $this->view('FrmcadastroCli', compact('dados','mensagem'));
            }
        }


        