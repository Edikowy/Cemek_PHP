<?php
namespace src;

// TODO dodać do templatek formulaże
// TODO poprawic !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
class View
{

    public function show($dir, $templates, $ext = '.php')
    {
        include $dir . $templates . $ext;
    }

    public function showLinki()
    {
        foreach (Config::$linki as $nazwa => $url) {
            ?><li><a href="<?= $url ?>" id="<?= $nazwa ?>"><?= $nazwa ?></a></li><?php
        }
    }

    public function addFile($dir, $ext, $start, $end)
    {
        $pliki = scandir($dir);
        foreach ($pliki as $plik) {
            if ($plik != '.' && $plik != '..') {
                $f = explode('.', $plik);
                if ($f[1] = $ext) {
                    echo $start . $dir . $plik . $end;
                }
            }
        }
    }
}

