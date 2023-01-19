<?php

use Core\Response;

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

function isUrl($value)
{
    return parse_url($_SERVER['REQUEST_URI'])['path'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);
    require basePath("views/{$code}.php");
    die();
}
function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function basePath($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    
    require basePath('views/' . $path);
}