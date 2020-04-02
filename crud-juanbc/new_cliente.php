<?php
	function __autoload($class_name){
		require_once 'classes/' . $class_name . '.php';
  }
  
?>
<!doctype html>
<html>
    <head>
        <title>CRUD - Juan</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="./assets/main.css"/>
        
        
    </head>
<body>
    <header>
    <nav>
    <button class = "button-nav"><a href="main.php" >Inicio</a></button>
        <button class = "button-nav"><a href="new_cliente.php" >Novo Cliente</a></button>
        <button class = "button-nav"><a href="clientes.php" >Listar Cliente</a></button>
        <button class = "button-nav"><a href="del_cliente.php">Excluir cliente</a></button> 	
        
    </nav>
    </header>
    <?php $usuario = new usuarios(); 
    //O isset é necessário se você precisa saber se a variável foi previamente definida
   if(isset($_POST['cadastrar'])): 
    //Variável global, $_POST.
   $nome   = $_POST['nome']; 
   $email  = $_POST['email'];
   $telefone = $_POST['cpf'];
   $cpf = $_POST['telefone'];
   $usuario->setNome($nome);
   $usuario->setEmail($email);
   $usuario->setCpf($cpf);
   $usuario->setTelefone($telefone);
  
   if($usuario->inserir()){
     echo "DADO INSERIDO!!!";
   }
endif;
?>

<div class = "newclient-form">
    <?php
    if(isset($_GET['botao']) && $_GET['botao'] == 'delete'):
        $id = (int)$_GET['id'];
        $usuario->apagar($id);
    endif;?>

    <?php 
     if(isset($_GET['botao']) && $_GET['botao']=='edit'){
        $id = (int)$_GET['id'];
        $resultadoId = $usuario->buscar($id); ?>
 
    <form method="post" action="http://localhost/new_client.php" >
        <fieldset>
            <legend>Cadastro Clientes</legend>
                <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $resultadoId->nome; ?>" />
            <br>
                <label>E-mail:</label>
            <input type="text" name="email" value="<?php echo $resultadoId->email; ?>" />
            <br>
                <label>Cpf:</label>
            <input type="text" name="cpf" />
            <br>
                <label>Telefone::</label>
            <input type="text" name="telefone"/>
            <br>
            <input type="hidden" name="id" value="<?php echo $resultadoId->id;?>">
            <br>
            <input type="submit" name="atualizar" value="Atualizar Dados"/>
            </fieldset>
            </form>
            
        <?php }else{ ?>
            <form method="post" action="" >
            <fieldset>
            <legend>Cadastro Clientes</legend>
            <label>Nome:</label>
            <input type="text" name="nome" />
            <br>
            <label>E-mail:</label>
            <input type="text" name="email" />
            <br>
            <label>Cpf:</label>
            <input type="text" name="cpf"/>
            <br>
            <label>Telefone::</label>
            <input type="text" name="telefone" />
            <br>
            <input type="submit" name="cadastrar" value="Cadastrar Dados" />
        </fieldset>
    </form>
    <?php }?>
</div>
</body>
</html>
