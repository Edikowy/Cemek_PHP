<?php
namespace src\control;

/**
 *
 * @author    Edikowy
 * @copyright 2021 Edikowy. All Rights Reserved.
 * @license   MIT License
 * @link      https://github.com/Edikowy/Cemek_PHP
 */
class Wpisy extends Control
{
    public function index()
    {
        $this->loadFile(DIR_MODEL, 'Lokale');
        $modelLokale = $this->loadClass(DIR_MODEL, 'Lokale');
        $this->loadFile(DIR_MODEL, 'Wpisy');
        $modelWpisy = $this->loadClass(DIR_MODEL, 'Wpisy');
        $this->loadFile(DIR_VIEW, 'Wpisy');
        $view = $this->loadClass(DIR_VIEW, 'Wpisy');
        $view->linki = $modelLokale->linki();
        $view->wpisy = $modelWpisy->index();
        $view->loadFile(DIR_TPL_KLAS, 'wpisy_index');
    }
    
    public function one()
    {
        $this->loadFile(DIR_MODEL, 'Lokale');
        $modelLokale = $this->loadClass(DIR_MODEL, 'Lokale');
        $this->loadFile(DIR_MODEL, 'Wpisy');
        $modelWpisy = $this->loadClass(DIR_MODEL, 'Wpisy');
        $this->loadFile(DIR_VIEW, 'Wpisy');
        $view = $this->loadClass(DIR_VIEW, 'Wpisy');
        $view->linki = $modelLokale->linki();
        $view->wpis = $modelWpisy->one($_GET['id']);
        $view->loadFile(DIR_TPL_KLAS, 'wpisy_one');
    }
    
    public function lokal()
    {
        $this->loadFile(DIR_MODEL, 'Lokale');
        $modelLokale = $this->loadClass(DIR_MODEL, 'Lokale');
        $this->loadFile(DIR_MODEL, 'Wpisy');
        $modelWpisy = $this->loadClass(DIR_MODEL, 'Wpisy');
        $this->loadFile(DIR_VIEW, 'Wpisy');
        $view = $this->loadClass(DIR_VIEW, 'Wpisy');
        $view->linki = $modelLokale->linki();
        $view->wpisy = $modelWpisy->lokal($_GET['id']);
        $view->loadFile(DIR_TPL_KLAS, 'wpisy_lokal');
    }
    
    public function add()
    {
        $this->loadFile(DIR_MODEL, 'Wpisy');
        $modelWpisy = $this->loadClass(DIR_MODEL, 'Wpisy');
        if (isset($_POST['wpisy_add'])) {
            $modelWpisy->add($_POST['wpisy_add']);
            $this->doHedera("{$_SERVER['PHP_SELF']}");
        } else {
            $this->doHedera('index.php');
        }
    }
    
    public function del()
    {
        $this->loadFile(DIR_MODEL, 'Wpisy');
        $modelWpisy = $this->loadClass(DIR_MODEL, 'Wpisy');
        if (isset($_POST['wpisy_del'])) {
            $modelWpisy->del($_POST['wpisy_del']['id']);
            $this->doHedera("{$_SERVER['PHP_SELF']}");
        } else {
            $this->doHedera('index.php');
        }
    }
}

