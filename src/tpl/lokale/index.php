<h1>Lokale Index</h1>
<?php foreach($this->lokale as $lokal): ?>
	
	<?= $lokal['id']; ?>
	<?= $lokal['name']; ?>
	<?= $lokal['url']; ?>
	<br>
<?php endforeach; ?>

<pre>
<?php 
// var_dump($_SESSION);
// echo PHP_VERSION;
?>
</pre>