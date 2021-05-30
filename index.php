<?php
use src\Engine;
/**
 *
 * @author Edikowy
 *        
 */
require 'src/config.php';
// require 'src/auto.php';

spl_autoload_extensions('.php');
spl_autoload_register('autoload');

function autoload($class)
{
    set_include_path(__DIR__ . '/src/');
    spl_autoload(strtolower($class));
}

$index = new Engine();
$index->start();