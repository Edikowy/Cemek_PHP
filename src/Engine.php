<?php
namespace src;

use src\model\User;

/**
 *
 * @author Edikowy
 *        
 */
class Engine
{

    public $date;

    public function __construct()
    {
        $this->date = gmdate("Y.m.d-H:i:s");
    }

    public function start()
    {
        $this->sesStart();
        $this->uchoPost();
        if (! $_GET) {
            $control = new \src\control\Wpisy();
            return $control->index();
        } else {
            if ($_GET['vidok'] == 'lokale') {
                $control = new \src\control\Lokale();
                $akcja = $_GET['akcja'];
                return $control->$akcja();
            } elseif ($_GET['vidok'] == 'user') {
                $control = new \src\control\User();
                $akcja = $_GET['akcja'];
                return $control->$akcja();
            } elseif ($_GET['vidok'] == 'wpisy') {
                $control = new \src\control\Wpisy();
                $akcja = $_GET['akcja'];
                return $control->$akcja();
            }
        }
    }

    // -------------------------------------------------------------------
    // do start()
    public function uchoPost()
    {
        // if ($_POST) {
        // $post = $_POST[$form];// ?????????????????????????????/ z posta nazwe formulaza
        // $post = explode('_', $post);
        // $klas = $post[0];
        // $funk = $post[1];
        // }
        if ($_POST) {
            $model = new User();
            if (isset($_POST['user_login'])) {
                $model->login($_POST['user_login']['login'], $_POST['user_login']['pass']);
            }
            if (isset($_POST['user_logout'])) {
                $model->logout();
                $this->sesStop();
            }
            if (isset($_POST['user_register'])) {
                $model->register($_POST['user_register']['new_login'], $_POST['user_register']['new_email'], $_POST['user_register']['new_pass'], $_POST['user_register']['new_pass2']);
            }
            if (isset($_POST['user_newemail'])) {
                $model->newemail($_POST['user_newemail']['new_email'], $_POST['user_newemail']['pass']);
            }
            if (isset($_POST['user_newpass'])) {
                $model->newpass($_POST['user_newpass']['pass'], $_POST['user_newpass']['new_pass'], $_POST['user_newpass']['new_pass2']);
            }
            if (isset($_POST['user_deluser'])) {
                $model->deluser();
                $this->sesStop();
            }
            unset($_POST);
            return $model;
        }
    }

    // do start()
    // -------------------------------------------------------------------

    // -------------------------------------------------------------------
    // Szajs!!!!!!!!!!
    public function sesStart()
    {
        if (isset($_SESSION)) {
            $this->sesStop();
        }
        if (isset($_COOKIE[SES_NAME])) {
            $this->sesKont();
        } else {
            session_set_cookie_params(SES_EXP);
            session_name(SES_NAME);
            session_start();
            $_SESSION['ses']['name'] = session_name();
            $_SESSION['ses']['id'] = session_id();
        }
    }

    // Szajs!!!!!!!!!!
    public function sesKont()
    {
        session_set_cookie_params(SES_EXP);
        session_name(SES_NAME);
        session_id($_COOKIE[SES_NAME]);
        session_start();
        $_SESSION['ses']['name'] = session_name();
        $_SESSION['ses']['id'] = session_id();
    }

    // Szajs!!!!!!!!!!
    public function sesStop()
    {
        session_write_close();
        session_destroy();
        $this->sesStart();
    }
    // Szajs!!!!!!!!!!
    // -------------------------------------------------------------------
}

