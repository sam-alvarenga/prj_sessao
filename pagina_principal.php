<?php
//Inicia uma nova sessão ou retorno a sessão existemte
session_start();

//Verifica se o usuário está logado
//Verifica se a variavel de sessão usuario_id está definida.
//se não estiver, siginifica que o usuário não está logado.

if(!isset($_SESSION['usuario_id'])){
    //Esta função é usada para enviar cabecalhos HTPP brutos diretamente ao navegador.
    //o servidor envia um cabecalhp HTPP ao navegador, instruindo-o a carregar a página index.php
    header("Location: index.php");
    //finaliza o script. Por segurança
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Painel</title>
</head>
<body>
<h1>Bem-Vindo, <?php echo htmlspecialchars($_SESSION['usuario_nome']);?>!</h1>
<p>Você está logado.</p>
<a href="logout.php">Sair</a>
</body>
</html>