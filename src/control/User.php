<?php
namespace src\control;

/**
 *
 * @author    Edikowy
 * @copyright 2021 Edikowy. All Rights Reserved.
 * @license   MIT License
 * @link      https://github.com/Edikowy/Cemek_PHP
 */
class User extends Control
{
    public function login()
    {
        if (($_POST) && (isset($_POST['user_login']))) {
            $this->loadFile(DIR_MODEL, 'User');
            $model = $this->loadClass(DIR_MODEL, 'User');
            $model->login($_POST['user_login']['login'], $_POST['user_login']['pass']);
            $this->doHedera("{$_SERVER['PHP_SELF']}");
        } else {
            $this->doHedera("{$_SERVER['PHP_SELF']}");
        }
    }
    
    public function logout()
    {
        if (($_POST) && (isset($_POST['user_logout']))) {
            $this->loadFile(DIR_MODEL, 'User');
            $model = $this->loadClass(DIR_MODEL, 'User');
            $model->logout();
            $this->doHedera("{$_SERVER['PHP_SELF']}");
        } else {
            $this->doHedera("{$_SERVER['PHP_SELF']}");
        }
    }
    
    public function register()
    {
        if (($_POST) && (isset($_POST['user_register']))) {
            $this->loadFile(DIR_MODEL, 'User');
            $model = $this->loadClass(DIR_MODEL, 'User');
            $model->register($_POST['user_register']['new_login'], $_POST['user_register']['new_email'], $_POST['user_register']['new_pass'], $_POST['user_register']['new_pass2']);
            $this->doHedera("{$_SERVER['PHP_SELF']}");
        } else {
            $this->loadFile(DIR_MODEL, 'Lokale');
            $modelLokale = $this->loadClass(DIR_MODEL, 'Lokale');
            $this->loadFile(DIR_VIEW, 'User');
            $view = $this->loadClass(DIR_VIEW, 'User');
            $view->linki = $modelLokale->linki();
            $view->loadFile(DIR_TPL_KLAS, 'user_register');
        }
    }
    
    public function setings()
    {
        $this->loadFile(DIR_MODEL, 'Lokale');
        $modelLokale = $this->loadClass(DIR_MODEL, 'Lokale');
        $this->loadFile(DIR_MODEL, 'Wpisy');
        $modelWpisy = $this->loadClass(DIR_MODEL, 'Wpisy');
        $this->loadFile(DIR_VIEW, 'User');
        $view = $this->loadClass(DIR_VIEW, 'User');
        $view->linki = $modelLokale->linki();
        $view->wpisy = $modelWpisy->index();
        $view->loadFile(DIR_TPL_KLAS, 'user_setings');
    }
    
    public function newemail()
    {
        if (($_POST) && (isset($_POST['user_newemail']))) {
            $this->loadFile(DIR_MODEL, 'User');
            $model = $this->loadClass(DIR_MODEL, 'User');
            $model->newemail($_POST['user_newemail']['new_email'], $_POST['user_newemail']['pass']);
            $this->doHedera("{$_SERVER['PHP_SELF']}");
        } else {
            $this->doHedera("{$_SERVER['PHP_SELF']}");
        }
    }
    
    public function newpass()
    {
        if (($_POST) && (isset($_POST['user_newpass']))) {
            $this->loadFile(DIR_MODEL, 'User');
            $model = $this->loadClass(DIR_MODEL, 'User');
            $model->newpass($_POST['user_newpass']['pass'], $_POST['user_newpass']['new_pass'], $_POST['user_newpass']['new_pass2']);
            $this->doHedera("{$_SERVER['PHP_SELF']}");
        } else {
            $this->doHedera("{$_SERVER['PHP_SELF']}");
        }
    }
    
    public function deluser()
    {
        if (($_POST) && (isset($_POST['user_deluser']))) {
            $this->loadFile(DIR_MODEL, 'User');
            $model = $this->loadClass(DIR_MODEL, 'User');
            $model->deluser();
            $this->doHedera("{$_SERVER['PHP_SELF']}");
        } else {
            $this->doHedera("{$_SERVER['PHP_SELF']}");
        }
    }
}