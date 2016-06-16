<?php

    function controller_add($hinne) {
		
		// kontrollime, kas sisendväärtused on oodatud kujul või mitte
		if ($hinne == '' || $hinne <= 0 || $hinne > 5) {
			return false;
		}
		
		if ( model_add($hinne) ) {
			// saadame info modelisse, mis reaalse salvestamise teeb
			return true;
		}
		return false;
	}
	
	