<?php

    function controller_add($like) {
		
		// kontrollime, kas sisendväärtused on oodatud kujul või mitte
		if ($like == '') {
			return false;
		}
		
		if ( model_add($like) ) {
			// saadame info modelisse, mis reaalse salvestamise teeb
			return true;
		}
		return false;
	}
	
	