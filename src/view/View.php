<?php
namespace src\view;

use DirectoryIterator;

/**
 *
 * @author Edikowy
 * @copyright (c) 2015-2021, Edikowy. All Rights Reserved.
 * @license MIT License
 * @link https://github.com/Edikowy/Cemek_PHP
 */
class View
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
    
    public function loadDir(string $dir, string $dir_ext, string $path, string $file, string $ext = '.php')
    {
        foreach (new DirectoryIterator($dir) as $tpl) {
            if ((! $tpl->isDot()) & ($tpl->isFile()) & ($tpl->getExtension() == $dir_ext)) {
                $filepath = $path . $file . $ext;
                require $filepath;
            }
        }
    }
    
    public function get($name)
    {
        return $this->$name;
    }
    
    public function __get($name)
    {
        return $this->$name;
    }
    
    public function set($name, $value)
    {
        $this->$name = $value;
    }
    
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}

