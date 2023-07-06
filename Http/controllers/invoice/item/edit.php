<?php
use \Core\App;

$db = App::resolve("Core\Database");

$item = $db->query("SELECT * FROM item WHERE item_id=:item_id", [
    "item_id" => (int) $_GET['id'],
])->findOrFail();

view("invoice/itemedit.view.php", [
    'item' => $item,
]);