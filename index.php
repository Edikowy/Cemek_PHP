<?php

use src\Engine;
/**
 * @author           Edikowy
 * @copyright        (c) 2015-2021, Edikowy. All Rights Reserved.
 * @license          MIT License
 * @link             https://github.com/Edikowy/Cemek_PHP
 */

define('DIR_ROOT', __DIR__ . '/'); // --------
define('DIR_STYLE', 'css/');
define('DIR_SCRIPT', 'js/');
define('DIR_IMG', 'img/');
define('DIR_APP', 'src/');
define('DIR_CONTROL', DIR_APP . 'control/');
define('DIR_MODEL', DIR_APP . 'model/');
define('DIR_VIEW', DIR_APP . 'view/');
define('DIR_TPL', DIR_APP . 'tpl/');
define('DIR_TPL_ELEM', DIR_TPL . 'elem/');
define('DIR_TPL_FORM', DIR_TPL . 'form/');
define('DIR_TPL_KLAS', DIR_TPL . 'klas/'); // --------

define('DB_DRIVER', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'cemek');
define('DB_USER_NAME', 'root');
define('DB_USER_PASS', '');

define('SES_EXP', 25920000);
define('HOST_ROOT', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]); // host do roboty
define('PROT', (! empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? 'https://' : 'http://');
define('HOST_URL', PROT . $_SERVER['HTTP_HOST']); // host do roboty
define('HOST_NAME', $_SERVER["SERVER_NAME"]);
define('HOST_HTTP', $_SERVER['HTTP_HOST']);
if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    exit('Twoja wersja PHP to ' . PHP_VERSION . '. Potrzebna co najmniej PHP 5.5 .');
} // --------
require './src/Engine.php';
require './src/control/Control.php';
require './src/model/Model.php';
require './src/view/View.php';

$engine = new Engine(HOST_URL . $_SERVER["REQUEST_URI"]);
$engine->start();

