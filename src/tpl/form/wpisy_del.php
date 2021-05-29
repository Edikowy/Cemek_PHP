<form name="wpisy_del" method="POST" action="">
<select name="wpisy_del[id]" size="0">
<?php foreach($this->wpisy as $wpis): ?>
    <option value="<?= $wpis['id']; ?>"><?= $wpis['name']; ?><?= $wpis['id']; ?></option>
<?php endforeach; ?>
</select>
<input class="" id="" name="wpisy_del[submit]" type="submit" value="Usuń wpis" placeholder="" required>
</form>
