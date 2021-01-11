<?php
use src\Engine;

//TODO autoload

include 'src/inkludy.php';

$index = new Engine($_SERVER["SERVER_NAME"], $_SERVER["REQUEST_URI"]);
$index->start();
