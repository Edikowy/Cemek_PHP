<?php
use src\Engine;

// TODO autoload
spl_autoload_extensions('.php');
spl_autoload_register('autoload');

function autoload($class)
{
    set_include_path(__DIR__ . '/src/');
    spl_autoload(strtolower($class));
}
// include 'src/inkludy.php';

$index = new Engine($_SERVER["SERVER_NAME"], $_SERVER["REQUEST_URI"]);
$index->start();
