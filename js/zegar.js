/**
 * 
 */

 function tikTak() {
	dzisiaj = new Date();

	rok = dzisiaj.getFullYear();

	miesiac = dzisiaj.getMonth() + 1;
	if (miesiac < 10)
		miesiac = "0" + miesiac;

	if (miesiac == 1) {
		nazwa_miesiac = "Styczeń";
	}
	if (miesiac == 2) {
		nazwa_miesiac = "Luty";
	}
	if (miesiac == 3) {
		nazwa_miesiac = "Marzec";
	}
	if (miesiac == 4) {
		nazwa_miesiac = "Kwiecien";
	}
	if (miesiac == 5) {
		nazwa_miesiac = "Maj";
	}
	if (miesiac == 6) {
		nazwa_miesiac = "Czerwiec";
	}
	if (miesiac == 7) {
		nazwa_miesiac = "Lipiec";
	}
	if (miesiac == 8) {
		nazwa_miesiac = "Sierpień";
	}
	if (miesiac == 9) {
		nazwa_miesiac = "Wrzesień";
	}
	if (miesiac == 10) {
		nazwa_miesiac = "Pażdziernik";
	}
	if (miesiac == 11) {
		nazwa_miesiac = "Listopad";
	}
	if (miesiac == 12) {
		nazwa_miesiac = "Grudzień";
	}

	dzien = dzisiaj.getDate();
	if (dzien < 10)
		dzien = "0" + dzien;

	nazwa_dzien = dzisiaj.getDay();
	if (nazwa_dzien == 0) {
		nazwa_dzien = "Niediela";
	}
	if (nazwa_dzien == 1) {
		nazwa_dzien = "Poniedziałek";
	}
	if (nazwa_dzien == 2) {
		nazwa_dzien = "Wtorek";
	}
	if (nazwa_dzien == 3) {
		nazwa_dzien = "Środa";
	}
	if (nazwa_dzien == 4) {
		nazwa_dzien = "Czwartek";
	}
	if (nazwa_dzien == 5) {
		nazwa_dzien = "Piątek";
	}
	if (nazwa_dzien == 6) {
		nazwa_dzien = "Sobota";
	}
	
	godzina = dzisiaj.getHours();
	if (godzina < 10)
		godzina = "0" + godzina;

	minuta = dzisiaj.getMinutes();
	if (minuta < 10)
		minuta = "0" + minuta;

	sekunda = dzisiaj.getSeconds();
	if (sekunda < 10)
		sekunda = "0" + sekunda;

	document.getElementById("data").innerHTML = rok + " - " + miesiac + " - " + dzien;
	document.getElementById("czas").innerHTML = godzina + " : " + minuta + " : " + sekunda;
	document.getElementById("nazwa_dzien").innerHTML = nazwa_dzien;
	document.getElementById("nazwa_miesiac").innerHTML = nazwa_miesiac;
	setTimeout("tikTak()", 500);
}
