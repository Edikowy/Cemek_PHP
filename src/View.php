<?php

namespace src;

/**
 *
 * @author Edikowy
 *        
 */
class View {
	/**
	 * @return string
	 * zwraca dach
	 */
	public function showDach() {
		{
			$dach = "";
			$dach .= "<!DOCTYPE html>\n";
			$dach .= "<html lang='pl' dir='ltr'>\n";
			$dach .= "<head>\n";
			$dach .= "<meta charset='utf-8'>\n";
			$dach .= "<meta http-equiv='X-UA-Compatible' content='IE=edge'>\n";
			$dach .= "<meta name='viewport' content='width=device-width, initial-scale=1'>\n";
			$dach .= "<link rel='shortcut icon' href='img/favicon.ico' type='image/x-icon'>\n";
			$dach .= "<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>\n";
			$dach .= $this->showStyle();
			$dach .= $this->showSkrypty();
			$dach .= "<title>";
			$dach .= Util::self();
			$dach .= "</title>\n";
			$dach .= "</head>\n";
			$dach .= "<body>\n";
			$dach .= "<div class='zero'>\n";
			$dach .= "<header class='dach'>\n";
			$dach .= $this->showLewy();
			$dach .= $this->showCenter();
			$dach .= $this->showPrawy();
			$dach .= $this->showLinki();
			$dach .= "</header>\n";
			$dach .= "<div class='front'>\n";
		}
		return $dach;
	}
	public function showStyle() {
		{
			$style = "";
			foreach(Config::$view['style'] as $styl) {
				$style .= "<link href='";
				$style .= $styl;
				$style .= "' rel='stylesheet'>\n";
			}
		}
		return $style;
	}
	public function showSkrypty() {
		{
			$skrypty = "";
			foreach(Config::$view['skrypty'] as $skrypt) {
				$skrypty .= "<script src='";
				$skrypty .= $skrypt;
				$skrypty .= "'></script>\n";
			}
		}
		return $skrypty;
	}
	public function showLewy() {
		{
			$lewy = "";
			$lewy .= "<div class='lewy'>\n";
			$lewy .= "<div id='data'></div>\n";
			$lewy .= "<div id='czas'></div>\n";
			$lewy .= "</div>\n";
		}
		return $lewy;
	}
	public function showCenter() {
		{
			$center = "";
			$center .= "<div class='center'>\n";
			$center .= "<a href='?linki=1' class='logo'>";
			$center .= Config::$view['logo'];
			$center .= "</a>\n";
			$center .= "</div>\n";
		}
		return $center;
	}
	public function showPrawy() {
		{
			$prawy = "";
			$prawy .= "<div class='prawy'>\n";
			$prawy .= $this->showFormLogIn();
			$prawy .= "</div>\n";
		}
		return $prawy;
	}
	public function showLinki() {
		{
			$linki = "";
			$linki .= "<nav class='linki'>\n";
			$linki .= "<ul>\n";
			foreach (Config::$view['linki'] as $n => list($nazwa, $klasa, $url)) {
				$linki .= "<li><a href='$url' class='$klasa' id=''>$nazwa</a></li>";
			}
			$linki .= "</ul>\n";
			$linki .= "</nav>\n";
		}
		return $linki;
	}
	//-----------------------------------------
	public function showStopka() {
		{
			$stopka = "";
			$stopka .= "</div>\n";
			$stopka .= "<footer class='stopka'>\n";
			$stopka .= "<a href='?dupa' class='stopka_logo'>";
			$stopka .= Config::$view['stopka'];
			$stopka .= "&copy;";
			$stopka .= "</a>";
			$stopka .= "</footer>\n";
			$stopka .= "</div>\n";
			$stopka .= "</body>\n";
			$stopka .= "</html>\n";
		}
		return $stopka;
	}
	//-----------------------------------------
	public function showFormAdminNewEmail() {
		{
		    $form_admin_newemail = "";
		    $form_admin_newemail .= "<form name='form_admin_newemail' method='POST' action=''>";
		    $form_admin_newemail .= "<input class='' id='' name='form_admin_newemail[email]' type='text' value='' placeholder='Aktualny email' required>\n";
		    $form_admin_newemail .= "<input class='' id='' name='form_admin_newemail[new_email]' type='text' value='' placeholder='Nowy email' required>\n";
		    $form_admin_newemail .= "<input class='' id='' name='form_admin_newemail[pass]' type='password' value='' placeholder='Hasło' required>\n";
		    $form_admin_newemail .= "<input class='' id='' name='form_admin_newemail[submit]' type='submit' value='ZMIEŃ ADRES EMAIL' placeholder='' required>\n";
		    $form_admin_newemail .= "</form>\n";
		    $form_admin_newemail .= "";
		}
		return $form_admin_newemail;
	}
	public function showFormAdminNewPass() {
	    {
	        $form_admin_newpass = "";
	        $form_admin_newpass .= "<form name='form_admin_newpass' method='POST' action=''>";
	        $form_admin_newpass .= "<input class='' id='' name='form_admin_newpass[pass]' type='password' value='' placeholder='Aktualne hasło' required>\n";
	        $form_admin_newpass .= "<input class='' id='' name='form_admin_newpass[new_pass]' type='password' value='' placeholder='Wpisz nowe hasło' required>\n";
	        $form_admin_newpass .= "<input class='' id='' name='form_admin_newpass[new_pass2]' type='password' value='' placeholder='Powtórz nowe hasło' required>\n";
	        $form_admin_newpass .= "<input class='' id='' name='form_admin_newpass[submit]' type='submit' value='ZMIEŃ HASŁO' placeholder='' required>\n";
	        $form_admin_newpass .= "</form>\n";
	        $form_admin_newpass .= "";
	    }
	    return $form_admin_newpass;
	}
	public function showFormAdminDel() {
	    {
	        $form_admin_del = "";
	        $form_admin_del .= "<form name='form_admin_del' method='POST' action=''>";
	        $form_admin_del .= "<input class='' id='' name='form_admin_del[pass]' type='password' value='' placeholder='Hasło' required>\n";
	        $form_admin_del .= "<input class='' id='' name='form_admin_del[confirm]' type='checkbox' value='' placeholder='' required>\n";
	        $form_admin_del .= "<input class='' id='' name='form_admin_del[submit]' type='submit' value='USUŃ KONTO' placeholder='' required>\n";
	        $form_admin_del .= "</form>\n";
	        $form_admin_del .= "";
	    }
	    return $form_admin_del;
	}
	public function showFormLogIn() {
		{
			$form_login = "";
			$form_login .= "<form name='form_login' method='POST' action=''>";
			$form_login .= "<input name='form_login[login]' type='text' value='' placeholder='Login' required>\n";
			$form_login .= "<input name='form_login[pass]' type='password' value='' placeholder='Pass' required>\n";
			$form_login .= "<input name='form_login[submit]' type='submit' value='Login' placeholder='' required>\n";
			$form_login .= "</form>\n";
		}
		return $form_login;
	}
	public function showFormRegist() {
		{
		    $form_regist = "";
		    $form_regist .= "<form name='form_regist' method='POST' action=''>";
		    $form_regist .= "<input class='' id='' name='form_regist[login]' type='text' value='' placeholder='Wpisz login' required>";
		    $form_regist .= "<input class='' id='' name='form_regist[email]' type='text' value='' placeholder='Wpisz adres e-mail' required>";
		    $form_regist .= "<input class='' id='' name='form_regist[password]' type='password' value='' placeholder='Wpisz hasło' required>";
		    $form_regist .= "<input class='' id='' name='form_regist[password2]' type='password' value='' placeholder='Powtórz hasło' required>";
		    $form_regist .= "<input class='' id='' name='form_regist[regulamin]' type='checkbox' value='' placeholder='' required>";
		    $form_regist .= "<input class='' id='' name='form_regist[submit]' type='submit' value='REJESTRACJA' placeholder='' required>";
		    $form_regist .= "</form>\n";
		    $form_regist .= "";
		}
		return $form_regist;
	}
}

