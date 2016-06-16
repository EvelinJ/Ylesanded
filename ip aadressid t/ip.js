'use strict';

var $ip = $_SERVER['REMOTE_ADDR'];

function lisaIp(ip) {

    // Loome vajalikud DOM elemendid, millest rida kokku panna
    var rida = document.createElement('tr'); // <tr></tr>
    var tdIp = document.createElement('td'); // <td></td>

    // Seame tekstiväärtused vastavate lahtrite tekstiliseks sisuks
    tdIp.textContent = ip; // <td>Ip aadress</td>

    // Moodustame eraldiseisvatest lahtritest ühe tervikliku rea
    rida.appendChild(tdIp); // <tr><td>Ip aadress</td></tr>

    // lisame rea lehel olevasse tabelisse
    document.querySelector('#log tbody').appendChild(rida); // <tbody><tr><td>Ip aadress</td></tr></tbody>
}

function request(url, options) {
    fetch('ip.php', options).then(function (res) {
        if (res.ok) {
            return res.json();
        } else {
            throw new Error('Vigane vastuskood!');
        }
    }).then(function (data) {

        //
        document.querySelector('#log tbody').innerHTML = '';

        for (var i = 0; i < data.length; i++) {
            lisaIp(data[i].ip, i);
        }

    }).catch(function (err) {
        alert('Ilmnes viga: ' + err.message);
    });
}

// Kutsume välja AJAX päringu ja laotabeli koostamise.
// Kuna funktsioon käivitatakse lehe laadimise järel, siis
// ilmub päringu tagajärjel laoseis koheselt ekraanile.
// Täiendavaid argumente pole vaja kasutada, kuna tegu on
// vaikimisi GET päringuga
request('ip.php');
