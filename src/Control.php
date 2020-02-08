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
//             switch ($_GET) {
//                 case 'link':
//                     echo 'link</br>';
//                     break;
                
//                 case 'dupa':
//                     echo 'dupa</br>';
//                     break;
                    
//                 default:
//                     echo 'defaulty</br>';
//                     break;
//             }
        }
        if ($_POST) {
            print_r($_POST);
            echo '</br>';
//             switch ($_POST) {
//                 case value:
//                 ;
//                 break;
                
//                 default:
//                     ;
//                 break;
//             }
        }
    }
}

