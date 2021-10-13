/**
 *
 * @author Edikowy
 * @copyright (c) 2015-2021, Edikowy. All Rights Reserved.
 * @license MIT License
 * @link https://github.com/Edikowy/Cemek_PHP
 */
function zegar() {

    let dzisiaj = new Date();
    let rok = dzisiaj.getFullYear();
    let miesiac = dzisiaj.getMonth() + 1;

    switch (miesiac) {
        case 1:
            nazwa_miesiac = "Styczeń";
            break;
        case 2:
            nazwa_miesiac = "Luty";
            break;
        case 3:
            nazwa_miesiac = "Marzec";
            break;
        case 4:
            nazwa_miesiac = "Kwiecien";
            break;
        case 5:
            nazwa_miesiac = "Maj";
            break;
        case 6:
            nazwa_miesiac = "Czerwiec";
            break;
        case 7:
            nazwa_miesiac = "Lipiec";
            break;
        case 8:
            nazwa_miesiac = "Sierpień";
            break;
        case 9:
            nazwa_miesiac = "Wrzesień";
            break;
        case 10:
            nazwa_miesiac = "Pażdziernik";
            break;
        case 11:
            nazwa_miesiac = "Listopad";
            break;
        case 12:
            nazwa_miesiac = "Grudzień";
            break;
    }

    let dzien = dzisiaj.getDate();
    let nazwa_dzien = dzisiaj.getDay();

    switch (nazwa_dzien) {
        case 0:
            nazwa_dzien = "Niedziela";
            break;
        case 1:
            nazwa_dzien = "Poniedziałek";
            break;
        case 2:
            nazwa_dzien = "Wtorek";
            break;
        case 3:
            nazwa_dzien = "Środa";
            break;
        case 4:
            nazwa_dzien = "Czwartek";
            break;
        case 5:
            nazwa_dzien = "Piątek";
            break;
        case 6:
            nazwa_dzien = "Sobota";
            break;
        default:
            break;
    }

    let godzina = dzisiaj.getHours();
    if (godzina < 10) {
        godzina = "0" + godzina;
    }

    let minuta = dzisiaj.getMinutes();
    if (minuta < 10) {
        minuta = "0" + minuta;
    }

    let sekunda = dzisiaj.getSeconds();
    if (sekunda < 10) {
        sekunda = "0" + sekunda;
    }

    document.getElementById("data").innerHTML = rok + " . " + miesiac + " . " + dzien;
    document.getElementById("czas").innerHTML = godzina + " : " + minuta + " : " + sekunda;
    document.getElementById("nazwa_dzien").innerHTML = nazwa_dzien;
    document.getElementById("nazwa_miesiac").innerHTML = nazwa_miesiac;

    setTimeout("zegar()", 500);

}

