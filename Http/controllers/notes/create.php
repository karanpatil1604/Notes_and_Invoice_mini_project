<?php

use \Core\Database;
use \Core\App;

$heading = "Create New Note";

$config = require base_path("config.php");
$db = new Database($config['database']);
$errors = [];




view("notes/create.view.php", ["heading" => $heading, "errors" => $errors]);