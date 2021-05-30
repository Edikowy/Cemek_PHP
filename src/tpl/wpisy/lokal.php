<h1>Wpisy Lokal</h1>
<?php foreach($this->wpisy as $wpis): ?>

<?= $wpis['id']; ?><br>
<?= $wpis['title']; ?><br>
<?= $wpis['autor']; ?><br>
<?= $wpis['date_add']; ?><br>

<a href="?vidok=wpisy&akcja=one&id=<?= $wpis['id']; ?>">Wpisy_<?= $wpis['name']; ?></a>
<br><br><br><br>

<?php endforeach; ?>