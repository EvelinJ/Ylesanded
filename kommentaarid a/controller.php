<?php

    function controller_add($nimi, $kommentaar) {
		
		// kontrollime, kas sisendväärtused on oodatud kujul või mitte
		if ($nimi == '' || $kommentaar == '') {
			return false;
		}
		
		if ( model_add($nimi, $kommentaar) ) {
			// saadame info modelisse, mis reaalse salvestamise teeb
			return true;
		}
		return false;
	}
	
	