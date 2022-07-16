<?php
$this->loadFile(DIR_TPL, 'dach');
echo "\n<h1>Wpisy Index</h1>\n";
foreach ($this->wpisy as $wpis) {
    echo "<div class='belka_top' id=''>" . $wpis['title'] . "</div>\n";
    echo "<div class='karta' id=''>\n";
    echo $wpis['title'] . "\n";
    echo $wpis['autor'] . "\n";
    echo $wpis['date_add'] . "\n";
    echo "<a href='?class=wpisy&function=one&id=";
    echo $wpis['id'];
    echo "'>Wpis - ";
    echo $wpis['title'];
    echo "</a>\n";
    echo "</div>\n";
    echo "<div class='belka_end' id=''>";
    echo $wpis['title'];
    echo "</div>\n";
}
$this->loadFile(DIR_TPL, 'stopka');