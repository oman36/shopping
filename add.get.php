<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/functions.php';
$db = init_db();

$types = $db->selectAll('SELECT * FROM `types`');
$shops = $db->selectAll('SELECT * FROM `shops`');


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="/add.post.php" method="post">

    <label for="name">Название</label>
    <input type="text" name="name" id="name">

    <br>

    <label for="url">Ссылка</label>
    <input type="text" name="url" id="url">

    <br>

    <label for="type_id">тип</label>
    <select name="type_id" id="type_id">
        <?php foreach ($types as $type) { ?>
            <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
        <?php } //foreach ($types as $type) ?>
    </select>

    <br>

    <label for="shop_id">Магазин</label>
    <select name="shop_id" id="shop_id">
        <?php foreach ($shops as $shop) { ?>
            <option value="<?= $shop['id'] ?>"><?= $shop['name'] ?></option>
        <?php } //foreach ($shops as $shop) ?>
    </select>

    <br>

    <label for="price">Цена</label>
    <input type="text" name="price" id="price">

    <br>

    <label for="cashback">Кэшбек</label>
    <input type="text" name="cashback" id="cashback">

    <br>

    <input type="submit" name="Сохранить">
    <input type="reset" name="Сбросить">
    <a href="/index.php" >Назад</a>

</form>
</body>
</html>