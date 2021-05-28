<?php

namespace src\model;

use PDO;
use PDOException;

/**
 *
 * @author Edikowy
 *        
 */
class Model {
    public $conn; // Uchwyt połączenia z bazą danych
    public function __construct()
    {
        try {
            $this->conn = new PDO(DB_DRIVER . ':host=' . DB_HOST .
                ';dbname=' . DB_NAME . ';charset=utf8', DB_USER_NAME, DB_USER_PASS);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
}

