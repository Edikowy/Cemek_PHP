<?php

namespace src;



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
    private $loged_date;
    private $last_loged_date;
    private $user_addr;
    private $user_env;
    public function __construct() {
        parent::__construct();
        
    }
    public function login($login, $pass, $date) {}
    public function logout($login, $date) {}
    public function register($new_login, $new_email, $new_pass, $new_pass2, $regulations, $date) {}
    public function chengeEmail($new_email, $pass, $confirm, $date) {}
    public function chengePass($pass, $new_pass, $new_pass2, $confirm, $date) {}
    public function delUser($login, $date) {}
}

