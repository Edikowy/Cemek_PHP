<?php
namespace src\model;

use src\Engine;

/**
 *
 * @author    Edikowy
 * @copyright 2021 Edikowy. All Rights Reserved.
 * @license   MIT License
 * @link      https://github.com/Edikowy/Cemek_PHP
 */
class User extends Model
{
    public function __construct()
    {
        parent::__construct();
        if ((! empty($_SESSION['user']['login'])) && (! empty($_SESSION['user']['pass']))) {
            $login = addslashes($_SESSION['user']['login']);
            $pass = addslashes($_SESSION['user']['pass']);
            // --------------------------------------------------------------------------------
            $sql = "SELECT * FROM users WHERE login = '$login'";
            $query = $this->conn->query($sql);
            $result = $query->fetch(\PDO::FETCH_ASSOC);
            if (isset($result) && (password_verify($pass, $result['pass']))) {
                $_SESSION['user']['id'] = $result['id'];
                $_SESSION['user']['login'] = $result['login'];
                $_SESSION['user']['pass'] = $result['pass'];
                $_SESSION['user']['email'] = $result['email'];
                $_SESSION['user']['loged'] = true;
            }
        }
    }
    
    public function login(string $login, string $pass)
    {
        $login = addslashes($login);
        $pass = addslashes($pass);
        // --------------------------------------------------------------------------------
        $sql = "SELECT * FROM users WHERE login = '$login'";
        $query = $this->conn->query($sql);
        $result = $query->fetch(\PDO::FETCH_ASSOC);
        if (! empty($result)) {
            if (password_verify($pass, $result['pass'])) {
                $_SESSION['user']['id'] = $result['id'];
                $_SESSION['user']['login'] = $result['login'];
                $_SESSION['user']['pass'] = $result['pass'];
                $_SESSION['user']['email'] = $result['email'];
                $_SESSION['user']['loged'] = true;
                return true;
            } else {
                $_SESSION['err_user']['pass'] = 'Złe haslo';
                echo 'Złe haslo';
                return null;
            }
        } else {
            $_SESSION['err_user']['login'] = 'Zły login';
            echo 'Zły login';
        }
    }
    
    public function logout()
    {
        if ($_SESSION['user']['loged']) {
            unset($_SESSION['user']);
            Engine::doHedera('index.php'); // ?????????????????????????
        }
    }
    
    public function register(string $new_login, string $new_email, string $new_pass, string $new_pass2)
    {
        $login = addslashes($new_login);
        $email = addslashes($new_email);
        $pass = addslashes($new_pass);
        $pass2 = addslashes($new_pass2);
        $all_OK = true;
        // --------------------------------------------------------------------------------
        // zakres()
        if ((strlen($login) < 3) || (strlen($login) > 20)) {
            $all_OK = false;
            $_SESSION['err_user']['new_login'] = 'Nick - od 3 do 20 znaków!';
        }
        // zakres()
        // --------------------------------------------------------------------------------
        // alfanum()
        if (! ctype_alnum($login)) {
            $all_OK = false;
            $_SESSION['err_user']['new_login'] = 'Nick - znaki alfanumeryczne';
        }
        // alfanum()
        // --------------------------------------------------------------------------------
        // sanityza()
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
        if ((! filter_var($emailB, FILTER_VALIDATE_EMAIL)) || ($emailB != $email)) {
            $all_OK = false;
            $_SESSION['err_user']['new_email'] = 'Podaj poprawny e-mail!';
        }
        // sanityza()
        // --------------------------------------------------------------------------------
        // zakres()
        if ((strlen($pass) < 6) || (strlen($pass2) > 20)) {
            $all_OK = false;
            $_SESSION['err_user']['new_pass'] = 'Hasło od 6 do 20 znaków.';
        }
        // zakres()
        // --------------------------------------------------------------------------------
        // to opcja
        if ($pass != $pass2) {
            $all_OK = false;
            $_SESSION['err_user']['new_pass2'] = 'Hasła nie identyczne.';
        }
        // to opcja
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
        // --------------------------------------------------------------------------------
        // czyJestTaki()
        $sql = "SELECT email FROM users WHERE email = '$email'";
        $query = $this->conn->query($sql);
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (! empty($result)) {
            $all_OK = false;
            $_SESSION['err_user']['new_email'] = 'Istnieje taki e-mail!';
        }
        // czyJestTaki()
        // --------------------------------------------------------------------------------
        // czyJestTaki()
        $sql = "SELECT login FROM users WHERE login = '$login'";
        $query = $this->conn->query($sql);
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (! empty($result)) {
            $all_OK = false;
            $_SESSION['err_user']['new_login'] = 'Istnieje taki nick!';
        }
        // czyJestTaki()
        // --------------------------------------------------------------------------------
        if ($all_OK) {
            // $remote = $_SERVER['REMOTE_ADDR'];
            // $agent = $_SERVER['HTTP_USER_AGENT'];
            // $sql = "INSERT INTO users VALUES (NULL, '$login', '$pass_hash', '$email', '1', NULL, TRUE, '$remote', '$agent')";
            $sql = 'INSERT INTO users (id, login, email, pass) VALUES (NULL, :login, :email, :pass)';
            $query = $this->conn->prepare($sql);
            $query->bindValue(':login', $login, \PDO::PARAM_STR);
            $query->bindValue(':email', $email, \PDO::PARAM_STR);
            $query->bindValue(':pass', $pass_hash, \PDO::PARAM_STR);
            $query->execute();
            // --------------------------------------------------------------------------------
            $_SESSION['user']['register_ok'] = true;
            Engine::doHedera('index.php'); // ?????????????????????????
        }
        // --------------------------------------------------------------------------------
    }
    
    public function newemail(string $new_email, string $pass)
    {
        $new_email = addslashes($new_email);
        $pass = addslashes($pass);
    }
    
    public function newpass(string $pass, string $new_pass, string $new_pass2)
    {
        $pass = addslashes($pass);
        $new_pass = addslashes($new_pass);
        $new_pass2 = addslashes($new_pass2);
    }
    
    public function deluser(string $pass)
    {
        $pass = addslashes($pass);
    }
}

