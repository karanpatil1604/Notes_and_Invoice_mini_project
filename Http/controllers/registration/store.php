<?php

use Core\Validator;
use Core\App;


$email = $_POST['email'];
$password = $_POST['password'];
// dd($password);
$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = "Please provide a valid email address";
    // dd("email validation failed");
}


if (!Validator::string($password, 7, 255)) {
    $errors['password'] = "Please provide a password of atleast 7 characters";
    // dd("pass validation failed");

}


if (count($errors)) {
    // dd($errors);

    return view("registration/create.view.php", [
        'errors' => $errors,
    ]);
}

$db = App::resolve('Core\Database');

$user = $db->query("SELECT * FROM user WHERE email=:email", ["email" => $email])->find();
// dd($user);
// dd("reaching check");
if ($user) {
    // dd("copied user");
    header('location: /');

} else {
    $db->query("INSERT INTO user(email, password) VALUES(:email, :password)", [
        "email" => $email,
        "password" => password_hash($password, PASSWORD_BCRYPT),
    ]);
    // dd("Inserted successfully");
    login([
        'email' => $email,
    ]);
    header("location: /");
    exit();

}