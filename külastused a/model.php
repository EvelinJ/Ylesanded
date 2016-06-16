<?php 
    $host = 'localhost';
    $user = 'test';
    $pass = 't3st3r123';
    $db = 'test';

    $l = mysqli_connect($host, $user, $pass, $db);
    mysqli_query($l, 'SET CHARACTER SET UTF8') or
            die('Error, ei saa andmebaasi charsetti seatud');
    
	//laeme kõik read korraga alla, sorteerime nimetuse järgi kasvavas järjekorras
    function model_load() {
	    global $l;
		
		$query = 'SELECT COUNT(Ip) as kylastajate_arv FROM ejogi__kylalised';
		$stmt = mysqli_prepare($l, $query);
		//juhul kui SQL lause on vale, siis saame teate
		if ( mysqli_error($l) ) {
			echo mysqli_error($l);
			exit;
		}
		
		mysqli_stmt_execute($stmt);
		
		//muutujad peavad olema samas järjekorras, mis select lauses
		mysqli_stmt_bind_result($stmt, $kylastajate_arv);
		
		
		//fetch täidab ära need muutujad, mis on bindi juures määratud $query lauses olevate väärtustega
		$kylastajate_arv = array();
		
		if (mysqli_stmt_fetch($stmt)) {
			$kylastajate_arv = array(
			    'ip' => $kylastajate_arv
			);
		}
		
		mysqli_stmt_close($stmt);
		
		return $kylastajate_arv;
	}
	
	function model_add($ip) {
		global $l;
		
		$query = 'INSERT INTO ejogi__kylalised (Ip) VALUES (?)';
		
		$stmt = mysqli_prepare($l, $query);
		
		//juhul kui SQL lause on vale, siis saame teate
		if ( mysqli_error($l) ) {
			echo mysqli_error($l);
			exit;
		}
		
		//si tähendab string ehk nimetus ja int ehk kogus
		mysqli_stmt_bind_param($stmt, 's', $ip);
		
		//küsimärgid asendatakse nimetuse ja koguse väärtusega
		mysqli_stmt_execute($stmt);
		
		$id = mysqli_stmt_insert_id($stmt);
		
		mysqli_stmt_close($stmt);
		
		return $id;
	}

