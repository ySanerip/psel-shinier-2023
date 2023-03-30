<?php



error_reporting(E_ALL);
ini_set('display_errors', '1');


//  autenticação
$email = 'yuri.calzzani@usp.br';
$password = 'S@n3r1p@2023';


// Realiza login na API para obter o token de autenticação
$login_url = 'https://psel.apoena.shinier.com.br/api/login';
$login_data = [
    'email' => $email,
    'group_key' => 'Client',
    'password' => $password
];

// Inicializa a biblioteca cURL
    $ch = curl_init();

    // Define as opções de envio
    curl_setopt($ch, CURLOPT_URL, $login_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $login_data);

    $result = curl_exec($ch);

    $response = json_decode($result);
    $token = $response->token;  	  
    $user_id = $response->user->id;

    var_dump($token);

    curl_close($ch);
    
// Define os dados para envio
    $sendfile_url = "https://psel.apoena.shinier.com.br/api/import/create";

    $authorization = "Authorization: Bearer ".$token;

    $data =[ 
        'file' => new CURLFile('/home/platonicidiot/Downloads/financeiro.csv'),
        'type' => 'psel-shinier-2023',
        'erp' => 'Psel',
        'user_id' => $user_id
    ];
     $ch = curl_init();


    // Define as opções de envio
    curl_setopt($ch, CURLOPT_URL, $sendfile_url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));   
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);  
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    //RECEBENDO 
    $send_result = curl_exec($ch);
    $send_response = json_decode($send_result);
    var_dump($send_response);

    // Fecha a conexão
    curl_close($ch);


?>
