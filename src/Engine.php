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
        $this->get = $url[1];
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

    public function inklud($file, $path)
    {
        return include $path . $file . '.php';
    }
}

