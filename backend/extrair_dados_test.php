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
$password = 'masterkey';

try {
    $conexao = new PDO("firebird:dbname={$database};host={$host}", $username, $password);
} catch (PDOException $e) {
    echo "Falha na conexão: " . $e->getMessage();
}

try {
    $query = $conexao->prepare("SELECT * FROM (SELECT emd101.nome, crd111.documento, crd111.valor, bxd111.valor AS valor_pago, crd111.emissao, crd111.vencto, bxd111.baixa 
        FROM emd101
        LEFT JOIN crd111 ON emd101.cgc_cpf = crd111.cgc_cpf
        LEFT JOIN bxd111 ON emd101.cgc_cpf = bxd111.cgc_cpf and crd111.documento = bxd111.documento
        UNION ALL
        SELECT emd101.nome, cxd555.documento, cxd555.valor, cxd555.valor AS valor_pago, cxd555.data AS emissao, cxd555.data AS vencto, cxd555.data AS baixa
        FROM emd101
        LEFT JOIN atd222 ON emd101.cgc_cpf = atd222.cnpj_cpf
        LEFT JOIN cxd555 ON emd101.cgc_cpf = atd222.cnpj_cpf and cxd555.documento = atd222.documento)
        ORDER BY nome;");
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

