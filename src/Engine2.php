<?php
namespace src;

class Engine2
{

    public $host_name;

    public $file;

    public $get;

    public function __construct($host_name, $url)
    {
        $this->host_name = $host_name;
        $url = explode('?', $url);
        $this->file = $url[0];
        if ($url[1] = ! null) {
            $this->get = $url[1];
        }
    }

    public function start()
    {
        echo 'start';
    }

    public function sesja()
    {
        echo 'sesja';
    }

    public function doHedera($url)
    {
        header("location: " . $url);
    }
}

