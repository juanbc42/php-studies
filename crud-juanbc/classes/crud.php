<?php 
require_once 'banco.php';

abstract class crud extends banco
{
protected $tabela;

abstract public function inserir();
abstract public function atualizar($id);

//para alimentar a table no html
public function buscaTodos()
{
  $sql = "SELECT * FROM $this->table ";
  $stmt = banco::prepare($sql);
  $stmt -> execute();
  return $stmt->fetchAll();  
}

// vou precisar do id para editar e deletar
public function buscar($id)
{
$sql = "SELECT * FROM $this->table WHERE id = :id ";
$stmt = banco::prepare($sql);
$stmt -> bindParam(':id', $id,PDO::PARAM_INT);
$stmt -> execute();
return $stmt -> fetch();
}



public function apagar($id)
{
$sql = "DELETE FROM $this->table WHERE id = :id ";
$stmt = banco::prepare($sql);
$stmt -> bindParam(':id', $id,PDO::PARAM_INT);
return $stmt->execute();
}

}