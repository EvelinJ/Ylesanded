<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Külastajad</title>
    </head>
	
    <body>
		
        <h1 class="pealkiri">Sellel lehel kuvatakse külastajate arvu</h1>
		
		<!-- Sisestatud hinded -->
		<?php $kylastajate_arv = model_load(); ?>
		<?php if ( !empty($kylastajate_arv) ) :?>
			<tr>
                <td>Lehe külastajate arv on:</td>
				<td>
                    <!-- vältimaks pahatahtlikku XSS sisu, kus kasutaja sisestab õige info asemel <script> tag'i, peame tekstiväljundis asendama kõik HTML erisümbolid  --> 
                    <?= $kylastajate_arv['ip']; ?>
                </td>
            </tr>
		<?php endif; ?>
		
    </body>
</html>
