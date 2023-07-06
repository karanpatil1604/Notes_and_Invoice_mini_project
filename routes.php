<?php
// return [
//     '/' => "controllers/home.php",
//     '/about' => "controllers/about.php",
//     '/contact' => "controllers/contact.php",
//     '/notes' => "controllers/notes/index.php",
//     '/note' => "controllers/notes/show.php",
//     '/notes/create' => "controllers/notes/create.php",
//     '/notes/delete' => "controllers/notes/delete.php",
// ];

$router->get('/', 'home.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');


$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php');
$router->delete('/note', 'notes/destroy.php');

$router->get('/notes/create', 'notes/create.php');
$router->post('/notes', 'notes/store.php');

$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note', 'notes/update.php');

// INVOICE ROUTES
$router->get('/invoice', 'invoice/index.php');
$router->post('/invoice', 'invoice/generate.php');
$router->delete('/invoice', "invoice/destroy.php");
$router->patch('/invoice', 'invoice/update.php');

$router->get('/invoice/update', 'invoice/edit.php');

// Item routes edit and update
$router->get('/edit/item', 'invoice/item/edit.php');
$router->patch('/edit/item', 'invoice/item/update.php');




// Registration Routes
$router->get('/register', "registration/create.php")->only("guest");
$router->post('/register', "registration/store.php");

$router->get('/login', "sessions/create.php")->only("guest");
$router->post('/sessions', "sessions/store.php")->only("guest");
$router->delete('/sessions', "sessions/destroy.php")->only("auth");