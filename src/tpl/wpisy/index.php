<h1>Wpisy Index</h1><br><br>
<?php foreach($this->wpisy as $wpis): ?>

<?= $wpis['id']; ?><br>
<?= $wpis['name']; ?><br>
<?= $wpis['url']; ?><br>
<?= $wpis['title']; ?><br>

<?= $wpis['date_add']; ?><br>
<?= $wpis['autor']; ?><br>
<?= $wpis['id_lokale']; ?><br>
<br>
<a href="?vidok=wpisy&akcja=one&id=<?= $wpis['id']; ?>">Wpisy_<?= $wpis['name']; ?></a>
<br><br><br><br>
<?php endforeach; ?>

<pre>
<?php 
// var_dump($_SESSION);
?>
</pre>