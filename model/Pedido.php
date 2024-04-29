<?php
  class Pedido extends Model {
    protected $sql = "SELECT Pedido.*, cliente.cpf AS cliente_cpf 
    FROM Pedido 
    LEFT JOIN cliente 
    ON cliente.id = pedido.cliente_id 
    JOIN usuarios ON usuarios.id = Pedido.usuario_id 
    ORDER BY data_pedido DESC, id;
    ";
    protected $table = "Pedido";
    protected $orderBy = "id"; 
  }
?>