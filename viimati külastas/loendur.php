<?php

session_start();


if (!isset($_COOKIE['kylastas'])) {
	$kylastas = date('Y-m-d H:i:s');
    setcookie("kylastas", $kylastas, time()+3600*24*365);
	
	
} else {
	$viimati_kylastas = $_COOKIE['kylastas'];
	$kylastas = date('Y-m-d H:i:s');
	setcookie("kylastas", $kylastas, time()+3600*24*365);
	
}




?>
