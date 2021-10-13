<form name="wpisy_add" method="POST" action="">
<input class="" id="" name="wpisy_add[name]" type="text" value="" placeholder="Name" required><br>
<input class="" id="" name="wpisy_add[url]" type="text" value="" placeholder="Url" required><br>
<input class="" id="" name="wpisy_add[title]" type="text" value="" placeholder="Tytuł" required><br>
<textarea class="" id="" name="wpisy_add[content]" placeholder="Zawartosć" required></textarea><br>
<input class="" id="" name="wpisy_add[date_add]" type="hidden" value="
<?= gmdate("Y.m.d-H:i:s"); ?>
" required><br>
<input class="" id="" name="wpisy_add[autor]" type="text" value="" placeholder="Autor" required><br>
<select name="wpisy_add[id_lokale]" size="0">
<?php foreach($this->linki as $link): ?>
	<option value="<?= $link['id']; ?>"><?= $link['name']; ?></option>
<?php endforeach; ?>
</select><br>
<input class="" id="" name="wpisy_add[submit]" type="submit" value="Dodaj" placeholder="" required>
</form>
