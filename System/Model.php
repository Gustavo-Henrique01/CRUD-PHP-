<?php
  class Model {
    protected $conexao = null;
    protected $sql = "";
    protected $table = "";
    protected $orderBy = "";

    function __construct() {
        $this->conexao = new PDO('pgsql:host=localhost;dbname=Pedidos', 'postgres', 'postgres');
    }
    
    function inserir($dados) {
        if (isset($dados['id'])) {
            unset($dados['id']);
        }
        $keys = array_keys($dados);
        $fields = implode(", ", $keys);
        $values = ":".implode(", :", $keys);
        $sql = "INSERT INTO $this->table ($fields) VALUES ($values)";
        $sentenca = $this->conexao->prepare($sql);
        foreach ($keys as $key) {
            $sentenca->bindParam(":$key", $dados[$key]);
        }
        $sentenca->execute();
      } 

      function All (){

        if ($this->sql == "") {
          $sql="SELECT * FROM $this->table  ORDER BY $this->orderBy DESC"; }
          else{
            $sql = $this->sql;
          }
        $sentenca = $this->conexao->query($sql);
        $sentenca->setFetchMode(PDO::FETCH_ASSOC);
        $dados = $sentenca->fetchAll();
        return $dados;
      }

      function deletar($id) {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $sentenca = $this->conexao->prepare($sql);
        $sentenca->bindParam(":id", $id);
        $sentenca->execute();
    }
              function atualizar ( $dados) {

                $keys = array_keys($dados);
                $filds = "";
    
                foreach ( $keys as $key ) {
    
                        if($key !="id"){
                            if( $filds != "" ){
                                $filds .= ", ";
                            }
                            $filds .= $key."=:".$key;
                        }
                }
                $sql ="UPDATE $this->table  SET $filds WHERE id =:id";
                $stm = $this->conexao->prepare($sql);
                foreach ($keys as $key){
                  $stm->bindParam(":$key",$dados[$key]);
                }        
                $stm->execute();
    }
    

            function getIdRow($id){
            $sql = "SELECT * FROM $this->table WHERE id=:id";
            $stm=$this->conexao->prepare($sql);
            $stm->bindParam(":id",$id);
            $stm->execute();
            $stm->setFetchMode(PDO::FETCH_ASSOC);
            $dados= $stm->fetch();
            return $dados;
          }

          function getByCPF($cpf){
            $sql = "SELECT * FROM $this->table WHERE cpf=:cpf";
            $stm=$this->conexao->prepare($sql);
            $stm->bindParam(":cpf",$cpf);
            $stm->execute();
            $stm->setFetchMode(PDO::FETCH_ASSOC);
            $dados= $stm->fetch();
            return $dados;
          }

          function getByColumn($columnName, $columnValue) {
            $sql = "SELECT * FROM $this->table WHERE $columnName = :columnValue";
            $stm = $this->conexao->prepare($sql);
            $stm->bindParam(":columnValue", $columnValue);
            $stm->execute();
            $stm->setFetchMode(PDO::FETCH_ASSOC);
            $dados = $stm->fetch();
            return $dados;
        }
        function getByColumnAll($columnName, $columnValue) {
          $sql = "SELECT * FROM $this->table WHERE $columnName = :columnValue";
          $stm = $this->conexao->prepare($sql);
          $stm->bindParam(":columnValue", $columnValue);
          $stm->execute();
          $stm->setFetchMode(PDO::FETCH_ASSOC);
          $dados = $stm->fetchAll();
          return $dados;
      }
          
          
    }



    ?>