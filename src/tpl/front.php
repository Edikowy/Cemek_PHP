<?php 
if ((isset($_SESSION['user']['loged'])) && ($_SESSION['user']['loged'] ==  TRUE)) {
    ?>
    <a href="?vidok=user&akcja=login">User_login</a><br>
	<a href="?vidok=user&akcja=logout">User_logout</a><br>
	<a href="?vidok=user&akcja=register">User_register</a><br>
	<a href="?vidok=user&akcja=newemail">User_newemail</a><br>
	<a href="?vidok=user&akcja=newpass">User_newpass</a><br>
	<a href="?vidok=user&akcja=deluser">User_deluser</a><br>
    <?php 
}
?>