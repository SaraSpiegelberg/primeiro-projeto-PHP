<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pessoas</title>
    <link rel="stylesheet" href="style_cadastro.css">
</head>
<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header('Location: index.php');
    exit();
}

$arquivo = fopen('pessoas.csv', 'r'); 
$todasInformacoes = [];
while ($linha = fgetcsv($arquivo)) 
{
    $arrayLinha = explode(';', $linha[0]); 
    $informacoes = [
        'codigo' => $arrayLinha[0],
        'nome' => $arrayLinha[1],
        'senha' => $arrayLinha[2],
        'idade' => $arrayLinha[3],
        'sexo' => $arrayLinha[4]
    ];
    array_push($todasInformacoes, $informacoes); 
}
fclose($arquivo); 
?>


<body>

    <?php require_once 'menu.html'; ?>

    <div class="Box">
        <br>
        <h1 class="PessoasText">Pessoas</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Senha</th>
                    <th>Idade</th>
                    <th>Sexo</th>

                </tr>
            </thead>
            <tbody> <!--tbody é o corpo da tabela-->
                <?php foreach ($todasInformacoes as $informacoes) { ?>
                    <tr>
                        <td>
                            <?php echo (str_replace('"','',$informacoes['nome'])) ?>
                        </td>
                        <td>
                            <?php echo ($informacoes['senha']) ?>
                        </td>
                        <td>
                            <?php echo ($informacoes['idade']) ?>
                        </td>
                        <td>
                            <?php echo ($informacoes['sexo']) ?>
                        </td>
                    </tr>
                <?php } ?> <!--Para ficar mais facil de ler o loop-->
            </tbody>
        </table>
    </div>
</body>

</html>