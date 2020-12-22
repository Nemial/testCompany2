<?php

$fileDb = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'db.json';
$orders = json_decode(file_get_contents($fileDb), true);
?>

<table>
    <thead>
    <th>Имя</th>
    <th>Телефон</th>
    <th>Адрес</th>
    </thead>
    <tbody>
    <?php
    foreach ($orders as $order) : ?>
        <tr>
            <td><?= $order['name'] ?></td>
            <td><?= $order['tel'] ?></td>
            <td><?= $order['address'] ?></td>
        </tr>
    <?php
    endforeach; ?>
    </tbody>
</table>

