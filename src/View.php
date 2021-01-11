<?php
namespace src;

class View {
    public function show($templates) {
        return include 'src/template/'. $templates .'.php';
    }
    //TODO ładowanie kluczowe z tablicy configa
    //TODO ładowanie styli z katalogu
    //TODO ładowanie skryptow z katalogu
    //TODO ładowanie linki z z tablicy configa ????????????
    //TODO dodać do templatek formulaże
}

