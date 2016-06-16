<?php

session_start();


if (!isset($_COOKIE['kylastused'])) {
	$kylastuste_arv = 1;
    setcookie("kylastused", $kylastuste_arv, time()+3600*24*365);
	$kylastuste_arv = $_COOKIE['kylastused'];
	
} else {
	$kylastuste_arv = $_COOKIE['kylastused']+1;
	setcookie("kylastused", $kylastuste_arv, time()+3600*24*365);
	
}

$kylastuste_arv = $_COOKIE['kylastused'];


?>
