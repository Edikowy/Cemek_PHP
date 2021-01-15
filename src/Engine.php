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
        if ($url[1] = ! null) {
            $this->get = $url[1];
        }
    }

    public function start()
    {
        $this->sesja();
        $control = new Control();

        $view = new View();
        $view->show('dach');

        $control->uchoGet();
        $control->uchoPost();

        $view->show('stopka');
    }
    
    //TODO dodać sesje , systemowa i usera wykrywanie czy istnieje
    // twożenie zapis koniec i nowy numer
    public function sesja()
    {
        
        
        
        if (! empty($_SESSION)) {
            session_destroy();
        }
        
    }
    
    
    
    
    //TODO dodać kuki zapis odczyt iteracja i RODO

    
}

