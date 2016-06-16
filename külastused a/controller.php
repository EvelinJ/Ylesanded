<?php

    function controller_add($ip) {
		
		// kontrollime, kas sisendväärtused on oodatud kujul või mitte
		if ($ip == '') {
			return false;
		}
		
		if ( model_add($ip) ) {
			// saadame info modelisse, mis reaalse salvestamise teeb
			return true;
		}
		return false;
	}
	
	