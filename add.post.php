<?php
require_once __DIR__ .'/db.php';
require_once __DIR__ .'/functions.php';

$data = getFields([
    'name',
    'url',
    'type_id',
    'shop_id',
    'price',
    'cashback',
    'comment'
], $_POST);

$db = init_db();

if ($db->insert('items', $data)) {
    echo "Ok";
} else {
    echo "Ошибка";
}
