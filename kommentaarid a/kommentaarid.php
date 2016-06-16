<?php
//rakenduse põhifail, mida avame url-is

//algatame sessiooni
session_start();

if ( empty( $_SESSION['csrf_token'] ) ) {
	$_SESSION['csrf_token'] = bin2hex( openssl_random_pseudo_bytes(20) );
}

//tagame, et andmed oleks saadval ja neid on võimalik salvestada
require('model.php');

require('controller.php');

//loogika, mis kontrollib, mis actioniga on tegu ja kutsub välja vastava tegevuse ehk vahendab kasutaja poolt tulnud käske õigesse kohta
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    //tekitame muutuja, mida muudame, juhul kui tegevused saavad läbi ja result on ikka false, siis tekkis viga, kui on true, siis tegime vastava case toimingu
	$result = false;
	
	if ( !empty( $_POST['csrf_token'] ) && $_POST['csrf_token'] == $_SESSION['csrf_token'] ) {
	
        switch ($_POST['action']) {
            case 'add': 
		        $nimi = $_POST['nimi'];
				$kommentaar = $_POST['kommentaar'];
		        $result = controller_add($nimi, $kommentaar);
		        break;
	    }
    } else {
		header('Content-type: text/plain; charset=utf-8');
		echo 'Vigane päring, CSRF token ei vasta oodatule';
	}
	
	//kui result muutus true'ks suuname kasutaja ümber iseenda pihta. Juhul, kui result on false ehk ei toimunud ühtegi toimingut, siis annab veateate.
	if ($result) {
		header('location: kommentaarid.php');
		exit;
	} else {
		header('Content-type: text/plain; charset=utf-8');
		echo 'Päring ebaõnnestus!';
		exit;
	}
	
	
}

if( !empty($_GET['view']) ) {
	switch($_GET['view']) {
		default:
		    header('Content-type: text/plain; charset=utf-8');
		    echo 'Tundmatu valik!';
			exit;
	}
} else {
	
    require('view.php');
}

mysqli_close($l);

?>
