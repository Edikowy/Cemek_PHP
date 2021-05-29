<?php
namespace src\view;

use DirectoryIterator;

/**
 *
 * @author Edikowy
 *        
 */
class View
{

    public function render($template, $template_path = 'src/tpl/', $template_ext = '.php')
    {
        $path = $template_path . $template . $template_ext;
        if (is_file($path)) {
            return require $path;
        }
    }

    public function dodajPliki($dir, $ext, $template, $template_path = 'src/tpl/', $template_ext = '.php')
    {
        foreach (new DirectoryIterator($dir) as $file) {
            if ((! $file->isDot()) & ($file->isFile()) & ($file->getExtension() == $ext)) {
                $path = $template_path . $template . $template_ext;
                require $path;
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

