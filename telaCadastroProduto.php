<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos | Sara Spiegelberg</title>
    <link rel="stylesheet" href="style_cadastro.css">
</head>
<?php
session_start();
if (!isset($_SESSION['logado'])) // VÊ SE A VARIAVEL NÃO ESTÁ CRIADA (por causa do !)
{
    header('Location: telaLogin.php');
    exit();
}
?>

<body>


    <?php require_once 'menu.html'; ?>
    <div class="Box">
        <h1>Cadastro de produtos</h1>
        <form action="controller.php" method="post">
            <label for="descricao">Insira seus dados:</label>
            <br>
            <br>
            <input type="text" name="descricao" id="descricao" placeholder="Informe a Descrição" required>
            <br>
            <br>
            <input type="number" name="preco" id="preco" placeholder="Informe o Preço" step="any" required>
            <br>
            <br>
            <input type="hidden" name="acao" id="acao" value="cadastrar">
            <input type="submit" value="cadastrar">
        </form>
    </div>
</body>

</html>