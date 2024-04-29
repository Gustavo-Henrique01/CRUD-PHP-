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

<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);


div.table-title {

  margin: auto;
  max-width: 100%;
  padding:5px;
  width: 100%;
 
 
}

table{
 background-color: #3e94ec;
  font-family: "Roboto", helvetica, arial, sans-serif;
  font-size: 1px;
  font-weight: 200;
  text-rendering: optimizeLegibility;
 

}

.table-title h3 {
   color: #fafafa;
   font-size: 30px;
   font-weight: 400;
   font-style:normal;
   font-family: "Roboto", helvetica, arial, sans-serif;
   text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
   margin-bottom: 2.5rem ;
   text-align: center;
}




.table-fill {
  background: white;
  border-radius:3px;
  border-collapse: collapse;
  height: 250px;
  margin: auto;
  max-width: 100%;
  padding:5px;
  width: 100%;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
  

}
 
th {
  color:#D5DDE5;;
  background:#1b1e24;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:20px;
  font-weight: 100;
  padding:20px;
  text-align:center;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  
}

th:first-child {
  border-top-left-radius:3px;
}
 
th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}
  
tr {
  border-top: 1px solid #C1C3D1;
  border-bottom-: 1px solid #C1C3D1;
  color:#666B85;
  font-size:16px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}
 
tr:hover td {
  background:#4E5066;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
}
 
tr:first-child {
  border-top:none;
}

tr:last-child {
  border-bottom:none;
}
 
tr:nth-child(odd) td {
  background:#EBEBEB;
}
 
tr:nth-child(odd):hover td {
  background:#4E5066;
}

tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}
 
tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}
 
td {
  background:#FFFFFF;
  padding:20px;
  text-align:left;
  vertical-align:middle;
  font-weight:300;
  font-size:18px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: center;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: center;
}

td.text-left {
  text-align: center;
}
.main-container {
    background-color: #22333b;
    padding: 1.5rem;
    margin: 50px auto 50px;
    width: 70%;
    max-width: 100%; 
   
}

.box {
        width: 100%;
        margin: 0 auto 0  ;
        padding: 1.7rem;
       
}
@media screen and (max-width: 825px) {
    .table-title{
        overflow-x: auto;
    }
}


</style>


</style>


       


<div class="table-title">
    <h3>Lista de Cadastro de Clientes</h3>
    <table class="table-fill">
        <thead>
            <tr>
                <th >Numero Cliente</th>
                <th >Nome</th>
                <th >CPF</th>
                <th >Telefone</th>
                <th >Excluir</th>
                <th >Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($dados as $clientes) {
                echo "
                <tr>
                    <td >{$clientes['id']}</td>
                    <td >{$clientes['nome']}</td>
                    <td >{$clientes['cpf']}</td>
                    <td >{$clientes['telefone']}</td>
                    <td ><a href='excluir/{$clientes['id']}' class='btn btn-danger'>-</a></td>
                    <td ><a href='editar/{$clientes['id']}' class='btn btn-primary'>+</a></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
   
</div>
