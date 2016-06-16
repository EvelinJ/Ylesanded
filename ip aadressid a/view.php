<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Erinevad IP-d</title>
    </head>
	
    <body>
		
        <h1 class="pealkiri">Sellel lehel erinevate IP-de arvu</h1>
		
		<!-- Sisestatud hinded -->
		<?php $erinevate_arv = model_load(); ?>
		<?php if ( !empty($erinevate_arv) ) :?>
			<tr>
                <td>Lehe erinevate IP-dega külastajate arv on:</td>
				<td>
                    <!-- vältimaks pahatahtlikku XSS sisu, kus kasutaja sisestab õige info asemel <script> tag'i, peame tekstiväljundis asendama kõik HTML erisümbolid  --> 
                    <?= $erinevate_arv['erinevate_arv']; ?>
                </td>
            </tr>
		<?php endif; ?>
		
		<h2>Külastuste logi</h2>
		<table>
		<th>IP aadress</th>
		<th>Külastamise aeg</th>
		<?php 
		    // koolon tsükli lõpus tähendab, et tsükkel koosneb HTML osast
            foreach ( model_load_logi() as $rida ): ?>
				<tr>
                    <td>
					    <?= htmlspecialchars($rida['ip']); ?>
					</td>
				    <td> 
                        <?= htmlspecialchars($rida['aeg']); ?>
                    </td>
                </tr>
        <?php endforeach; ?>
		</table>
		
		
    </body>
</html>
