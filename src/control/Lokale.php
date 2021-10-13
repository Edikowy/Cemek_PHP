<?php
namespace src\control;

/**
 *
 * @author Edikowy
 * @copyright (c) 2015-2021, Edikowy. All Rights Reserved.
 * @license MIT License
 * @link https://github.com/Edikowy/Cemek_PHP
 */
class Lokale extends Control
{
    public function add()
    {
        $this->loadFile(DIR_MODEL, 'Lokale');
        $modelLokale = $this->loadClass(DIR_MODEL, 'Lokale');
        if (isset($_POST['lokale_add'])) {
            $modelLokale->add($_POST['lokale_add']);
            $this->doHedera("{$_SERVER['PHP_SELF']}");
        } else {
            $this->doHedera("{$_SERVER['PHP_SELF']}");
        }
    }
    
    public function del()
    {
        $this->loadFile(DIR_MODEL, 'Lokale');
        $modelLokale = $this->loadClass(DIR_MODEL, 'Lokale');
        if (isset($_POST['lokale_del'])) {
            $modelLokale->del($_POST['lokale_del']['id']);
            $this->doHedera("{$_SERVER['PHP_SELF']}");
        } else {
            $this->doHedera("{$_SERVER['PHP_SELF']}");
        }
    }
}

