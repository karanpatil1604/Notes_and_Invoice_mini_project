<?php

use Http\Forms\LoginForm;
use Core\Authenticator;


$form = LoginForm::validate(
    $attributes =
    [
        $email = $_POST['email'],
        $password = $_POST['password'],
    ]
);


if ((new Authenticator())->attempt($email = $_POST['email'], $password = $_POST['password'])) {
    redirect('/');
}

$form->error('nomatch', "No matching account found for this email and password");
redirect('/login');