<?php

use \Core\App;

$db = App::resolve("Core\Database");

$user = $db->query("SELECT * FROM user WHERE user_id=:user_id", [
    "user_id" => (int) $_GET['id'],
])->findOrFail();

$items = $db->query("SELECT * FROM item WHERE user_id=:user_id", [
    "user_id" => (int) $_GET['id'],
])->find();

$items_table = json_encode($items);

// dd($items_table);
view("invoice/edit.view.php", [
    'items' => $items,
    'user' => $user
]);