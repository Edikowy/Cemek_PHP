<?php
/**
 *
 * @author    Edikowy
 * @copyright 2021 Edikowy. All Rights Reserved.
 * @license   MIT License
 * @link      https://github.com/Edikowy/Cemek_PHP
 */

use src\Engine;

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
define('DB_DRIVER', 'mysql'); // --------
define('DB_HOST', 'localhost');
define('DB_NAME', 'cemek');
define('DB_USER_NAME', 'root');
define('DB_USER_PASS', ''); // --------
define('SES_EXP', 25920000);
// -------------------------
(!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? $uri = 'https://' : $uri = 'http://';
$uri .= $_SERVER['HTTP_HOST'];
define('HOST_HTTP', ucfirst($_SERVER['HTTP_HOST']));
define('HOST_URI', $uri);
define('HOST_URL', $uri . str_replace('\\', '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))) . '/');
define('HOST_NAME', $_SERVER["SERVER_NAME"]);
if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    exit('Twoja wersja PHP to ' . PHP_VERSION . '. Potrzebna co najmniej PHP 5.5 .');
} // --------
require './src/Engine.php';
require './src/control/Control.php';
require './src/model/Model.php';
require './src/view/View.php';

$engine = new Engine(HOST_URL . $_SERVER["REQUEST_URI"]);
$engine->start();

