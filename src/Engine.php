<?php
namespace src;

/**
 *
 * @author    Edikowy
 * @copyright 2021 Edikowy. All Rights Reserved.
 * @license   MIT License
 * @link      https://github.com/Edikowy/Cemek_PHP
 */
class Engine
{

    protected $uri;
    public function __construct(string $uri)
    {
        $this->uri = $uri;
    }
    
    public function sesStart()
    {
        if (isset($_COOKIE[session_name()])) {
            $ck = session_get_cookie_params();
            session_set_cookie_params(SES_EXP);
            setcookie(session_name(), session_id($_COOKIE[session_name()]), false, $ck['path'], $ck['domain'], $ck['secure']);
            @session_start();
            $_SESSION['ses']['id'] = session_id();
        } else {
            session_id(md5(uniqid(rand(), true)));
            $ck = session_get_cookie_params();
            session_set_cookie_params(SES_EXP);
            setcookie(session_name(), session_id(), false, $ck['path'], $ck['domain'], $ck['secure']);
            @session_start();
            $_SESSION['ses']['id'] = session_id();
        }
    }
    
    public function sesStop()
    {
        session_write_close();
        unset($_SESSION);
    }
    
    public function start()
    {
        $this->sesStart();
        $this->req();
        $this->res();
        $this->sesStop();
    }
    
    public function req()
    {
        if ($_POST) {
            $posta = explode('_', array_key_first($_POST));
            $_SESSION['req']['class'] = $posta[0];
            $_SESSION['req']['function'] = $posta[1];
        } elseif ($_GET) {
            $geta = $_GET;
            for ($i = 0; $i < count($geta); $i ++) {
                $key = key($geta);
                $val = $geta[$key];
                if ($key == 'class') { $_SESSION['req']['class'] = $val; }
                if ($key == 'function') { $_SESSION['req']['function'] = $val; }
                next($geta);
            }
        } else {
            $_SESSION['req']['class'] = 'Wpisy';
            $_SESSION['req']['function'] = 'index';
        }
    }
    
    public function res()
    {
        if (isset($_SESSION['req']['class']) && isset($_SESSION['req']['function'])) {
            $class = $_SESSION['req']['class'];
            $function = $_SESSION['req']['function'];
        } else {
            $class = $_SESSION['req']['class'] = 'Ero';
            $function = $_SESSION['req']['function'] = 'index';
        }
        $class = ucfirst($class);
        $this->loadFile(DIR_CONTROL, $class, '.php');
        $control = $this->loadClass(DIR_CONTROL, $class);
        $control->$function();
    }
    
    public function loadFile(string $path, string $file, string $exp = '.php')
    {
        $filepath = $path . $file . $exp;
        if (is_file($filepath)) {
            return require $filepath;
        } else {
            return NULL;
        }
    }
    
    public function loadClass(string $path, string $class)
    {
        $classpath = str_replace("/", "\\", $path) . $class;
        return new $classpath();
    }
    
    public function doHedera(string $url)
    {
        header("location: " . $url);
    }
}

