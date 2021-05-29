<?php
namespace src\control;

/**
 *
 * @author Edikowy
 *        
 */
class Wpisy extends Control
{

    public function index()
    {
        $modelLokale = new \src\model\Lokale();
        $modelWpisy = new \src\model\Wpisy();
        $view = new \src\view\Wpisy();
        $view->lokale = $modelLokale->index();
        $view->wpisy = $modelWpisy->index();
        $view->render('dach');
        $view->render('index', DIR_TPL_WPISY);
        $view->render('front');
        $view->render('stopka');
    }

    public function one()
    {
        $modelLokale = new \src\model\Lokale();
        $modelWpisy = new \src\model\Wpisy();
        $view = new \src\view\Wpisy();
        $view->lokale = $modelLokale->index();
        $view->wpis = $modelWpisy->one($_GET['id']);
        $view->render('dach');
        $view->render('one', DIR_TPL_WPISY);
        $view->render('stopka');
    }

    public function lokal()
    {
        $modelLokale = new \src\model\Lokale();
        $modelWpisy = new \src\model\Wpisy();
        $view = new \src\view\Wpisy();
        $view->lokale = $modelLokale->index();
        $view->wpisy = $modelWpisy->lokal($_GET['id']);
        $view->render('dach');
        $view->render('lokal', DIR_TPL_WPISY);
        $view->render('stopka');
    }

    public function add()
    {
        $modelWpisy = new \src\model\Wpisy();
        if (isset($_POST['wpisy_add'])) {
            $modelWpisy->add($_POST['wpisy_add']);
            $this->doHedera('index.php?vidok=wpisy&akcja=add');
        } else {
            $modelLokale = new \src\model\Lokale();
            $view = new \src\view\Wpisy();
            $view->lokale = $modelLokale->index();
            $view->render('dach');
            $view->render('add', DIR_TPL_WPISY);
            $view->render('stopka');
        }
    }

    public function del()
    {
        $modelWpisy = new \src\model\Wpisy();
        if (isset($_POST['wpisy_del'])) {
            $modelWpisy->del($_POST['wpisy_del']['id']);
            $this->doHedera('index.php?vidok=wpisy&akcja=del');
        } else {
            $modelLokale = new \src\model\Lokale();
            $view = new \src\view\Wpisy();
            $view->lokale = $modelLokale->index();
            $view->wpisy = $modelWpisy->index();
            $view->render('dach');
            $view->render('del', DIR_TPL_WPISY);
            $view->render('stopka');
        }
    }
}

