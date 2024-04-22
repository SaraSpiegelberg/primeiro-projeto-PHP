<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="style_produtos.css">
</head>
<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header('Location: index.php');
    exit();
}
$arquivo = fopen('products.csv', 'r');
$todosProdutos = [];
while ($linha = fgetcsv($arquivo)) {
    $arrayLinha = explode(';', $linha[0]);
    $produto = [
        'codigo' => $arrayLinha[0],
        'descricao' => $arrayLinha[1],
        'preco' => $arrayLinha[2]
    ];
    array_push($todosProdutos, $produto);
}
fclose($arquivo);
?>

<body class="produtos_body">
    <?php require_once 'menu.html'; ?>
    <div class="box">
        <br>
        <h1 class="produtosText">Produtos</h1>
        <table>
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($todosProdutos as $produto) { ?>
                    <tr>
                        <td>
                            <?php echo ($produto['descricao']) ?>
                        </td>
                        <td>
                            <?php echo ("R$ " . $produto['preco']) ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>