<?php
?>
</main>
</div>
<footer id="stopka">
<?php 
    if ((isset($_SESSION['user']['loged'])) && ($_SESSION['user']['loged'] ==  TRUE)) {
        ?>
	    <a href="?vidok=lokale&akcja=add">Add_Lokale</a>
		<a href="?vidok=lokale&akcja=del">Del_Lokale</a>
	    <?php 
    }
?>
<a href="index.php" id="stopka_logo"><?= VIEW_STOPKA ?>&copy;</a>
<?php 
    if ((isset($_SESSION['user']['loged'])) && ($_SESSION['user']['loged'] ==  TRUE)) {
        ?>
	    <a href="?vidok=wpisy&akcja=add">Wpisy_Add</a>
		<a href="?vidok=wpisy&akcja=del">Wpisy_Del</a>
	    <?php 
    }
?>
</footer>
</div>
</body>
</html>