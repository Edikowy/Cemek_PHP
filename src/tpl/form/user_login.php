<form name="user_login" method="POST" action="">
<input class="" id="" name="user_login[login]" type="text" value="" placeholder="
<?php
if (isset($_SESSION['err_user']['login']))
{
    echo $_SESSION['err_user']['login'];
    unset($_SESSION['err_user']['login']);
}
?>
" required>
<input class="" id="" name="user_login[pass]" type="password" value="" placeholder="
<?php
if (isset($_SESSION['err_user']['pass']))
{
    echo $_SESSION['err_user']['pass'];
    unset($_SESSION['err_user']['pass']);
}
?>
" required>
<input class="" id="" name="user_login[submit]" type="submit" value="login" placeholder="" required>
</form>
