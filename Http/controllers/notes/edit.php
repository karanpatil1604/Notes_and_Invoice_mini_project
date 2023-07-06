<?php
// dd("hello");
use \Core\Database;
use \Core\App;

$id = $_GET['id'];
$currentUserId = 9;
$heading = "Edit Note";

$db = App::resolve(Database::class);
$errors = [];
// MAKE A QUERY
$note = $db->query("select * from notes where note_id = :id", ["id" => $id])->findOrFail();
authorize($note['user_id'] === $currentUserId);

view("notes/edit.view.php", ["heading" => $heading, "errors" => $errors, "note" => $note]);