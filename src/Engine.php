<?php

namespace src;

/**
 *
 * @author Edikowy
 * @author Abelg
 *
 */
class Engine {
    private $ses_name = 'gosc';
    private $ses_id;
    private $kuki_exp = 30*24*3600;
    public function __construct() {}
    public function start() {
        //----------------------------
        if (!empty($_SESSION)) {
            session_destroy();
        }
        if (!isset($_COOKIE[$this->getSes_name()])) {
            session_name($this->getSes_name());
            session_start([
                'cookie_lifetime' => $this->getKuki_exp(),
            ]);
            $this->setSes_id(session_id());
        } else {
            session_name($this->getSes_name());
            $this->setSes_id($_COOKIE[$this->getSes_name()]);
            session_id($this->getSes_id());
            session_start([
                'cookie_lifetime' => $this->getKuki_exp(),
            ]);
        }
        //----------------------------
        $control = new Control();
//         $model = new User();
//         $util = new Util();
        $view = new View();
        //----------------------------
        echo $view -> showDach();
        $control -> sluchacz();
        echo $view -> showStopka();
    }
    public function doHedera($url) {
        header("location: " . $url);
    }

    public function getSes_name() {
        return $this->ses_name;
    }
    public function setSes_name($ses_name) {
        $this->ses_name = $ses_name;
    }
    public function getSes_id() {
        return $this->ses_id;
    }
    public function setSes_id($ses_id) {
        $this->ses_id = $ses_id;
    }
    public function getKuki($kuki_name) {
        if (isset($_COOKIE[$kuki_name])) {
            return $_COOKIE[$kuki_name];
        } else {
            return FALSE;
        }
    }
    public function setKuki($kuki_name, $kuki_value) {
        setcookie($kuki_name, $kuki_value, time() + $this->getKuki_exp());
        return TRUE;
    }
    public function getKuki_exp() {
        return $this->kuki_exp;
    }
    public function setKuki_exp($kuki_exp) {
        $this->kuki_exp = $kuki_exp;
    }
}