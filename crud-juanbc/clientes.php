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

    <header>
    <nav>
        <button class = "button-nav"><a href="main.php" >Inicio</a></button>
            <button class = "button-nav"><a href="new_cliente.php" >Novo Cliente</a></button>
            <button class = "button-nav"><a href="clientes.php" >Listar Cliente</a></button>
            <button class = "button-nav"><a href="del_cliente.php">Excluir cliente</a></button> 	
            
        </nav>
    </header>
<body>
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
    <table class="tabela" border="1">
        <!-- Cabecalho Tabela -->
        <thead> 
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Cpf</th>
            <th>Telefone</th>
            <!-- <th>Botoes</th> -->
        </tr>
        </thead>
        <!-- Corpo Tabela -->
        <tbody>
        <!-- Aqui crio um for para alimentar a tabela com dados vindos do banco -->
        <?php foreach($usuario->buscaTodos() as $key => $valor):   ?>
        <tr>
            <td><?php echo $valor->id; ?></td>
            <td><?php echo $valor->nome; ?></td>
            <td><?php echo $valor->email; ?></td>
            <td><?php echo $valor->cpf; ?></td>
            <td><?php echo $valor->telefone; ?></td>
            <!--
                <td><?php echo "<a href='index.php?botao=edit&id=".$valor->id."'>Editar</a>" ?></td>
                <td><?php echo "<a href='index.php?botao=delete&id=".$valor->id."'onclick= 'return confirm(\"Deseja Realmente DELETAR ? ".$valor->nome." \")'>Deletar</a>" ?> </td> 
            -->
        </tr>
        </tbody>
        <?php endforeach; ?>
    </table>
    
</body>
</html>