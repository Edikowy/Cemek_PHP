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
            print_r($_SERVER['QUERY_STRING']);
            echo '</br>';
            switch ($_SERVER['QUERY_STRING']) {
                case 'linki=1':
                    echo 'link 1</br>';
                    break;
                
                case 'linki=2':
                    $view = new View();
                    echo '</br>';
                    echo $view -> showFormRegist();
                    echo '</br>';
                    break;
                    
                case 'linki=3':
                    $view = new View();
                    echo '</br>';
                    echo $view -> showFormAdminNewEmail();
                    echo '</br>';
                    break;
                    
                case 'linki=4':
                    $view = new View();
                    echo '</br>';
                    echo $view -> showFormAdminNewPass();
                    echo '</br>';
                    break;
                    
                case 'linki=5':
                    $view = new View();
                    echo '</br>';
                    echo $view -> showFormAdminDel();
                    echo '</br>';
                    break;
                    
                case 'linki=6':
                    echo 'link 6</br>';
                    break;
                    
                case 'dupa':
                    echo 'dupa</br>';
                    break;
                    
                default:
                    echo 'defaulty</br>';
                    break;
            }
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

