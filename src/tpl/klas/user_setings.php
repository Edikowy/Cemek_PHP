<?php
$this->loadFile(DIR_TPL, 'dach');

if ((isset($_SESSION['user']['loged'])) && ($_SESSION['user']['loged'] == TRUE)) {
    echo '<br><h1>User setings</h1><br>';
    $this->loadFile(DIR_TPL_FORM, 'user_newpass');
    $this->loadFile(DIR_TPL_FORM, 'user_newemail');
    $this->loadFile(DIR_TPL_FORM, 'user_deluser');
    $this->loadFile(DIR_TPL_FORM, 'user_logout');
    echo '<br><h1>Lokale</h1><br>';
    $this->loadFile(DIR_TPL_FORM, 'lokale_add');
    $this->loadFile(DIR_TPL_FORM, 'lokale_del');
    echo '<br><h1>Wpisy</h1><br>';
    $this->loadFile(DIR_TPL_FORM, 'wpisy_add');
    $this->loadFile(DIR_TPL_FORM, 'wpisy_del');
} else {
    echo '<br><h1>User register</h1><br>';
    $this->loadFile(DIR_TPL_FORM, 'user_register');
}

$this->loadFile(DIR_TPL, 'stopka');
?>
