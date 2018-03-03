<?php
require_once __DIR__ .'/db.php';
require_once __DIR__ .'/functions.php';

$data = getFields([
    'id',
    'name',
    'url',
    'type_id',
    'shop_id',
    'price',
    'cashback',
    'comment'
], $_POST);

$db = init_db();
$db->insertOrUpdate('items', $data);
?>
<a href="/index.php">На главную</a>
<br>
<a href="/add.get.php">Добавить ещё</a>
<br>
