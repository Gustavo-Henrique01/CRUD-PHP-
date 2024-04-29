<?php 

class PedidoClienteController extends Controller {



    function NovoPedido (){

    $dados = array();
    $dados['id'] = 0;
    $dados['data_pedido'] =  date("Y-m-d");
    $dados['status_pedido'] = "";
    $dados['total_pedido'] = "";
    $cliente['cpf'] = "";
    $dados['cliente_id'] = "";
    $dados['endereco_entrega'] = "";
    $dados['metodo_pagamento'] = "";
    $dados['data_entrega_esperada'] =  date("Y-m-d");
    $dados['usuario_id'] = 0;
    $mensagem = "";
    $this->view('FrmcadastroPedido', compact("dados", "cliente", "mensagem"));



    }
    
    function save() {

        $dados = array();
                $dados['id'] = $_POST['id'];
                $dados['data_pedido'] = $_POST['data_pedido'];
                $dados['status_pedido'] = $_POST['status_pedido'];
                $dados['total_pedido'] = $_POST['total_pedido'];
                $cliente['cpf'] = $_POST['cpf_cliente'];
                $dados['endereco_entrega'] = $_POST['endereco_entrega'];
                $dados['metodo_pagamento'] = $_POST['metodo_pagamento'];
                $dados['data_entrega_esperada'] = $_POST['data_entrega_esperada'];
                $dados['usuario_id'] = $_POST['usuario_id'];
            
                $cpf = $_POST['cpf_cliente'];
                $mensagem = "";
                if (isset($_POST['cpf_cliente'])) {
                   
                    $modelCliente = new Cliente();
                    $clienteIsset = $modelCliente->getByCPF($cpf);
                   
            
                    if ($clienteIsset && $clienteIsset['usuario_id']==$_SESSION['usuario_id']) {
                        $dados['cliente_id'] = $clienteIsset['id'];
                        $modelPedido = new Pedido();
                        if ($dados['id'] == 0) {
                            $modelPedido->inserir($dados);
                            $mensagem = "Pedido inserido com sucesso!";
                        } else {
                            $modelPedido->atualizar($dados);
                            $mensagem = "Pedido atualizado com sucesso!";
                        }
                        $this->redirect('PedidoCliente/listar');
                    } else {
                        $dados['cliente_id'] = $cpf;
                        $mensagemERRO = "Não há nenhum cliente cadastrado com o CPF {$cpf} no sistema.";
                    }
                } if (empty($_POST['cpf_cliente'])) {
                    $mensagemERRO = "Não foi informado o CPF do cliente.";
                }
               
                setcookie("mensagemERRO", $mensagemERRO, 0, "/APPweb", "localhost");
                setcookie("mensagem", $mensagem, 0, "/APPWEB", "localhost");

                
                $this->view('FrmcadastroPedido', compact('mensagemERRO', 'dados','cliente'));
            }
    
    function listar (){
        $model =new Pedido();
        $clienteModel = new Cliente();
        $usuario_id = $_SESSION['usuario_id'];
        $dados = $model->getByColumnAll('usuario_id',$usuario_id);

        if (isset($_COOKIE['mensagem']) && !isset($_COOKIE['mensagemERRO'])) {
            $mensagem = $_COOKIE['mensagem'];
            setcookie("mensagem", "", 0, "/APPWEB", "localhost");   
            $this->view('listagemPedidos', compact('mensagem','dados', 'clienteModel'));
            return;
        } elseif (isset($_COOKIE['mensagemERRO']) && !isset($_COOKIE['mensagem'])) {
            $mensagemERRO = $_COOKIE['mensagemERRO'];
            setcookie("mensagemERRO", "", 0, "/APPWEB", "localhost"); 
            $this->view('cadastroPedido', compact('mensagemERRO','dados', 'clienteModel'));  
            return;
        }
    
        $mensagem = "";
        $mensagemERRO = "";
       
        
        
        $this->view('listagemPedidos', compact('dados', 'clienteModel','mensagem','mensagemERRO'));
        
    }

    
    
    function excluir($id) {
        $model = new Pedido();
        $mensagem = "";
        $mensagemERRO = "";
        
        if ($model->deletar($id)) { 
            $mensagem = "Pedido excluído com sucesso!";
        } else {
            $mensagemERRO = "Erro ao excluir Pedido";
        }
    
        setcookie("mensagemERRO", $mensagemERRO, time()+15, "/APPweb", "localhost");
        setcookie("mensagem", $mensagem, time()+15, "/APPWEB", "localhost");
    
        $this->redirect("PedidoCliente/listar");
    }
    




    function editar ($id){
        $Model = new Pedido ();
         $dados = $Model->getIdRow($id);
         $clienteModel = new Cliente();
         $cliente = $clienteModel->getIdRow($dados['cliente_id']);
       
        $this->view('FrmcadastroPedido', compact('dados','cliente'));
    }

    
    


}