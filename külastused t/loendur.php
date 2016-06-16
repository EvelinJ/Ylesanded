<?php

$andmebaas = 'andmebaas.txt';
$aeg = date ('Y-m-d H:i:s');

$loendur = file_get_contents($andmebaas);

$loendur = $loendur + 1;

file_put_contents($andmebaas, $loendur);

?>
