<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Külastuste arv</title>
    </head>
	
    <body>
		
        <h1 class="pealkiri">Sellel lehel kuvatakse külastuste arvu ja IP-de logi</h1>
		
		<!-- Sisestatud IP-d -->
		<?php include("ip.php"); ?>
		<?php echo "Lehe külastuste arv on: " . $kylastuste_arv; ?><br/>
		
		<h2>Külastuste logi</h2>
		<table id="log" border="1">
            <thead>
                <tr>
                    <th>Ip</th>
                </tr>
            </thead>

            <tbody>
			
			

            <?php
            // koolon tsükli lõpus tähendab, et tsükkel koosneb HTML osast
            foreach ( (array) $andmebaas as $index => $rida): ?>

        	    <tr>
        		    <td>
        			    <?php echo $rida; ?>
        		    </td>
        	    </tr>

            <?php endforeach; ?>

            </tbody>
        </table>

		
		
		
		
		
    </body>
</html>
