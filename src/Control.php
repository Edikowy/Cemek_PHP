<?php
namespace src;

class Control
{
    
    public function uchoGet()
    {
       
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

