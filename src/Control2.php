<?php
namespace src;

class Control2
{

    public function uchoGet()
    {
        if (! $_GET) {
            echo 'index';   //--------------------------------
        } else {
            $klucz = $_GET;
            $klucz = explode('=', $klucz);
            $klucz = $klucz[0];
            if (array_key_exists($klucz, Config::$linki)) {
                echo '<br>klucz -' . $klucz . ' wartosc -' . Config::$linki[$klucz];    // ---
                //
                //
            }
            unset($_GET);
        }
    }

    public function uchoPost()
    {
        if ($_POST) {
            echo 'POST';    // ---
            //
            //
            unset($_POST);
        }
    }
}

