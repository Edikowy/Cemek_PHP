<?php
namespace src\control;

/**
 *
 * @author Edikowy
 * @copyright (c) 2015-2021, Edikowy. All Rights Reserved.
 * @license MIT License
 * @link https://github.com/Edikowy/Cemek_PHP
 */
class Ero extends Control
{
    public function index() {
        $this->loadFile(DIR_MODEL, 'Lokale');
        $modelLokale = $this->loadClass(DIR_MODEL, 'Lokale');
        $this->loadFile(DIR_VIEW, 'Ero');
        $view = $this->loadClass(DIR_VIEW, 'Ero');
        $view->linki = $modelLokale->linki();
        $view->loadFile(DIR_TPL_KLAS, 'ero_index');
    }
}

