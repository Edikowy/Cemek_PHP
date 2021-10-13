<script>
<?php
$ala = explode('.', $tpl->getFilename());
echo $this->loadFile(DIR_SCRIPT, $ala[0], '.js');
?>
</script>