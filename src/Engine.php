<?php
namespace src;

class Engine
{

    public $host_name;

    public $file;

    public $get;

    function __construct($host_name, $url)
    {
        $this->host_name = $host_name;
        $url = explode('?', $url);
        $this->file = $url[0];
        //TODO czy tutaj ma rorpoznawać geta i jak
        if ($url[1]= !null) {
            $this->get = $url[1];
        }
    }

    public function start()
    {
        $control = new Control();

        $view = new View();
        $view->show('dach');

        $control->uchoGet();
        $control->uchoPost();

        $view->show('stopka');
    }
    
    //TODO dodać sesje , systemowa i usera wykrywanie czy istnieje
    // twożenie zapis koniec i nowy numer
    
    //TODO dodać kuki zapis odczyt iteracja i RODO

    public function inklud($path, $file, $exp)
    {
        return include $path . $file . $exp;
    }
}

