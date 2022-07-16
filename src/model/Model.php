<?php
namespace src\model;

use PDO;
use PDOException;

/**
 *
 * @author    Edikowy
 * @copyright 2021 Edikowy. All Rights Reserved.
 * @license   MIT License
 * @link      https://github.com/Edikowy/Cemek_PHP
 */
class Model
{

    /**
     * @var object Uchwyt połączenia z bazą danych
     */
    public $conn;
    
    public function __construct()
    {
        try {
            $this->conn = new PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER_NAME, DB_USER_PASS);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
}

