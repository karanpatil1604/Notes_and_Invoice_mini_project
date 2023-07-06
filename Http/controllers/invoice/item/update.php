<?php

use Core\App;

$item_id = $_POST['item_id'];

$new_values = [
    'item_id' => $item_id,
    'new_name' => $_POST['item_name'],
    'new_quantity' => $_POST['quantity'],
    'new_price' => $_POST['price'],
    'new_subtotal' => $_POST['subtotal']
];

$db = App::resolve("Core\Database");

$db->query("UPDATE item SET item_name= :new_name,  price=:new_price,  quantity=:new_quantity, subtotal=:new_subtotal WHERE item_id=:item_id", $new_values);


$grandTotal = $db->query("SELECT user_id, sum(subtotal) as Total FROM `item` GROUP BY user_id;")->get();
// dd($grandTotal);
$db->query("UPDATE user SET grand_total=:Total WHERE user_id=:user_id", $grandTotal);

// $path = "/invoice/update?id="
redirect("/invoice/update?id=" . $grandTotal['user_id']);