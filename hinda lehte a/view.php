<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Hinded</title>
    </head>
	
    <body>
		
        <h1 class="pealkiri">Palun hinda seda lehekülge :)</h1>

        <div class="vorm" id="lisa-vorm-vaade">
			
            <form id="lisa-vorm" method="post" action="<?= $_SERVER['PHP_SELF']; ?>"> <!-- php jaoks on vajalik method ja action viitab sellele failile, mille URLis avame 9Rakendus.php-->
                
				<input type="hidden" name="action" value="add">
				<input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">

				<h2>Vali hinne:</h2>
				
				<!-- Hinde sisestamise nupp -->
				<select id="hinne" name="hinne">
                    <option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5" selected>5</option>
                </select>
				
				<p>
                    <button type="submit" class="button" id="lisa-nupp">Hinda</button>
				</p>
				
            </form>
			
        </div>
		
		<!-- Sisestatud hinded -->
		<?php $keskmine = model_load(); ?>
		<?php if ( !empty($keskmine) ) :?>
			<tr>
                <td>Lehe keskmine hinne on:</td>
				<td>
                    <!-- vältimaks pahatahtlikku XSS sisu, kus kasutaja sisestab õige info asemel <script> tag'i, peame tekstiväljundis asendama kõik HTML erisümbolid  --> 
                    <?= htmlspecialchars($keskmine['hinne']); ?>
                </td>
            </tr>
		<?php endif; ?>
		
    </body>
</html>
