<?php

use \Core\App;

$currentUserId = 9;

$db = App::resolve("Core\Database");


// GET ID TO MAKE A QUERY

$id = $_POST['id'];
$heading = "Note Description";

// MAKE A QUERY
$note = $db->query("select * from notes where note_id = :id", ["id" => $id])->findOrFail();

// IF AUTHORIZED TO QUERY, DO SO
authorize($note['user_id'] === $currentUserId);

// DELETE THE ENTRY FROM THE TABLE

$db->query('DELETE FROM notes WHERE note_id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
exit();

// RETURN VIEW
// view("notes/show.view.php", ["heading" => $heading, "note" => $note]);