<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/functions.php';
$db = init_db();

$types = $db->selectAll('SELECT * FROM `types`');
$shops = $db->selectAll('SELECT * FROM `shops`');
if ($id = $_GET['id'] ?? null) {
    $item = $db->selectOne('SELECT * FROM `items` WHERE id = ' . $id);
}


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<form action="/add.post.php" method="post">

    <input type="hidden" name="id" id="id" value="<?= $id ?>" <?= $id ?'': 'disabled' ?>>

    <label for="name">Название</label>
    <input type="text" name="name" id="name" value="<?= $item['name'] ?? '' ?>">

    <br>

    <label for="url">Ссылка</label>
    <input type="text" name="url" id="url" value="<?= $item['url'] ?? '' ?>">

    <br>

    <label for="type_id">тип</label>
    <select name="type_id" id="type_id">
        <?php foreach ($types as $type) { ?>
            <option value="<?= $type['id'] ?>"
                <?php if (($item['type_id'] ?? 0) === $type['id']) {?> selected <?php }?>
            >
                <?= $type['name'] ?>
            </option>
        <?php } //foreach ($types as $type) ?>
    </select>

    <br>

    <label for="shop_id">Магазин</label>
    <select name="shop_id" id="shop_id">
        <?php foreach ($shops as $shop) { ?>
            <option value="<?= $shop['id'] ?>"
                <?php if (($item['shop_id'] ?? 0) === $shop['id']) {?> selected <?php }?>>
                <?= $shop['name'] ?>
            </option>
        <?php } //foreach ($shops as $shop) ?>
    </select>

    <br>

    <label for="price">Цена</label>
    <input type="text" name="price" id="price"  value="<?= $item['price'] ?? 0 ?>">

    <br>

    <label for="cashback">Кэшбек</label>
    <input type="text" name="cashback" id="cashback" value="<?= $item['cashback'] ?? 0 ?>">

    <br>

    <input type="submit" name="Сохранить">
    <input type="reset" name="Сбросить">
    <a href="/index.php" >Назад</a>

</form>
</body>
</html>