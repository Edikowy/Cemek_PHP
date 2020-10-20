<?php
namespace src;

class View {
    public function show($templates) {
        return include 'src/template/'. $templates .'.php';
    }
}

