<!DOCTYPE html>
<html lang="pl" dir="ltr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="./img/favicon.ico" rel="shortcut icon" type="image/x-icon">
<?= $this->dodajPliki('./css/' ,'css' ,'link' ,DIR_TPL_ELEM); ?>
<?= $this->dodajPliki('./js/' ,'js' ,'script' ,DIR_TPL_ELEM); ?>
<title><?= VIEW_LOGO ?></title>
</head>
<body onload="tikTak()">
<div id="zero">
<div id="jeden">
<header id="dach">

<div id="lewy"><div id="data"></div><div id="nazwa_miesiac"></div>
<div id="nazwa_dzien"></div><div id="czas"></div></div>

<div id="center"><a href="index.php" id="logo"><?= VIEW_LOGO ?></a></div>

<div id="prawy">
<?php 
    if ((isset($_SESSION['user']['loged'])) && ($_SESSION['user']['loged'] ==  TRUE)) {
        echo 'User- ' . $_SESSION['user']['login'] . '<br>';
        echo 'Email- ' . $_SESSION['user']['email'] . '<br>';
        echo 'Id- ' . $_SESSION['user']['id'] . '<br>';
        $this->render('user_logout', DIR_TPL_FORM);
    } else {
        $this->render('user_login', DIR_TPL_FORM);
    }
?>
</div>

<nav id="linki"><ul>
<?php foreach($this->lokale as $lokal): ?>
	<li><a href="?vidok=lokale&akcja=one&id=<?= $lokal['id']; ?>" id="<?= $lokal['name']; ?>"><?= $lokal['name']; ?></a></li>
<?php endforeach; ?>
</ul></nav>

</header>
<main id="front">
