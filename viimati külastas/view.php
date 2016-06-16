<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Külastajad</title>
		<script>
		    
		</script>
    </head>
	
    <body>
		
        <h1 class="pealkiri">Sellel lehel kuvatakse külastajale tema viimase külastuse aega</h1>
		
		<!-- kuvame loenduri -->
		<?php include("loendur.php"); ?>
		<?php echo "Sinu viimase külastuse aeg sellel lehel on: " . $viimati_kylastas; ?><br/>
		<?php echo "Hetke aeg on: " . date('Y-m-d H:i:s'); ?><br/>
		
    </body>
</html>
