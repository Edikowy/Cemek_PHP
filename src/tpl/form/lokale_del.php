<form name="lokale_del" method="POST" action="">
<select name="lokale_del[id]" size="0">
<?php foreach($this->linki as $link): ?>
    <option value="<?= $link['id']; ?>"><?= $link['name']; ?></option>
 <?php endforeach; ?>
</select>
<input class="" id="" name="lokale_del[submit]" type="submit" value="Usuń" placeholder="" required>
</form>