<?php

// Parametros para a conexao
$host = 'localhost';
$database = '/home/platonicidiot/Documents/Projects/psel-shinier-2023/BaseTeste.fdb';
$username = 'SYSDBA';
$password = 'masterkey';

try {
    $pdo = new PDO("firebird:dbname={$database};host={$host}", $username, $password);
    echo "Conectado ao banco de dados.";
} catch (PDOException $e) {
    echo "Falha de conexao: " . $e->getMessage();
}
?>

