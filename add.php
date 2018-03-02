<?php
if (!empty($_POST)) {
    require __DIR__ . '/add.post.php';
} else {
    require __DIR__ . '/add.get.php';
}