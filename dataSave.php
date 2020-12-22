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
    $fileDb = 'db.json';
    if (!file_exists($fileDb)) {
        $isDone = file_put_contents($fileDb, $data);

        if ($isDone) {
            $result = ['status' => true];
            echo json_encode($result);
            return;
        }
    } else {
        $db = json_decode(file_get_contents($fileDb), true);
        $db[] = $order;
        $fullData = json_encode($db);
        $isDone = file_put_contents($fileDb, $fullData);

        if ($isDone) {
            $result = ['status' => true];
            echo json_encode($result);
            return;
        }
    }

    $result = ['status' => false];
    echo json_encode($result);
    return;
}