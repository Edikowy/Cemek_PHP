<?php
namespace src\control;

/**
 *
 * @author Edikowy
 *        
 */
abstract class Control
{

    public function doHedera($url)
    {
        header("location: " . $url);
    }
    
    public function ses($param) {
        ;
    }
}