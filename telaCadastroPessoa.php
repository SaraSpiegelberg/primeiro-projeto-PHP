<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | Pessoas</title>
    <link rel="stylesheet" href="style_cadastro.css">
    </style>
</head>
<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header('Location: index.php');
    exit();
}
?>

<body>
    <?php require_once 'menu.html'; ?>
    <div class="Box">
        <h1>Cadastro de Pessoas</h1>
        <form action="pessoas_controller.php" method="post">
            <label for="descricao">Cadastre uma nova pessoa</label>
            <br>
            <br>
            <input type="text" name="nome" id="nome" placeholder="Informe um nome" required>
            <br>
            <br>
            <input type="password" name="senha" id="senha" placeholder="Informe uma senha" required>
            <br>
            <br>
            <input type="number" name="idade" id="idade" placeholder="Informe uma idade">
            <br>
            <br>
            <label for="sexo">Sexo: </label>
            <select name="sexo" id="sexo">
                <option value="">Selecione</option>
                <option value="F">Feminino</option>
                <option value="M">Masculino</option>
            </select>
            <br>
            <br>
            <input type="hidden" name="acao" id="acao" value="cadastrar">
            <input type="submit" value="Cadastrar">
        </form>
    </div>
</body>

</html>