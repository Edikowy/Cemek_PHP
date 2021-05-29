<h1>Wpisy Lokal</h1>
<?php foreach($this->wpisy as $wpis): ?>

<?= $wpis['id']; ?><br>
<?= $wpis['name']; ?><br>
<?= $wpis['title']; ?><br>

<?= $wpis['date_add']; ?><br>
<?= $wpis['autor']; ?><br>
<a href="?vidok=wpisy&akcja=one&id=<?= $wpis['id']; ?>">Wpisy_<?= $wpis['name']; ?></a>
<br><br><br><br>

<?php endforeach; ?>