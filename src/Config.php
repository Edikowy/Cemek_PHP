<?php
namespace src;

/**
 *
 * @author Edikowy
 *        
 */
class Config
{

    static $db = [
        'db_driver' => 'mysql',
        'db_host' => 'localhost',
        'db_name' => 'cemek',
        'db_user_name' => 'root',
        'db_user_pass' => '',
        'db_port' => '3306'
    ];

    static $view = [
        'logo' => 'Cemek_PHP',
        'stopka' => 'Cemek_PHP',
        'linki' => [
            [
                'Alfa',
                'alfa',
                'index.php?linki=1'
            ],
            [
                'Bravo',
                'bravo',
                'index.php?linki=2'
            ],
            [
                'Certo',
                'certo',
                'index.php?linki=3'
            ],
            [
                'Delta',
                'delta',
                'index.php?linki=4'
            ],
            [
                'Echo',
                'echo',
                'index.php?linki=5'
            ],
            [
                'Register',
                'register',
                'index.php?linki=6'
            ],
            [
                'Admin',
                'admin',
                'index.php?linki=7'
            ]
        ]
    ];

    static $kluczowe = [];

    public static function getDb()
    {
        return Config::$db;
    }

    public static function setDb($db)
    {
        Config::$db = $db;
    }

    public static function getView()
    {
        return Config::$view;
    }

    public static function setView($view)
    {
        Config::$view = $view;
    }

    public static function getKluczowe()
    {
        return Config::$kluczowe;
    }

    public static function setKluczowe($kluczowe)
    {
        Config::$kluczowe = $kluczowe;
    }
}

