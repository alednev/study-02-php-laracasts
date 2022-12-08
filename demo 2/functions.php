<?php

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