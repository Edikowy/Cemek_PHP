<?php
namespace src;

class Engine
{
    
    public $host_name;
    public $file;
    
    public $date;
    
    public $is_get;
    public $get;
    
    public $is_post;
    
    public $is_ses_old;
    public $is_ses_kuki;
    
    public function __construct($host_name, $url)
    {
        $this->host_name = $host_name;
        $url = explode('?', $url);
        $this->file = $url[0];
        // ----------------------------
        if ($_GET) {
            $this->get = $url[1];
        }
    }
    
    public function start($date)
    {
        $this->date = $date;
        $this->sesStart();
        // ----------------------------
        if (! $_GET) {
            $this->is_get = FALSE;
        } else {
            $this->is_get = TRUE;
            $klucz = $this->get;
            $klucz = explode('=', $klucz);
            $klucz = $klucz[0];
            if (array_key_exists($klucz, Config::$tags)) {
                // ---
                echo '<br>klucz -' . $klucz . ' wartosc -' . Config::$tags[$klucz]; 
                //
                //
            }
            unset($_GET);
        }
        // ----------------------------
        if (! $_POST) {
            $this->is_post = FALSE;
        } else {
            $this->is_post = TRUE;
            //
            //
            unset($_POST);
        }
        // ----------------------------
        $control = new Control();
        $view = new View();
        $view->dodajInclude('dach');
        $control->uchoGet();
        $control->uchoPost();
        $view->dodajInclude('stopka');
        // ----------------------------
    }
    
    public function sesStart() {
        if (isset($_SESSION)) {
            $this->is_ses_old = TRUE;
            $this->sesStop();
        }
        if (isset($_COOKIE[Config::$ses['ses_name']])) {
            session_name(Config::$ses['ses_name']);
            session_id($_COOKIE[Config::$ses['ses_name']]);
            session_start([
                'cookie_lifetime' => Config::$ses['ses_exp']
            ]);
        } else {
            session_name(Config::$ses['ses_name']);
            session_start([
                'cookie_lifetime' => Config::$ses['ses_exp']
            ]);
        }
    }
    
    public function sesStop() {
        session_destroy();
        $this->sesStart();
    }
}

