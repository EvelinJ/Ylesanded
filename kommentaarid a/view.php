<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Kommentaarid</title>
    </head>
	
    <body>
		
        <h1 class="pealkiri">Siin lehel saad kommenteerida</h1>

        <div class="vorm" id="lisa-vorm-vaade">
			
            <form id="lisa-vorm" method="post" action="<?= $_SERVER['PHP_SELF']; ?>"> <!-- php jaoks on vajalik method ja action viitab sellele failile, mille URLis avame 9Rakendus.php-->
                
				<input type="hidden" name="action" value="add">
				<input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">

				<h2>Lisa oma kommentaar</h2>
				
				<!-- Etenduse andmete sisestamise lahtrid -->
				<table>
                    <tr>
                        <td>Autor</td>
                        <td>
						    <!-- php jaoks on vajalik name, kui seda ei ole, siis neid elemente ei saadeta serverisse -->
                            <input type="text" id="nimi" name="nimi">
                        </td>
                    </tr>
					<tr>
                        <td>Kommentaar</td>
                        <td>
                            <textarea id="kommentaar" name="kommentaar" rows="8" cols="60"></textarea>
                        </td>
                    </tr>
                </table>
				
				<p>
                    <button type="submit" class="button" id="lisa-nupp">Lisa kommentaar</button>
				</p>
				
            </form>
			
        </div>
		
		<!-- Sisestatud kommentaarid -->
		<?php 
		    // koolon tsükli lõpus tähendab, et tsükkel koosneb HTML osast
            foreach ( model_load() as $rida ): ?>
                <b>Autor:</b> <?= htmlspecialchars($rida['nimi']); ?> 
                <b>Kommenteerimise aeg:</b> <?= htmlspecialchars($rida['aeg']); ?>
                <pre><?= htmlspecialchars($rida['kommentaar']); ?></pre>
        <?php endforeach; ?>
		
    </body>
</html>
