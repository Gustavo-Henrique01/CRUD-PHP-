
<?php
class Cliente extends Model {
    protected $table = "cliente";
    protected $sql = "SELECT * FROM cliente 
    JOIN usuarios ON cliente.usuario_id = usuarios.id 
  ";
   
    protected $orderBy = "id";
}
?>
