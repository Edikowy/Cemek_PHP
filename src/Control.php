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
                    echo 'link 1</br>index</br>';
                    $util ->serverIdent2();
                break;
                
                case 2:
                    echo 'link 2</br>Alfa</br>';
                    echo $view -> showFormRegist();
                break;
                
                case 3:
                    echo 'link 3</br>Bravo</br>';
                    echo $view -> showFormAdminNewEmail();
                    echo $view -> showFormAdminNewPass();
                    echo $view -> showFormAdminDel();
                break;
                    
                case 4:
                    echo 'link 4</br>Certo</br>';
                    
                break;
                    
                case 5:
                    echo 'link 5</br>Delta</br>';
                break;
                    
                case 6:
                    echo 'link 6</br>Echo</br>';
                break;
                
                default:
                    echo 'default</br>';
                break;
            }
            unset($_GET);
        }
        if ($_POST) {
            $model = new User();
            if (isset($_POST['form_login'])) {
                echo 'form_login</br>form_login</br>';
                $model -> login($_POST['form_login']['login'], $_POST['form_login']['pass']);
            }
            if (isset($_POST['form_regist'])) {
                echo 'form_regist</br>form_regist</br>';
                $model -> register($_POST['form_regist']['login']
                    , $_POST['form_regist']['email']
                    , $_POST['form_regist']['pass']
                    , $_POST['form_regist']['pass2']
                    , $_POST['form_regist']['regulations']);
            }
            if (isset($_POST['form_admin_newemail'])) {
                echo 'form_admin_newemail</br>form_admin_newemail</br>';
//                 $model -> chengeEmail($new_email, $pass, $confirm);
                $model -> chengeEmail($_POST['form_admin_newemail']['new_email']
                    , $_POST['form_admin_newemail']['pass']
                    , $_POST['form_admin_newemail']['confirm']);
                //                 $model -> chengeEmail($_POST['form_admin_newemail']['email']
                //                     , $_POST['form_admin_newemail']['new_email']
                //                     , $_POST['form_admin_newemail']['pass']
                //                     , $_POST['form_admin_newemail']['confirm']);
            }
            if (isset($_POST['form_admin_newpass'])) {
                echo 'form_admin_newpass</br>form_admin_newpass</br>';
//                 $model -> chengePass($old_pass, $new_pass, $new_pass2, $confirm);
                $model -> chengePass($_POST['form_admin_newpass']['pass']
                    , $_POST['form_admin_newpass']['new_pass']
                    , $_POST['form_admin_newpass']['new_pass2']
                    , $_POST['form_admin_newpass']['confirm']);
            }
            if (isset($_POST['form_admin_del'])) {
                echo 'form_admin_del</br>form_admin_del</br>';
                $model -> delUser();
            }
            unset($_POST);
        }
    }
}

