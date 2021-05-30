<h1>Wpisy Index</h1><br><br>
<?php foreach($this->wpisy as $wpis): ?>

<?= $wpis['id']; ?><br>
<?= $wpis['title']; ?><br>
<?= $wpis['autor']; ?><br>
<?= $wpis['date_add']; ?><br>
<?= $wpis['id_lokale']; ?><br>
<br>
<a href="?vidok=wpisy&akcja=one&id=<?= $wpis['id']; ?>">Wpis_ <?= $wpis['name']; ?></a>
<br><br><br><br>

<?php endforeach; ?>

