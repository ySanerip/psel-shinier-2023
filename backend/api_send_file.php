<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');


//  autenticação
$email = 'yuri.calzzani@usp.pr';
$password = 'S@n3r1p@2023';


// Realiza login na API para obter o token de autenticação
$login_url = 'https://psel.apoena.shinier.com.br/api/login';
$login_data = [
    'email' => $email,
    'group_key' => 'Client',
    'password' => $password
];


// arquivo
$file_path = '/home/platonicidiot/Downloads/financeiro.csv';
$file_name = 'financeiro.csv';


// Define os dados para envio
    $url = "https://psel.apoena.shinier.com.br/api/import/create";
    $data = array(
        'file' => new CURLFile($file_path),
        'type' => 'psel-shinier-2023',
        'erp' => 'Psel',
        'user_id' => '3f83fe1a-8adc-40cd-9468-c2cfda716392'
    );

    // Inicializa a biblioteca cURL
    $ch = curl_init();

    // Define as opções de envio
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    // Executa a requisição
    $result = curl_exec($ch);

    // Fecha a conexão
    curl_close($ch);


?>

