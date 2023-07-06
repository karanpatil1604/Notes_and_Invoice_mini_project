<?php

use Core\App;

// dd($_POST);
$db = App::resolve('Core\Database');

$tableData = json_decode($_POST["itemTable"], associative: true);
// dd($tableData);

$user_id = (int) $_POST['user_id'];

$user = $db->query("SELECT * FROM user WHERE user_id=:user_id", [
    "user_id" => $user_id,
])->findOrFail();

// take new username and email from the post request

$new_name = $_POST['name'];
$new_email = $_POST['email'];

$db->query("DELETE FROM item WHERE user_id=:user_id", ['user_id' => $user_id]);


$td = [];
$grandTotal = 0;
foreach ($tableData as $row) {
    $new_item = [
        'item_name' => $row[0],
        'quantity' => $row[1],
        'price' => $row[2],
        'subtotal' => $row[3],
        'user_id' => $user_id
    ];
    $td[] = $new_item;
    $grandTotal += (int) $row[3];
}

foreach ($td as $d) {
    $db->query("INSERT INTO item(item_name, price, quantity, subtotal, user_id) VALUES (:item_name, :price, :quantity, :subtotal, :user_id)", $d);
}

$db->query("UPDATE user SET name=:name, email=:email, grand_total=:grand_total WHERE user_id=:user_id", [
    'grand_total' => $grandTotal,
    'name' => $new_name,
    'email' => $new_email,
    'user_id' => $user_id
]);

redirect('/invoice');