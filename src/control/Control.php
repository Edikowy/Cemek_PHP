<?php
namespace src\control;

class Control
{
    
    public function doHedera($url)
    {
        header("location: " . $url);
    }
}