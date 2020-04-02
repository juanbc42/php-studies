<?php 
// utilizando o conteudo do arquivo configuracao
require_once 'configuracao.php';

class banco {
private static $instance;
 // metodo é static pq nao vou ficar instanciando a classe
 // banco toda vez que eu precisar usar um metodo dela
public static function getInstance()
{
    if (!isset(self::$instance)) {
        try {
self::$instance = new PDO('mysql:host='. DB_HOST. ';dbname='.DB_NAME, DB_USER, DB_PASS);
self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);     
} catch (PDOException $e) {
            echo $e ->getMessage();
        }
    }
    return self::$instance;
}

 //Conexao::getInstance()->prepare($sql), é nesta linha que ao mesmo tempo que capturamos a instância do PDO da memória, já passamos a ele o SQL a ser preparado. O PDO irá pegar sua SQL e implementar os escapes necessários e segurança necessária. A única coisa que você precisará fazer é passar os parâmetros definidos no SQL com o método bindParam e executar sua Query com o método execute().//



public static function prepare($sql)
{ 
    return self::getInstance()->prepare($sql);
}

}