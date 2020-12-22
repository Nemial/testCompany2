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
    $data = json_encode([$order]);
    $fileDb = __DIR__ . DIRECTORY_SEPARATOR . 'db.json';
    if (!file_exists($fileDb)) {
        file_put_contents($fileDb, $data);
    } else {
        $db = json_decode(file_get_contents($fileDb), true);
        $db[] = $order;
        $fullData = json_encode($db);
        file_put_contents($fileDb, $fullData);
    }
    $result = ['status' => true];
    echo json_encode($result);
}