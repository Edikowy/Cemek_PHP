<?php $this->loadFile(DIR_TPL, 'dach'); ?>
<h1>Wpisy Index</h1><br><br>
<?php foreach($this->wpisy as $wpis): ?>

<?= $wpis['id']; ?><br>
<?= $wpis['title']; ?><br>
<?= $wpis['autor']; ?><br>
<?= $wpis['date_add']; ?><br>
<?= $wpis['id_lokale']; ?><br>
<br>
<a href="?class=wpisy&function=one&id=<?= $wpis['id']; ?>">Wpis_ <?= $wpis['name']; ?></a>
<br><br><br><br>

<?php endforeach; ?>
<?php $this->loadFile(DIR_TPL, 'stopka'); ?>
