<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Like</title>
    </head>
	
    <body>
		
        <h1 class="pealkiri">Siin lehel saad anda oma Like'i</h1>

        <div class="vorm" id="lisa-vorm-vaade">
			
            <form id="lisa-vorm" method="post" action="<?= $_SERVER['PHP_SELF']; ?>"> <!-- php jaoks on vajalik method ja action viitab sellele failile, mille URLis avame 9Rakendus.php-->
                
				<input type="hidden" name="action" value="add">

				<h2>Lisa oma like</h2>
				
				<!-- like lisamise nupp -->
				<p>
                    <button type="submit" class="button" id="like" name="like" value="like">Like</button>
				</p>
				
            </form>
			
        </div>
		
		<!-- Sisestatud kommentaarid -->
		<?php $laikide_arv = model_load(); ?>
		<?php if ( !empty($laikide_arv) ) :?>
			<tr>
                <td>Lehe laikide arv on:</td>
				<td>
                    <!-- vältimaks pahatahtlikku XSS sisu, kus kasutaja sisestab õige info asemel <script> tag'i, peame tekstiväljundis asendama kõik HTML erisümbolid  --> 
                    <?= $laikide_arv['laikide_arv']; ?>
                </td>
            </tr>
		<?php endif; ?>
		
    </body>
</html>
