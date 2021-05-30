<?php
namespace src\control;

/**
 *
 * @author Edikowy
 *        
 */
class User extends Control
{

    public function login()
    {
        $modelLokale = new \src\model\Lokale();
        $view = new \src\view\User();
        $view->linki = $modelLokale->linki();
        $view->render('dach');
        $view->render('login', DIR_TPL_USER);
        $view->render('stopka');
    }

    public function register()
    {
        $modelLokale = new \src\model\Lokale();
        $view = new \src\view\User();
        $view->linki = $modelLokale->linki();
        $view->render('dach');
        $view->render('register', DIR_TPL_USER);
        $view->render('stopka');
    }

    public function setings()
    {
        $modelLokale = new \src\model\Lokale();
        $view = new \src\view\User();
        $view->linki = $modelLokale->linki();
        $view->render('dach');
        $view->render('setings', DIR_TPL_USER);
        $view->render('stopka');
    }

    public function logout()
    {
        $modelLokale = new \src\model\Lokale();
        $view = new \src\view\User();
        $view->linki = $modelLokale->linki();
        $view->render('dach');
        $view->render('logout', DIR_TPL_USER);
        $view->render('stopka');
    }

    public function newemail()
    {
        $modelLokale = new \src\model\Lokale();
        $view = new \src\view\User();
        $view->linki = $modelLokale->linki();
        $view->render('dach');
        $view->render('newemail', DIR_TPL_USER);
        $view->render('stopka');
    }

    public function newpass()
    {
        $modelLokale = new \src\model\Lokale();
        $view = new \src\view\User();
        $view->linki = $modelLokale->linki();
        $view->render('dach');
        $view->render('newpass', DIR_TPL_USER);
        $view->render('stopka');
    }

    public function deluser()
    {
        $modelLokale = new \src\model\Lokale();
        $view = new \src\view\User();
        $view->linki = $modelLokale->linki();
        $view->render('dach');
        $view->render('deluser', DIR_TPL_USER);
        $view->render('stopka');
    }
}

