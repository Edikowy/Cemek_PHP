<?php
namespace src;
// TODO dodać do templatek formulaże
class View
{

    public function show($templates)
    {
        return include 'src/template/' . $templates . '.php';
    }

    public function showKluczowe()
    {}

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

    public function showLinki()
    {
        foreach (Config::$view['linki'] as $n => list ($nazwa, $id, $url)) {
            ?><li><a href="<?= $url ?>" id="<?= $id ?>"><?= $nazwa ?></a></li><?php
        }
    }


}

