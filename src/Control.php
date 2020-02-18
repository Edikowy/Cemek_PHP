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
            $util = new Util();
            $view = new View();
            $linki = (int)$_GET['linki'];
            switch ($linki) {
                case 1:
                    echo 'link 1</br>';
                    $util ->serverIdent2();
                break;
                
                case 2:
                    echo 'link 2</br>';
                    echo $view -> showFormRegist();
                    echo $view -> showFormAdminNewEmail();
                    echo $view -> showFormAdminNewPass();
                    echo $view -> showFormAdminDel();
                break;
                
                case 3:
                    echo 'link 3</br>';
                    echo $view -> showFormAdminNewEmail();
                    echo $view -> showFormAdminNewPass();
                    echo $view -> showFormAdminDel();
                break;
                    
                case 4:
                    echo 'link 4</br>';
                    echo $view -> showFormRegist();
                    
                break;
                    
                case 5:
                    echo 'link 5</br>';
                break;
                    
                case 6:
                    echo 'link 6</br>';
                break;
                
                default:
                    echo 'default</br>';
                break;
            }
        }
        if ($_POST) {}
    }
}

