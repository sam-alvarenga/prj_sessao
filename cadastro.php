<?php
//inclui o arquivo de conexão ao banco de dados
include 'conexao.php'; 

//Verifica se o formulário foi enviado via método POST
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //obtém o nome do formuário
    $nome = $_POST['nome'];
    //obtém o email do formuário
    $email = $_POST['email'];
    // cria um hash da senha. Para armazenar de forma segura
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    //SQL para inserir um novo usuário na tabela 'usuários'
    $sql = "INSERT INTO tb_usuarios(nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    //Executa a consulta e verifica se a inserção foi bem sucedida
    if (mysqli_query($conn, $sql)) {

    //exibe uma mensagem de sucesso
    echo "Cadastro realizado com sucesso!";
    }else{
    //Exibi uma mensagem de erro se a inserção falhar, incluindo a mensagem de erro do banco de dados
    echo"Erro: " . $sql . "<br>" . mysqli_error($conn);
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
    <title>Cadastro</title>
</head>

<body>
    <form method="POST">
        Nome: <input type="text" name="nome" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Senha: <input type="password" name="senha" required><br><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>