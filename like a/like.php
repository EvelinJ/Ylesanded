<?php
//rakenduse põhifail, mida avame url-is

//algatame sessiooni
session_start();

//tagame, et andmed oleks saadval ja neid on võimalik salvestada
require('model.php');

require('controller.php');

//loogika, mis kontrollib, mis actioniga on tegu ja kutsub välja vastava tegevuse ehk vahendab kasutaja poolt tulnud käske õigesse kohta
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    //tekitame muutuja, mida muudame, juhul kui tegevused saavad läbi ja result on ikka false, siis tekkis viga, kui on true, siis tegime vastava case toimingu
	$result = false;
	
    switch ($_POST['action']) {
        case 'add': 
		    $like = $_POST['like'];
		    $result = controller_add($like);
		    break;
	    }
	
	//kui result muutus true'ks suuname kasutaja ümber iseenda pihta. Juhul, kui result on false ehk ei toimunud ühtegi toimingut, siis annab veateate.
	if ($result) {
		header('location: like.php');
		exit;
	} else {
		header('Content-type: text/plain; charset=utf-8');
		echo 'Päring ebaõnnestus!';
		exit;
	}
	
	
}

require('view.php');


mysqli_close($l);

?>
