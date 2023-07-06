<?php
use \Core\App;

$currentUserId = 9;

$config = require base_path('config.php');
$db = App::resolve('Core\Database');


// GET ID TO MAKE A QUERY

$id = $_GET['id'];
$heading = "Note Description";

// MAKE A QUERY
$note = $db->query("select * from notes where note_id = :id", ["id" => $id])->findOrFail();

// IF AUTHORIZED TO QUERY, DO SO
authorize($note['user_id'] === $currentUserId);

// RETURN VIEW
view("notes/show.view.php", ["heading" => $heading, "note" => $note]);