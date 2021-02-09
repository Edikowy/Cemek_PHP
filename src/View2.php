<?php
namespace src;

class View2
{
    public function dodajInclude($template, $path = 'src/template/', $ext = '.php')
    {
        include $path . $template . $ext;
    }
    
    public function dodajTablice($tablica, $template)
    {
        foreach ($tablica as $klucz) {
            $this->dodajInclude($template);
        }
    }
    
    public function dodajPlik($path, $ext, $template)
    {
        $pliki = scandir($path);
        foreach ($pliki as $plik) {
            if (is_file($plik)) {
                $plik = explode('.', $plik);
                if ($plik[1] = $ext) {
                    $this->dodajInclude($template);
                    // echo $start . $path . $plik . $end;
                }
            }
        }
    }
}

