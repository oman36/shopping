<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/functions.php';
$db = init_db();

$shops = $db->selectAll('SELECT * FROM shops');
$items = $db->selectAll('SELECT * FROM items');
$types = $db->selectAll('SELECT * FROM types');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script>
        var shops = <?= json_encode($shops, JSON_PRETTY_PRINT) ?>;
        var items = <?= json_encode($items, JSON_PRETTY_PRINT) ?>;
        var types = <?= json_encode($types, JSON_PRETTY_PRINT) ?>;
    </script>
</head>
<body>
    <table class="table">
        <tr>
            <th>Название</th>
            <th>Магазин</th>
            <th>Цена</th>
            <th>Кешбек</th>
            <th>Комментарий</th>
        </tr>
        <?php foreach ($types as $type) { ?>
            <tr class="type" data-id="<?= $type['id'] ?>">
                <td><?= $type['name']?></a></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        <?php } ?>
    </table>

    <h4>Итого:</h4>

    <label>Денег:</label>
        <span id="sum"></span>
    <br>
    <label>Кешбек:</label>
        <ul id="cashback">

        </ul>

    <br>
    <a href="/add.get.php" class="btn btn-success">Добавить Товар</a>
    <a class="btn btn-success">Добавить Тип</a>
    <a class="btn btn-success">Добавить Магазин</a>
    <br>
    <br>

    <table class="table" id="items">
        <tr>
            <th>Название</th>
            <th>Тип</th>
            <th>Магазин</th>
            <th>Цена</th>
            <th>Кешбек</th>
            <th>Комментарий</th>
            <th>В корзину</th>
            <th>Редактировать</th>
        </tr>
        <?php foreach ($items as $item) { ?>
            <tr class="item" data-id="<?= $item['id'] ?>">
                <td><a href="<?= $item['url']?>"><?= $item['name']?></a></td>
                <td><?= findId($item['type_id'], $types)['name'] ?></td>
                <td><?= findId($item['shop_id'], $shops)['name'] ?></td>
                <td><?= $item['price'] ?></td>
                <td><?= $item['cashback'] ?></td>
                <td><?= $item['comment'] ?></td>
                <td><button class="action_btn">Добавить</button></td>
                <td><a href="/add.get.php?id=<?= $item['id'] ?>" class="btn btn-primary">Редактировать</a>  </td>
            </tr>
        <?php } ?>
    </table>
<script src="/jquery.js"></script>
<script src="/script.js"></script>
</body>
</html>
