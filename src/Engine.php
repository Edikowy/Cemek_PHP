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
        // TODO czy tutaj ma rorpoznawać geta i jak
        if ($url[1] = ! null) {
            $this->get = $url[1];
        }
    }

    public function start()
    {
        $this->sesja();
        $control = new Control();
        $view = new View();
        $view->show(Config::$dir['template'], 'dach');
        $control->uchoGet();
//         echo __DIR__;
        $control->uchoPost();
        $view->show(Config::$dir['template'], 'stopka');
    }

    // TODO dodać sesje , systemowa i usera wykrywanie czy istnieje
    // twożenie zapis koniec i nowy numer
    public function sesja()
    {
        if (! empty($_SESSION)) {
            session_destroy();
        }
        if (isset($_COOKIE[Config::$sesja['ses_name']])) {
            session_name(Config::$sesja['ses_name']);
            if (isset($_COOKIE[Config::$sesja['ses_id']])) {
                session_id($_COOKIE[Config::$sesja['ses_id']]);
            }
            session_start([
                'cookie_lifetime' => (Config::$kuki['kuki_exp'])
            ]);
        } else {
            session_start();
        }
    }
    // TODO dodać kuki zapis odczyt iteracja i RODO
}

