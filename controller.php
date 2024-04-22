<?php
$acao = $_POST['acao'];


// Esse if confere se senha e usuario são iguais e dá acesso ao login
if ($acao === "entrar") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    //------------------------------------------------------------------
    #Lê e formata o arquivo com as devidas chaves
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
    
#Percorre todo arquivo para procurar se tem usuario cadastrado
    $usuarioEncontrado = false; 
    foreach($todasInformacoes as $informacoes){
        if ($usuario == $informacoes['nome'] && $senha == $informacoes['senha'])
        {
            $usuarioEncontrado= true; break;
        }

    }
    //-------------------------------------------------------------------
    session_start(); // ABRE A VARIAVEL GLOBAL SESSION
    if ($usuarioEncontrado === true) {
        $_SESSION['logado'] = true; // Define logado como verdadeiro
        header('Location: produtos.php');
        exit();
    } else {
        $_SESSION['logado'] = false;
        header('Location: index.php');
        exit();
    }
    exit();
}

// Esse if vem da tela cadastro produtos, e salva coisas no arquivo products.csv
else if ($acao === "cadastrar") {
    $descricao = $_POST['descricao'];
    $preco = floatval($_POST['preco']); //Converte em FLOAT
    $arquivo = fopen('products.csv', 'r'); 
    $todosProdutos = [];
    while ($linha = fgetcsv($arquivo)) // Depois de aberto ele pega uma linha do arquivo csv.
    {
        $arrayLinha = explode(';', $linha[0]); //Ele converte a linha 1;produto;valor para string
        $produto = [
            'codigo' => $arrayLinha[0],
            'descricao' => str_replace('"','',$arrayLinha[1]), //Define as chaves da array para facilitar entendimento
            'preco' => $arrayLinha[2]
        ];
        array_push($todosProdutos, $produto); 
    }
    fclose($arquivo); 
    $arquivo =fopen('products.csv','a'); //ABRE O ARQUIVO em 'a' no fim do arquivo 
    $produto = [count($todosProdutos)+1,$descricao,$preco]; // coloca tudo no formato do arquivo
    fputcsv($arquivo,$produto,";"); //escreve no arquivo
    fclose($arquivo);
    header('Location: produtos.php');
    exit();
}
