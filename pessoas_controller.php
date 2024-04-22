<?php
$acao = $_POST['acao'];

if ($acao === "cadastrar") {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $idade = $_POST['idade'];
    $sexo = $_POST['sexo'];
    
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
    $arquivo =fopen('pessoas.csv','a');
    $informacoes = [count($todasInformacoes)+1,$nome,$senha,$idade,$sexo];
    fputcsv($arquivo,$informacoes,";");
    fclose($arquivo);
    header('Location: pessoas.php');
    exit();
}
