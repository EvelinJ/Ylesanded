<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Külastajad</title>
    </head>
	
    <body>
		
        <h1 class="pealkiri">Sellel lehel kuvatakse külastajate arvu ja viimase külastuse aega</h1>
		
		<!-- kuvame loenduri -->
		<?php include("loendur.php"); ?>
		<?php echo "Lehe külastuste arv on: " . $loendur; ?><br/>
		<?php echo "Viimane külastus : " . $aeg; ?>
		
    </body>
</html>
