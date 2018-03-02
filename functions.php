<?php
header('Content-Type: text/html; charset=utf-8');

function init_db(): \DB
{
    $settings = require __DIR__ . '/.env.php';

    return new \DB(
        "mysql:dbname={$settings['db']['basename']}" .
        ";host={$settings['db']['hostname']}" .
        ';charset=UTF8',
        $settings['db']['username'],
        $settings['db']['password']
    );
}

function getFields(array $fields, array $from)
{
    $data = [];
    foreach ($fields as $field) {
        $data[$field] = $from[$field];
    }
    return $data;
}

function findId($id, array $from)
{
    foreach ($from as $field) {
        if ($id == $field['id'])  {
            return $field;
        }
    }
    return [];
}