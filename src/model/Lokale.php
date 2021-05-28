<?php
namespace src\model;

use src\control\Control;

class Lokale extends Control
{
    
    public function index()
    {
        //         $modelLokale = new \src\model\Lokale();
        //         $view = new \src\view\Lokale();
        //         $view->lokale = $modelLokale->index();
        //         $view->render('dach');
        //         $view->render('index', DIR_TPL_LOKALE);
        //         $view->render('stopka');
        $modelLokale = new \src\model\Lokale();
        $modelWpisy = new \src\model\Wpisy();
        $view = new \src\view\Wpisy();
        $view->lokale = $modelLokale->index();
        $view->wpisy = $modelWpisy->index();
        $view->render('dach');
        $view->render('user_register', DIR_TPL_FORM);
        $view->render('index', DIR_TPL_WPISY);
        $view->render('stopka');
    }
    
    public function one()
    {
        $modelLokale = new \src\model\Lokale();
        $view = new \src\view\Lokale();
        $view->lokale = $modelLokale->index();
        $view->loka = $modelLokale->one($_GET['id']);
        $view->render('dach');
        $view->render('one', DIR_TPL_LOKALE);
        $view->render('stopka');
    }
    
    public function add()
    {
        $modelLokale = new \src\model\Lokale();
        if (isset($_POST['lokale_add'])) {
            $modelLokale->add($_POST['lokale_add']);
            $this->doHedera('index.php?vidok=lokale&akcja=add');
        } else {
            $view = new \src\view\Lokale();
            $view->lokale = $modelLokale->index();
            $view->render('dach');
            $view->render('add', DIR_TPL_LOKALE);
            $view->render('stopka');
        }
    }
    
    public function del()
    {
        $modelLokale = new \src\model\Lokale();
        if (isset($_POST['lokale_del'])) {
            $modelLokale->del($_POST['lokale_del']['id']);
            $this->doHedera('index.php?vidok=lokale&akcja=del');
        } else {
            $view = new \src\view\Lokale();
            $view->lokale = $modelLokale->index();
            $view->render('dach');
            $view->render('del', DIR_TPL_LOKALE);
            $view->render('stopka');
        }
    }
}