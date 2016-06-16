<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Külastajad</title>
		<script>
		    
		</script>
    </head>
	
    <body>
		
        <h1 class="pealkiri">Sellel lehel kuvatakse külastajale tema külastuste arvu</h1>
		
		<!-- kuvame loenduri -->
		<?php include("loendur.php"); ?>
		<?php echo "Sinu külastuste arv sellel lehel on: " . $kylastuste_arv; ?><br/>
		
    </body>
</html>
