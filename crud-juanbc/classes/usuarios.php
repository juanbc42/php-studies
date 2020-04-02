<?php 
require_once 'crud.php';
require_once 'banco.php';
class usuarios extends crud
{
protected $table = 'usuarios';
private $nome;
private $email;
private $telefone;
private $cpf;

public function setNome($nome)
{
 $this->nome = $nome;
}
public function getNome()
{
  return  $this->nome;
}
public function setEmail($email)
{
  $this->email = $email;
}
public function getEmail()
{
  return  $this->email;
}
public function setTelefone($telefone)
{
  $this->telefone = $telefone;
}
public function getTelefone()
{
  return  $this->telefone;
}
public function setCpf($cpf)
{
  $this->cpf = $cpf;
}
public function getCpf()
{
  return  $this->cpf;
}







public function inserir()
{
    $sql = "INSERT INTO $this->table (nome, email,cpf,telefone) VALUES (:nome, :email,:cpf,:telefone)";
    $stmt = banco::prepare($sql);
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':cpf', $this->cpf);
    $stmt->bindParam(':telefone', $this->telefone);

    return $stmt->execute();
}

public function atualizar($id)
{
    $sql = "UPDATE  $this->table SET nome = :nome ,email = :email,cpf = :cpf,telefone = :telefone  WHERE id = :id";
    $stmt = banco::prepare($sql);
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':cpf', $this->cpf);
    $stmt->bindParam(':telefone', $this->telefone);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

}
