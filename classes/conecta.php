<?php 
// criar a classe para conectar no banco
class conecta 
{
private $user; // Atributo privado vai ser acessado pelo construtor()
private $password;
private $banco;
private $server;
private static $pdo;

public function construtor()
{
    $this->servidor = 'localhost';
    $this->banco = 'db_main';
    $this->user = 'main_user';
    $this->password = '123456';
}
public function connect()
{
    try {
        // verificando se ja foi instanciado $pdo
        if (is_null(self::$pdo)) {
self::$pdo = new PDO("mysql:host=".$this->server.";dbname=".$this->banco,$this->user,$this->password);
        } 
        // se ele ja foi instanciado uma vez, executa essa linha
        // porque ele ja tem os dados para conectar.
        return self::$pdo;
    } catch (PDOException $th) {
        //throw $th;
        throw new PDOException($th);
    }
}
}


