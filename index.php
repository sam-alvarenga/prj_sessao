<?php
//Inicia uma nova sessão ou resume a sessão existente
session_start();

//Inclui o arquivo de conexao ao banco de dados
include 'conexao.php';

//Verifica se método de requisição é POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //obtém o valor do campo 'email' do formuário
    $email = $_POST['email'];
     //obtém o valor do campo 'senha' do formuário
    $senha = $_POST['senha'];

    //COnsulta o banco de ddados para encontrar o usuario com o email fornecido
    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    //Executa a consulta no banco de dados
    $result = mysqli_query($conn, $sql);

    //verifica se a consulta retornou algum resultado
    if( mysqli_num_rows($result) > 0){
        //Obtém os dados do usuário encontrado
        $user =  mysqli_fetch_assoc($result);

        //Verifica se a senha fornecida corresponde á senha armazenada no banco de dados
        //está comparando o que foi digitado
        if (password_verify($senha, $user['senha'])) {

            //as informações que você deseja armazenar na sessão 
            //Armazena o ID e onome do usuários na sessão
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_nome'] = $user['nome'];
            //Redireciona o usuário para a página principal
            header("Location: pagina_principal.php");
            //Termina a exercução do script
            exit;
         //Exibir mensagem de erro se a senha estiver incorreta    
        }else{
            echo "Senha incorreta!";
        }
     ///Exibir mensagem de erro se o usuario  não for encontrado
    }else{
        echo "Usuário não encontrado";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Login</title>
</head>
<body>
<div class="container">
    <img src="./imgs/login.jpg" alt="Login Imagem">
    <form action="" method="post">
        Email: <input type="email" name="email" required><br><br> 
        Senha: <input type="password" name="senha" required><br><br> 
        <input type="submit" value="Entrar">
    </form>
    <a href="cadastro.php" class="cadastro-link">Fazer Cadastro</a>
</div>
</body>
</html>