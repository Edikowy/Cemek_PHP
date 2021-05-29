<form name="lokale_del" method="POST" action="">
<select name="lokale_del[id]" size="0">
<?php foreach($this->lokale as $lokal): ?>
    <option value="<?= $lokal['id']; ?>"><?= $lokal['name']; ?></option>
 <?php endforeach; ?>
</select>
<input class="" id="" name="lokale_del[submit]" type="submit" value="Usuń" placeholder="" required>
</form>