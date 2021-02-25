<?php
namespace src;

use DirectoryIterator;

class View
{
    
    public function dodajInclude($template, $template_path = 'src/template/', $template_ext = '.php')
    {
        include $template_path . $template . $template_ext;
    }
    
    public function dodajTablice($tablica, $template, $template_path = 'src/template/', $template_ext = '.php')
    {
        foreach ($tablica as $klucz => $wartosc) {
            include $template_path . $template . $template_ext;
        }
    }
    
    public function dodajPliki($dir, $ext, $template, $template_path = 'src/template/', $template_ext = '.php')
    {
        foreach (new DirectoryIterator($dir) as $file) {
            if (! $file->isDot()) {
                if ($file->isFile()) {
                    if ($file->getExtension() == $ext) {
                        include $template_path . $template . $template_ext;
                    }
                }
            }
        }
    }
}

