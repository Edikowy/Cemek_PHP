<h1>User setings</h1>

<?php
if ((isset($_SESSION['user']['loged'])) && ($_SESSION['user']['loged'] == TRUE)) {
    echo '<br><h1>User</h1><br>';
    $this->render('user_newpass', DIR_TPL_FORM);
    $this->render('user_newemail', DIR_TPL_FORM);
    $this->render('user_deluser', DIR_TPL_FORM);
    $this->render('user_logout', DIR_TPL_FORM);
    echo '<br><h1>Lokale</h1><br>';
    $this->render('lokale_add', DIR_TPL_FORM);
    $this->render('lokale_del', DIR_TPL_FORM);
    echo '<br><h1>Wpisy</h1><br>';
    $this->render('wpisy_add', DIR_TPL_FORM);
    $this->render('wpisy_del', DIR_TPL_FORM);
} else {
    $this->render('user_register', DIR_TPL_FORM);
}
?>
