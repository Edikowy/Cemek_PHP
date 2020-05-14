<?php
namespace src;

class Enginea {
    // TODO - Insert your code here
    public function __construct() {}
    public function start() {}
    public static function doHedera($url) {
        header("location: " . $url);
    }
    public function get($name) {
        return $this->$name;
    }
    public function set($name, $value) {
        $this->$name=$value;
    }
}

