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
    $result = ['status' => true];
    echo json_encode($result);

}