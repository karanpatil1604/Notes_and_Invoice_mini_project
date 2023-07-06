<?php

use \Core\App;
use \Core\Validator;

$heading = "Create New Note";

$db = App::resolve('Core\Database');
$errors = [];

if (!Validator::string($_POST["body"], 1, 1000)) {
    $errors["body"] = "A Body should have not more than 1000 words.";
}

if (!empty($errors)) {
    return view("notes/create.view.php", ["heading" => $heading, "errors" => $errors]);
}
$db->query(
    "INSERT INTO notes(body, user_id) VALUES (:body, :user_id)",
    [
        "body" => $_POST["body"],
        "user_id" => 9
    ]
);

header("location: /notes");
exit();