<?php


function dd($value)
{
    echo "
<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    if (parse_url($_SERVER["REQUEST_URI"])["path"] == $value) {
        return true;
    }
    return false;
}


function abort($code = 404)
{
    http_response_code($code);
    view("{$code}.php");
    die();
}


function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path("views/" . $path);
}

function login($user)
{
    $_SESSION['user'] = [
        'email' => $user['email'],
    ];
    session_regenerate_id(true);
}

function logout()
{
    $_SESSION = [];

    session_destroy();

    $param = session_get_cookie_params();

    setcookie("PHPSESSID", "", time() - 3600, $param['path'], $param['domain'], $param["secure"], $param['httponly']);

}

function redirect($path)
{
    header("location: " . $path);
    exit();
}


function old($key, $default = '')
{
    return Core\Session::get('old')[$key] ?? $default;
}