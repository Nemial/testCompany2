<?php

$requestMethod = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];
if ($requestMethod === 'POST') {
    $data = $_POST;
    $postData = json_encode($data);
    $crl = curl_init('http://localhost:8000/dataSave.php');
    var_dump($crl);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($crl, CURLINFO_HEADER_OUT, true);
    curl_setopt($crl, CURLOPT_POST, true);
    curl_setopt($crl, CURLOPT_POSTFIELDS, $postData);
    curl_setopt(
        $crl,
        CURLOPT_HTTPHEADER,
        [
            'Content-Type: application/json',
            'Content-Length: ' . mb_strlen($postData)
        ]
    );
    var_dump($requestMethod);

    $result = curl_exec($crl);
    var_dump($result);
    curl_close($crl);
}


switch ($request) {
    case '/':
    case '':
        require __DIR__ . DIRECTORY_SEPARATOR . 'views/main.html';
        break;
    case 'dataSave.php':
}