<?php
use \Core\App;

$db = App::resolve("Core\Database");

$heading = "All Notes";
$notes = $db->query("select * from notes")->find();


// $notes = [
//     ['id' => 1, "body" => "First Note Body"],
//     ['id' => 2, "body" => "Second Note Body"],
//     ['id' => 3, "body" => "Third Note Body"],

// ];


view("notes/index.view.php", ["heading" => 'All Notes', "notes" => $notes]);