<?php

$c = array(
    "container.php"
);

foreach ($c as $key => $value) {
    echo '<a href="'.$value.'">'.$value.'</a><br>'.PHP_EOL;
}
