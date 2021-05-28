<?php

namespace src\model;

use src\control\Control;

/**
 *
 * @author Edikowy
 *
 */
class User extends Model {
    
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
            if (isset($result) && (password_verify($pass, $result["pass"]))) {
                $_SESSION['user']['id'] = $result["id"];
                $_SESSION['user']['login'] = $result["login"];
                $_SESSION['user']['pass'] = $result["pass"];
                $_SESSION['user']['email'] = $result["email"];
                $_SESSION['user']['loged'] =  TRUE;
            }
        }
    }
    
    public function login($login, $pass)
    {
        $login = addslashes($login);
        $pass = addslashes($pass);
        // --------------------------------------------------------------------------------
        $sql = "SELECT * FROM users WHERE login = '$login'";
        $query = $this->conn->query($sql);
        $result = $query->fetch(\PDO::FETCH_ASSOC);
        if (isset($result)) {
            if (password_verify($pass, $result["pass"])) {
                $_SESSION['user']['id'] = $result["id"];
                $_SESSION['user']['login'] = $result["login"];
                $_SESSION['user']['pass'] = $result["pass"];
                $_SESSION['user']['email'] = $result["email"];
                $_SESSION['user']['loged'] =  TRUE;
                Control::doHedera('index.php'); // ?????????????????????????
                return TRUE;
            } else {
                $_SESSION['err_user']['pass'] = 'Złe haslo';
                return NULL;
            }
        } else {
            $_SESSION['err_user']['login'] = 'Zły login';
            return NULL;
        }
    }
    
    public function logout()
    {
        if ($_SESSION['user']['loged'] ==  TRUE) {
            unset($_SESSION['user']);
            Control::doHedera('index.php'); // ?????????????????????????
        }
    }
    
    public function register($new_login, $new_email, $new_pass, $new_pass2)
    {
        $login = addslashes($new_login);
        $email = addslashes($new_email);
        $pass = addslashes($new_pass);
        $pass2 = addslashes($new_pass2);
        $all_OK = TRUE;
        // --------------------------------------------------------------------------------
        // zakres()
        if ((strlen($login) < 3) || (strlen($login) > 20)) {
            $all_OK = FALSE;
            $_SESSION['err_user']['new_login'] = "Nick - od 3 do 20 znaków!";
        }
        // zakres()
        // --------------------------------------------------------------------------------
        // alfanum()
        if (! ctype_alnum($login)) {
            $all_OK = FALSE;
            $_SESSION['err_user']['new_login'] = "Nick - znaki alfanumeryczne";
        }
        // alfanum()
        // --------------------------------------------------------------------------------
        // sanityza()
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
        if ((! filter_var($emailB, FILTER_VALIDATE_EMAIL)) || ($emailB != $email)) {
            $all_OK = FALSE;
            $_SESSION['err_user']['new_email'] = "Podaj poprawny e-mail!";
        }
        // sanityza()
        // --------------------------------------------------------------------------------
        // zakres()
        if ((strlen($pass) < 6) || (strlen($pass2) > 20)) {
            $all_OK = FALSE;
            $_SESSION['err_user']['new_pass'] = "Hasło od 6 do 20 znaków.";
        }
        // zakres()
        // --------------------------------------------------------------------------------
        // to wypada
        if ($pass != $pass2) {
            $all_OK = FALSE;
            $_SESSION['err_user']['new_pass2'] = "Hasła nie identyczne.";
        }
        // to wypada
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
        // --------------------------------------------------------------------------------
        // czyJestTaki()
        $sql = "SELECT email FROM users WHERE email = '$email'";
        $query = $this->conn->query($sql);
        $result = $query->fetch(\PDO::FETCH_ASSOC);
        if (isset($result)) {
            $all_OK = FALSE;
            $_SESSION['err_user']['new_email'] = "Istnieje taki e-mail!";
        }
        // czyJestTaki()
        // --------------------------------------------------------------------------------
        // czyJestTaki()
        $sql = "SELECT login FROM users WHERE login = '$login'";
        $query = $this->conn->query($sql);
        $result = $query->fetch(\PDO::FETCH_ASSOC);
        if (isset($result)) {
            $all_OK = FALSE;
            $_SESSION['err_user']['new_login'] = "Istnieje taki nick!";
        }
        // czyJestTaki()
        // --------------------------------------------------------------------------------
        if ($all_OK) {
            //             $remote = $_SERVER['REMOTE_ADDR'];
            //             $agent = $_SERVER['HTTP_USER_AGENT'];
            //             $sql = "INSERT INTO users VALUES (NULL, '$login', '$pass_hash', '$email', '1', NULL, TRUE, '$remote', '$agent')";
            
            // --------------------------------------------------------------------------------
            //             $sql = "INSERT INTO users VALUES (NULL, '$login', '$pass_hash', '$email')";
            //             $query = $this->conn->prepare($sql);
            //             $query->execute();
            
            $sql = 'INSERT INTO users (NULL, login, pass, email) VALUES (NULL, :login, :pass, :email)';
            $query = $this->conn->prepare($sql);
            $query->bindValue(':login', $login, \PDO::PARAM_STR);
            $query->bindValue(':pass', $pass_hash, \PDO::PARAM_STR);
            $query->bindValue(':email', $email, \PDO::PARAM_STR);
            $query->execute();
            // --------------------------------------------------------------------------------
            
            $_SESSION['user']['register_ok'] = TRUE;
            Control::doHedera('index.php'); // ?????????????????????????
        }
        // --------------------------------------------------------------------------------
    }
    
    public function newemail($new_email, $pass)
    {
        
        echo 'newEmail';
        
        $new_email = addslashes($new_email);
        $pass = addslashes($pass);
    }
    
    public function newpass($pass, $new_pass, $new_pass2)
    {
        
        echo 'newPass';
        
        $pass = addslashes($pass);
        $new_pass = addslashes($new_pass);
        $new_pass2 = addslashes($new_pass2);
    }
    
    public function deluser($pass)
    {
        
        echo 'delUser';
        
        $pass = addslashes($pass);
    }
    private function czyJestTaki() {
        ;
    }
    private function zakres() {
        ;
    }
    private function sanityza() {
        ;
    }
    private function alfanum() {
        ;
    }
}

