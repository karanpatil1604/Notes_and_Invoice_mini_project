<?php
use \Core\App;

$db = App::resolve("Core\Database");

// GET ID TO MAKE A QUERY
$user_id = $_POST['user_id'];

// MAKE A QUERY
$user = $db->query("select * from user where user_id = :user_id", ["user_id" => $user_id])->findOrFail();

// DELETE THE ENTRY FROM THE TABLE

$db->query('DELETE FROM user WHERE user_id = :user_id', [
    'user_id' => $_POST['user_id']
]);
redirect('/invoice');