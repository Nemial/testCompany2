<?php

$requestMethod = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

if ($requestMethod === 'POST') {
    $data = http_build_query($_POST);
    $crl = curl_init('http://localhost:8001');
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($crl, CURLOPT_POST, true);
    curl_setopt($crl, CURLOPT_POSTFIELDS, $data);

    $result = curl_exec($crl);
    ['status' => $status] = json_decode($result, true);
    curl_close($crl);
    
    if ($status) {
        require __DIR__ . DIRECTORY_SEPARATOR . 'views/orderCorrect.html';
        return;
    } else {
        require __DIR__ . DIRECTORY_SEPARATOR . 'views/orderInCorrect.html';
        return;
    }
}

switch ($request) {
    case '/':
    case '':
        require __DIR__ . DIRECTORY_SEPARATOR . 'views/main.html';
        break;
    case '/orders':
        require __DIR__ . DIRECTORY_SEPARATOR . 'views/orders.php';
        break;
}