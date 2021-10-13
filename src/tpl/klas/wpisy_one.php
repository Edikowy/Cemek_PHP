<?php $this->loadFile(DIR_TPL, 'dach'); ?>
<br><h1>Wpisy One</h1><br>

<?= $this->wpis['id']; ?><br>
<?= $this->wpis['title']; ?><br>
<?= $this->wpis['date_add']; ?><br>
<?= $this->wpis['autor']; ?><br>
<?= $this->wpis['content']; ?><br>

<?php $this->loadFile(DIR_TPL, 'stopka'); ?>