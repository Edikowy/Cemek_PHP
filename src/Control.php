<?php

namespace src;

/**
 *
 * @author Edikowy
 *        
 */
class Control {
    public function __construct() {}
    public function sluchacz() {
        if ($_GET) {
            print_r($_GET);
            echo '</br>';
        }
        if ($_POST) {
            print_r($_POST);
            echo '</br>';
        }
    }
}

