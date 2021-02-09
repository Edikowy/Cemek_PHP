<?php
namespace src;

class Control
{
    
    public function uchoGet()
    {
        //TODO zamienić swicza na iteracje tablicy
        $view = new View();
        if (! $_GET) {
            $view->show(Config::$dir['template'], 'index');
        }
        if ($_GET) {
            $linki = (int) $_GET['linki'];
            switch ($linki) {
                case 1:
                    $view->show(Config::$dir['template'], 'alfa');
                    break;
                    
                case 2:
                    $view->show(Config::$dir['template'], 'bravo');
                    break;
                    
                case 3:
                    $view->show(Config::$dir['template'], 'certo');
                    break;
                    
                case 4:
                    $view->show(Config::$dir['template'], 'delta');
                    break;
                    
                case 5:
                    $view->show(Config::$dir['template'], 'echo');
                    break;
                    
                case 6:
                    $view->show(Config::$dir['template'], 'register');
                    break;
                    
                case 7:
                    $view->show(Config::$dir['template'], 'admin');
                    break;
                    
                default:
                    $view->show(Config::$dir['template'], 'index');
                    break;
            }
            unset($_GET);
            return $view;
        }
    }
    
    public function uchoPost()
    {
        if ($_POST) {
            $model = new User();
            if (isset($_POST['form_login'])) {
                $model->login($_POST['form_login']['login'], $_POST['form_login']['pass']);
            }
            if (isset($_POST['form_regist'])) {
                $model->register($_POST['form_regist']['new_login'], $_POST['form_regist']['new_email'], $_POST['form_regist']['new_pass'], $_POST['form_regist']['new_pass2']);
            }
            if (isset($_POST['form_admin_newemail'])) {
                $model->newEmail($_POST['form_admin_newemail']['new_email'], $_POST['form_admin_newemail']['pass']);
            }
            if (isset($_POST['form_admin_newpass'])) {
                $model->newPass($_POST['form_admin_newpass']['pass'], $_POST['form_admin_newpass']['new_pass'], $_POST['form_admin_newpass']['new_pass2']);
            }
            if (isset($_POST['form_admin_del'])) {
                $model->delUser();
            }
            unset($_POST);
            return $model;
        }
    }
}

