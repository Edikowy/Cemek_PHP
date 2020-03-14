<?php

namespace src;

use PDO;



/**
 *
 * @author Edikowy
 *        
 */
class Usera extends Model {
    private $id;
    private $login;
    private $pass;
    private $email;
    private $access;
    private $register_date;
    private $loged;
//     private $loged_date;
//     private $last_loged_date;
    private $user_addr;
    private $user_env;
    public function __construct() {
        parent::__construct();
        if ((!empty($_SESSION['user']['login'])) && (!empty($_SESSION['user']['pass']))) {
            $this->setLogin(addslashes($_SESSION['user']['login']));
            $this->setPass(addslashes($_SESSION['user']['pass']));
            // --------------------------------------------------------------------------------
            $sql = 'SELECT * FROM users WHERE login = $this->getLogin()';
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if (!empty($result) && (password_verify($this->getPass(),$result['pass']))) {
                // --------------------------------------------------------------------------------
                $this->setId($result['id']);
                $_SESSION['user']['id'] = $this->getId();
                // --------------------------------------------------------------------------------
                $this->setEmail($result['email']);
                $_SESSION['user']['email'] = $this->getEmail();
                // --------------------------------------------------------------------------------
                $this->setAccess($result['access']);
                $_SESSION['user']['access'] = $this->getAccess();
                // --------------------------------------------------------------------------------
                $this->setRegister_date($result['register_date']);
                $_SESSION['user']['register_date'] = $this->getRegister_date();
                // ???????????????/
                $this->setUser_addr($result['user_addr']);
                $_SESSION['user']['user_addr'] = $this->getUser_addr();
                // --------------------------------------------------------------------------------
                $this->setUser_env($result['user_env']);
                $_SESSION['user']['user_env'] = $this->getUser_env();
                // ???????????????/
                $this->setLoged(TRUE);
                $_SESSION['user']['loged'] = TRUE;
                // --------------------------------------------------------------------------------
            }
            $this->conn = null;
            // --------------------------------------------------------------------------------
        }
    }
    public function login($login, $pass) {
        $_SESSION['user']['login'] = addslashes($login);
        $this->setLogin($_SESSION['user']['login']);
        $_SESSION['user']['pass'] = addslashes($pass);
        $this->setPass($_SESSION['user']['pass']);
        // --------------------------------------------------------------------------------
        $sql = 'SELECT * FROM users WHERE login = $this->getLogin()';
        $query = $this->conn->prepare($sql);
        $query->bindValue('login',$this->getLogin());
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            if (password_verify($this->getPass(),$result['pass'])) {
                // --------------------------------------------------------------------------------
                $this->setId($result['id']);
                $_SESSION['user']['id'] = $this->getId();
                // --------------------------------------------------------------------------------
                $this->setEmail($result['email']);
                $_SESSION['user']['email'] = $this->getEmail();
                // --------------------------------------------------------------------------------
                $this->setAccess($result['access']);
                $_SESSION['user']['access'] = $this->getAccess();
                // --------------------------------------------------------------------------------
                $this->setRegister_date($result['register_date']);
                $_SESSION['user']['register_date'] = $this->getRegister_date();
                // --------------------------------------------------------------------------------
                
                // ???????????????/
                
                // --------------------------------------------------------------------------------
                $this->setUser_addr($result['user_addr']);
                $_SESSION['user']['user_addr'] = $this->getUser_addr();
                // --------------------------------------------------------------------------------
                $this->setUser_env($result['user_env']);
                $_SESSION['user']['user_env'] = $this->getUser_env();
                // --------------------------------------------------------------------------------
                
                // ???????????????/
                
                // --------------------------------------------------------------------------------
                $this->setLoged(TRUE);
                $_SESSION['user']['loged'] = TRUE;
                // --------------------------------------------------------------------------------
                $this->conn = null;
                // --------------------------------------------------------------------------------
                return TRUE;
                // --------------------------------------------------------------------------------
            } else {
                $_SESSION['user_err']['pass'] = 'Złe haslo';
                unset($_SESSION['user']['login']);
                unset($_SESSION['user']['pass']);
                // --------------------------------------------------------------------------------
                return FALSE;
                // --------------------------------------------------------------------------------
            }
        } else {
            $_SESSION['user_err']['login'] = 'Zły login';
            unset($_SESSION['user']['login']);
            unset($_SESSION['user']['pass']);
            // --------------------------------------------------------------------------------
            return FALSE;
            // --------------------------------------------------------------------------------
        }
    }
    public function logout() {
        if ($this->isLoged()) {
            $this->setLoged(FALSE);
            $this->setId(0);
            $this->setAccess(0);
            session_destroy();
            Engine::doHedera("index.php");
        }
    }
    public function register($new_login, $new_email, $new_pass, $new_pass2) {
        $login = addslashes($new_login);
        $email = addslashes($new_email);
        $pass = addslashes($new_pass);
        $pass2 = addslashes($new_pass2);
        // --------------------------------------------------------------------------------
        $all_OK = TRUE;
        // --------------------------------------------------------------------------------
        if ((strlen($login) < 3) || (strlen($login) > 20)) {
            $all_OK = FALSE;
            $_SESSION['user_err']['new_login'] = "Nick musi posiadać od 3 do 20 znaków!";
        }
        // --------------------------------------------------------------------------------
        if (ctype_alnum($login)) {
            $all_OK = FALSE;
            $_SESSION['user_err']['new_login'] = "Nick musi składać się z znaków alfanumerycznych";
        }
        // --------------------------------------------------------------------------------
        $emailB = filter_var($email,FILTER_SANITIZE_EMAIL);
        if ((filter_var($emailB,FILTER_VALIDATE_EMAIL)) || ($emailB != $email)) {
            $all_OK = FALSE;
            $_SESSION['user_err']['new_email'] = "Podaj poprawny adres e-mail!";
        }
        // --------------------------------------------------------------------------------
        if ((strlen($pass) < 6) || (strlen($pass2) > 20)) {
            $all_OK = FALSE;
            $_SESSION['user_err']['new_pass'] = "Hasło musi składać się od 6 do 20 znaków.";
        }
        // --------------------------------------------------------------------------------
        if ($pass != $pass2) {
            $all_OK = FALSE;
            $_SESSION['user_err']['new_pass2'] = "Hasła nie są identyczne.";
        }
        // --------------------------------------------------------------------------------
        $pass_hash = password_hash($pass,PASSWORD_DEFAULT);
        // --------------------------------------------------------------------------------
        $sql = "SELECT email FROM users WHERE email = '$email'";
        $query = $this->conn->prepare($sql);
        $query->bindValue('email',$email);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            $all_OK = FALSE;
            $_SESSION['user_err']['new_email'] = "Istnieje już konto przypisane do tego adresu e-mail!";
        }
        // --------------------------------------------------------------------------------
        $sql = "SELECT login FROM users WHERE login = '$login'";
        $query = $this->conn->prepare($sql);
        $query->bindValue('login',$login);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            $all_OK = FALSE;
            $_SESSION['user_err']['new_login'] = "Istnieje już gracz o takim nicku! Wybierz inny.";
        }
        // --------------------------------------------------------------------------------
        
        // ???????????????/
        
        // ???????????????/
        
        // --------------------------------------------------------------------------------
        if ($all_OK) {
            $sql = "INSERT INTO users VALUES (NULL, '$login', '$pass_hash', '$email', '1', '')";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $_SESSION['user']['register_ok'] = TRUE; // ???????????????/
            header("Location: {$_SERVER['PHP_SELF']}"); // ???????????????/
        }
        // --------------------------------------------------------------------------------
        
    }
    public function newEmail($new_email, $pass) {}
    public function newPass($pass, $new_pass, $new_pass2) {}
    public function delUser($pass) {}
    
    
    public function get($name) {
        return $this->$name;
    }
    public function set($name, $value) {
        $this->$name=$value;
    }
    
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getLogin() {
        return $this->login;
    }
    public function setLogin($login) {
        $this->login = $login;
    }
    public function getPass() {
        return $this->pass;
    }
    public function setPass($pass) {
        $this->pass = $pass;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getAccess() {
        return $this->access;
    }
    public function setAccess($access) {
        $this->access = $access;
    }
    public function getRegister_date() {
        return $this->register_date;
    }
    public function setRegister_date($register_date) {
        $this->register_date = $register_date;
    }
    public function isLoged() {
        return $this->loged;
    }
    public function setLoged($loged) {
        $this->loged = $loged;
    }
//     public function getLoged_date() {
//         return $this->loged_date;
//     }
//     public function setLoged_date($loged_date) {
//         $this->loged_date = $loged_date;
//     }
//     public function getLast_loged_date() {
//         return $this->last_loged_date;
//     }
//     public function setLast_loged_date($last_loged_date) {
//         $this->last_loged_date = $last_loged_date;
//     }
    public function getUser_addr() {
        return $this->user_addr;
    }
    public function setUser_addr($user_addr) {
        $this->user_addr = $user_addr;
    }
    public function getUser_env() {
        return $this->user_env;
    }
    public function setUser_env($user_env) {
        $this->user_env = $user_env;
    }
}

