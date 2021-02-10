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
        'dir' => 'src/',
        'template' => 'src/template/',
    ];
    static $host = [
        'name' => '',
        'file' => ''
    ];
    static $db = [
        'db_driver' => 'mysql',
        'db_host' => 'localhost',
        'db_name' => 'cemek',
        'db_user_name' => 'root',
        'db_user_pass' => '',
        'db_port' => '3306'
    ];
    static $linki = [
        'Alfa' => 'index.php?linki=1',
        'Bravo' => 'index.php?linki=2',
        'Certo' => 'index.php?linki=3',
        'Delta' => 'index.php?linki=4',
        'Echo' => 'index.php?linki=5',
        'Register' => 'index.php?linki=6',
        'Admin' => 'index.php?linki=7'
    ];
    static $view = [
        'logo' => 'Cemek_PHP',
        'stopka' => 'Cemek_PHP',
    ];
    static $kluczowe = [];
    static $kuki = [
        'kuki_exp' => '30 * 24 * 3600'
    ];
    static $sesja = [
        'ses_admin_name' => 'System',
        'ses_name' => 'User'
    ];
}

