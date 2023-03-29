<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');


// Definir parametros de conexão
$host = 'localhost';
$database = '/home/platonicidiot/Documents/Projects/psel-shinier-2023/BaseTeste.fdb';
$username = 'SYSDBA';
$password = 'masterkey';

try {
    $conexao = new PDO("firebird:dbname={$database};host={$host}", $username, $password);
} catch (PDOException $e) {
    echo "Falha na conexão: " . $e->getMessage();
}

try {
    $query = $conexao->prepare("SELECT NOME FROM EMD101");
    $query->execute();
    $dados = $query->fetchAll(PDO::FETCH_OBJ);

    foreach($dados as $linha){
        echo $linha->NOME . "<br/>";
    }
} catch (PDOException $e) {
    echo "Erro ao executar consulta: " . $e->getMessage();
    exit(); // exit script on error
}


?>

