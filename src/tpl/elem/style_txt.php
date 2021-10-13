<style>
<?php
$ala = explode('.', $tpl->getFilename());
echo $this->loadFile(DIR_STYLE, $ala[0], '.css');
?>
</style>

