<?php
namespace src;

/**
 *
 * @author Edikowy
 *        
 */
class Config
{
    static $dir = [
        'root_dir' => './',
        'style_dir' => 'css/',
        'script_dir' => 'js/',
        'app_dir' => 'src/',
        'template_dir' => 'src/template/',
        'template_form_dir' => 'src/template/form/',
        'template_elem_dir' => 'src/template/elem/'
    ];
    static $db = [
        'db_driver' => 'mysql',
        'db_host' => 'localhost',
        'db_name' => 'cemek',
        'db_user_name' => 'root',
        'db_user_pass' => '',
        'db_port' => '3306'
    ];
    static $host = [
        'name' => '',
        'file' => 'index.php'
    ];
    static $kluczowe = [];
    static $kuki = [];
    static $linki = [
        'Alfa' => 'index.php?alfa=1',
        'Bravo' => 'index.php?bravo=1',
        'Certo' => 'index.php?certo=1',
        'Delta' => 'index.php?delta=1',
        'Echo' => 'index.php?echo=1',
        'Register' => 'index.php?register=1',
        'Admin' => 'index.php?admin=1'
    ];
    static $ses = [
        'ses_name' => 'PHPSESSID',
        'ses_exp' => '30 * 24 * 3600'
    ];
    static $tags = [
        'alfa' => 'Alfa=1',
        'bravo' => 'Bravo=1',
        'certo' => 'Certo=1',
        'delta' => 'Delta=1',
        'echo' => 'Echo=1',
        'register' => 'Register=1',
        'admin' => 'Admin=1'
    ];
    static $view = [
        'logo' => 'Cemek',
        'stopka' => 'Cemek'
    ];
}

