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
                    echo 'link 1</br>Alfa</br>';
                    $util ->serverIdent2();
                break;
                
                case 2:
                    echo 'link 2</br>Bravo</br>';
                break;
                
                case 3:
                    echo 'link 3</br>Certo</br>';
                    echo $view -> showFormAdminNewEmail();
                    echo $view -> showFormAdminNewPass();
                    echo $view -> showFormAdminDel();
                break;
                    
                case 4:
                    echo 'link 4</br>Delta</br>';
                break;
                    
                case 5:
                    echo 'link 5</br>Echo</br>';
                break;
                    
                case 6:
                    echo 'link 6</br>Register</br>';
                    echo $view -> showFormRegist();
                break;
                
                case 7:
                    echo 'link 7</br>Admin</br>';
                break;
                
                default:
                    echo 'default</br>';
                break;
            }
            unset($_GET);
        }
        if ($_POST) {
            $model = new Usera();
            if (isset($_POST['form_login'])) {
                $model -> login($_POST['form_login']['login'], $_POST['form_login']['pass']);
            }
            if (isset($_POST['form_regist'])) {
                $model -> register($_POST['form_regist']['new_login']
                    , $_POST['form_regist']['new_email']
                    , $_POST['form_regist']['new_pass']
                    , $_POST['form_regist']['new_pass2']);
            }
            if (isset($_POST['form_admin_newemail'])) {
                $model -> newEmail($_POST['form_admin_newemail']['new_email']
                    , $_POST['form_admin_newemail']['pass']);
            }
            if (isset($_POST['form_admin_newpass'])) {
                $model -> newPass($_POST['form_admin_newpass']['pass']
                    , $_POST['form_admin_newpass']['new_pass']
                    , $_POST['form_admin_newpass']['new_pass2']);
            }
            if (isset($_POST['form_admin_del'])) {
                $model -> delUser();
            }
            unset($_POST);
        } 
//         if (!isset($_GET)) {
//             echo '</br>index</br>';
//             $util = new Util();
//             $util ->serverIdent2();
//         }
    }
}

