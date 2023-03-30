<?php

header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=REGION V-Survey.csv");
header("Pragma: no-cache");
header("Expires: 0");


error_reporting(E_ALL);
ini_set('display_errors', '1');


// Definir parametros de conexão
$host = 'localhost';
$database = '/home/platonicidiot/Documents/Projects/psel-shinier-2023/BaseTeste.fdb';
$username = 'SYSDBA';
$password = 'p1r3n@521';

try {
    $conexao = new PDO("firebird:dbname={$database};host={$host}", $username, $password);
} catch (PDOException $e) {
    echo "Falha na conexão: " . $e->getMessage();
}

try {
    $query = $conexao->prepare("SELECT
 EMD101.NOME,
 TPAGAR.DOCUMENTO,
 CONTAS_PAGAR_BAIXA.ID_FORMA_PAGAMENTO,
 TPAGAR.VALOR_PARCELA,
 CONTAS_PAGAR_BAIXA.VALOR_PAGO,
 TPAGAR.EMISSAO,
 TPAGAR.VENCTO,
 TPAGAR.DATA_PAGTO,
 CONTAS_PAGAR_BAIXA.DATA_BAIXA
 FROM TPAGAR
 LEFT JOIN EMD101 ON TPAGAR.CNPJ_CPF = EMD101.CGC_CPF
 LEFT JOIN CONTAS_PAGAR_BAIXA ON TPAGAR.DOCUMENTO = CONTAS_PAGAR_BAIXA.DOCUMENTO;
");
    $query->execute();
    $dados = $query->fetchAll(PDO::FETCH_OBJ);

    foreach($dados as $linha){
            echo $linha->NOME.", ";
            echo $linha->DOCUMENTO.", ";
            echo $linha->ID_FORMA_PAGAMENTO."\n";
    }
} catch (PDOException $e) {
    echo "Erro ao executar consulta: " . $e->getMessage();
    exit(); // exit script on error
}

