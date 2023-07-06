<?php

use \Core\Database;

$heading = "Invoice Generator";


$config = require base_path('config.php');
$db = new Database($config['database']);

// fetch all the users in an array
$all_users = $db->query("SELECT * FROM user ORDER BY user_id DESC")->find();

// dd($all_users);

// for all the users fetch the corresponding items and store in invoices array
$invoices = [];
foreach ($all_users as $user) {
    $invoice_items = $db->query("SELECT * FROM item WHERE user_id = :user_id", ["user_id" => $user["user_id"]])->find();

    $invoices[] = [
        "user_id" => $user['user_id'],
        "user_name" => $user["name"],
        "email" => $user["email"],
        "items" => $invoice_items,
        "grand_total" => $user["grand_total"],
    ];
}








// pass down the values  to index.view.php=====9
// $i   tems = [];
view("invoice/index.view.php", ["heading" => $heading, "invoices" => $invoices]);