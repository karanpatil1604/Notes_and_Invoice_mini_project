<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 9;
$id = $_POST['id'];
// Find the corresponding note
$note = $db->query("select * from notes where note_id = :id", ["id" => $id])->findOrFail();

$errors = [];

// authorize that the current user can edit the note
authorize($note['user_id'] === $currentUserId);

// Validate the form

if (!Validator::string($_POST["body"], 1, 1000)) {
    $errors["body"] = "A Body should have not more than 1000 words.";
}


// if no validation errors, update the notes database table.

if (count($errors)) {
    require view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query("UPDATE notes SET body = :body WHERE note_id=:id", [
    'id' => $_POST['id'],
    'body' => $_POST['body'],
]);

header('location: /notes');
die();