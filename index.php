<?php

$requestMethod = $_SERVER['REQUEST_METHOD'];

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
        require 'views/orderCorrect.html';
        return;
    } else {
        require 'views/orderInCorrect.html';
        return;
    }
} elseif (!empty($_GET)) {
    require 'views/orders.php';
    return;
} else {
    require 'views/main.html';
    return;
}