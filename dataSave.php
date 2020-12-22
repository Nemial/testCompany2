<?php

$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'POST') {
    $order = $_POST['order'];

    foreach ($order as $key => $value) {
        if (empty($value)) {
            $result = ['status' => false];
            echo json_encode($result);
            return;
        }
    }
    $data = json_encode($_POST);
    $fileDb = __DIR__ . DIRECTORY_SEPARATOR . 'db.json';
    if (!file_exists($fileDb)) {
        file_put_contents($fileDb, $data);
    } else {
        file_put_contents($fileDb, $data, FILE_APPEND);
    }
    $result = ['status' => true];
    echo json_encode($result);

}