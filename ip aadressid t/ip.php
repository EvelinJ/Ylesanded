<?php

//header('Content-Type: application/json; charset=utf-8');

$baas = 'andmebaas.txt';

if (file_exists($baas)) {
    // loeme faili sisu tekstina muutujasse
    $andmebaas = file_get_contents($baas);
    // deserialiseerime teksti JSON formaadist masiiviks
    $andmebaas = json_decode($andmebaas, true);
} else {
    $andmebaas = array();
}


if ( !empty($_SERVER['REMOTE_ADDR']) ) {
	$ip = $_SERVER['REMOTE_ADDR'];
} else {
	header('HTTP/1.1 400 Bad Request');
    echo json_encode(array('error' => 'Vigased väärtused!',));
    exit;
}

$andmebaas[] = array(
    'ip' => $ip
);

$kylastuste_arv = COUNT($andmebaas);
// salvestame muudetud massiivi
// kõigepealt serialiseerime massiivi JSON stringiks
$andmebaas = json_encode($andmebaas);
// salvestame serialiseeritud stringi andmebaasifaili
file_put_contents($baas, $andmebaas);


?>
