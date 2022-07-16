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
            return true;
        } else {
            session_id(md5(uniqid(rand(), true)));
            $ck = session_get_cookie_params();
            session_set_cookie_params(SES_EXP);
            setcookie(session_name(), session_id(), false, $ck['path'], $ck['domain'], $ck['secure']);
            @session_start();
            $_SESSION['ses']['id'] = session_id();
            return false;
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
        $this->sesStop();
    }
    
    public function req()
    {
        $_SESSION['req']['uri'] = $this->uri;
        if ($_POST) {
            $_SESSION['req']['posta'] = $_POST;
            $posta = explode('_', array_key_first($_POST));
            $class = $posta[0];
            $function = $posta[1];
        } elseif ($_GET) {
            $_SESSION['req']['geta'] = $_GET;
            $geta = $_GET;
            for ($i = 0; $i < count($geta); $i ++) {
                $key = key($geta);
                $val = $geta[$key];
                if ($key == 'class') {
                    $class = $val;
                }
                if ($key == 'function') {
                    $function = $val;
                }
                next($geta);
            }
        } else {
            $_SESSION['req']['index'] = 1;
            $class = 'Wpisy';
            $function = 'index';
        }
        if (! isset($class) & ! isset($function)) {
            $_SESSION['req']['ero'] = 'index';
            $class = 'Ero';
            $function = 'index';
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
            include $filepath;
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

