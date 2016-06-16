<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Kuva kell</title>

        <script>
            function alustaKell() {
				//systeemikell
                var systeemiKell = new Date();
                
				//salvestame muutujatesse tunnid, minutid, sekundid
                var h = systeemiKell.getHours();
                var m = systeemiKell.getMinutes();
                var s = systeemiKell.getSeconds();
				
				//serverikell
				var tunnid = <?= date ('H'); ?>;
                var minutid = <?= date ('i'); ?>;
                var sekundid = <?= date ('s'); ?>;
				
				//lisame nullid minutitele ja sekunditele, kui on 10 väiksemad
                m = lisaNull(m);
                s = lisaNull(s);
				
				minutid = lisaNull(minutid);
                sekundid = lisaNull(sekundid);
				
				//kirjutame viewsse kellaajad
                document.getElementById('systeemiKell').innerHTML = h + ":" + m + ":" + s;
				document.getElementById('serveriKell').innerHTML = tunnid + ":" + minutid + ":" + sekundid;
				
				//kas on sünkroonis
				tundideErinevus = h-tunnid;
				minutiteErinevus = m-minutid;
				sekunditeErinevus = s-sekundid;
				
				var erinevus = document.getElementById('erinevus');
				if (tundideErinevus == 0 && minutiteErinevus == 0 && sekunditeErinevus == 0) {
					erinevus.innerHTML = "Kellad ei ole erinevad";
				} else {
					erinevus.innerHTML = "Kellad on erinevad";
					
				}
				
            }
            function lisaNull(i) {
               if (i < 10) {i = "0" + i};  // lisab nulli kui < 10
               return i;
            }
            
        </script>
 
    </head>
	
    <body onload="alustaKell()">

        <h1>Kuva kell</h1>
        <div id="kellad">
            <form id="kell">
				<table>
				    <tr>
                        <td>Süsteemi kell:</td>
                        <td>
                            <div id="systeemiKell"></div>
                        </td>
						
                    </tr>
                    <tr>
                        <td>Serveri kell:</td>
                        <td>
                            <div id="serveriKell"></div>
                        </td>
                    </tr>
					<tr>
                        <td>Kellad:</td>
                        <td>
                            <div id="erinevus"></div>
                        </td>
                    </tr>
                </table>
				
            </form>
        </div>
    </body>
</html>
