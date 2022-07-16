<?php
namespace src\control;

/**
 *
 * @author    Edikowy
 * @copyright 2021 Edikowy. All Rights Reserved.
 * @license   MIT License
 * @link      https://github.com/Edikowy/Cemek_PHP
 */
class Control
{
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

