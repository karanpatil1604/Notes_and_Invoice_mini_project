<?php
use \Core\Database;

$heading = "Invoice Generator";


$config = require base_path('config.php');
$db = new Database($config['database']);

// $tableData = $_POST['itemTable'];
// dd($tableData);
$tableData = json_decode($_POST["itemTable"], associative: true);
// dd($tableData);
$td = [];
$grandTotal = 0;
// Access the table data
$username = $_POST['name'];
$email = $_POST['email'];






// calculate grand total and prpare param to insert each item========2
foreach ($tableData as $row) {
    $item_name = $row[0];
    $price = $row[1];
    $quantity = $row[2];

    $subtotal = $row[3];
    $grandTotal += (int) ($subtotal);

    $td[] = [
        "item_name" => $item_name,
        "price" => (int) ($price),
        "quantity" => (int) ($quantity),
        "subtotal" => (int) ($subtotal),


    ];
}


// First insert user and get the id 
$db->query("INSERT INTO user(name, email, grand_total) VALUES (:name, :email, :grand_total)", [
    "name" => $username,
    "email" => $email,
    "grand_total" => $grandTotal,
]);

$user_id = $db->connection->lastInsertID();


// loop through each item and insert into the item table 
$each_item = [];
foreach ($td as $d) {
    // again update each item to have the user id 
    $d['user_id'] = (int) ($user_id);
    // $each_item[] = $d;
    $db->query("INSERT INTO item(item_name, price, quantity, subtotal, user_id) VALUES (:item_name, :price, :quantity, :subtotal, :user_id)", $d);
}

redirect('/invoice');
// // dd($td);

// // dd("Inserted successfully");


// // // redirect with a get request to the invoice controller index.php 
// require base_path("Http/controllers/invoice/index.php");