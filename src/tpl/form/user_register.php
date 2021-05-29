<form name="user_register" method="POST" action="">
<input class="" id="" name="user_register[new_login]" type="text" value="" placeholder="
<?php
if (isset($_SESSION['err_user']['new_login'])) {
    echo $_SESSION['err_user']['new_login'];
    unset($_SESSION['err_user']['new_login']);
} else {
    echo 'login';
}
?>
" required>
<input class="" id="" name="user_register[new_email]" type="email" value="" placeholder="
<?php
if (isset($_SESSION['err_user']['new_email']))
{
    echo $_SESSION['err_user']['new_email'];
    unset($_SESSION['err_user']['new_email']);
} else {
    echo 'email';
}
?>
" required>
<input class="" id="" name="user_register[new_pass]" type="password" value="" placeholder="
<?php
if (isset($_SESSION['err_user']['new_pass']))
{
    echo $_SESSION['err_user']['new_pass'];
    unset($_SESSION['err_user']['new_pass']);
} else {
    echo 'pass';
}
?>
" required>
<input class="" id="" name="user_register[new_pass2]" type="password" value="" placeholder="
<?php
if (isset($_SESSION['err_user']['new_pass2']))
{
    echo $_SESSION['err_user']['new_pass2'];
    unset($_SESSION['err_user']['new_pass2']);
} else {
    echo 'pass2';
}
?>
" required>
<input class="" id="" name="user_register[submit]" type="submit" value="Register" placeholder="" required>
</form>

