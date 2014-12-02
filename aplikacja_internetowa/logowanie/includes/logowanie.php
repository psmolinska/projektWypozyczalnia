<?php
$formularz = '
<form action="" method="post">
	<input type="text" name="login" value="login" />
	<input type="Password" name="Password" value="pass" />
	<input type="submit" name="logowanie" value="Zaloguj" />
</form>
';
 
$login = addslashes(htmlspecialchars($_POST['login'])); //nadajemy zmiennej login wartosc z POST
$Password = md5(addslashes(htmlspecialchars($_POST['Password']))); //nadajemy zmiennej haslo wartosc z POST
 
if(!empty($_POST['logowanie'])) { //jesli klikniemy przycisk wykonuje sie skrypt
   if(empty($login)) { //jesli nie wpisalismy loginu
	  echo 'Podaj login!'; //echujemy wiadomosc
   }
   elseif(empty($Password)) { //jesli nie wpisalismy hasla
	  echo 'Podaj hasło!'; //echujemy wiadomosc
   }
   else { //jesli sa wpisane login i haslo
	  $zapytanie = mysql_query("SELECT * FROM `USERS` WHERE `EMail` = '$login' AND `Password` = '$Password';"); //zapytujemy baze danych
	   while ($zapytanie && $rekord = mysql_fetch_assoc($zapytanie)) { //petla, aby pobrac wyniki
		  $loginzbazy = $rekord['EMail']; //zapisujemy login z bazy do zmiennej
		  $haslozbazy = $rekord['Password']; //zapisujemy haslo z bazy do zmiennej
		  $ranga = $rekord['ranga']; //zapisujemy range z bazy do zmiennej
	   }
	   if($login != $loginzbazy || $Password != $haslozbazy) { //jesli login lub/i haslo bedzie inne niz to z bazy
		  echo 'Niepoprawny login lub/i haslo!'; //echujemy wiadomosc
	   } elseif($login == $loginzbazy && $Password == $haslozbazy) { //jesli dane sie zgadzaja
		    $_SESSION['login'] = $loginzbazy; //zapisujemy login z bazy do sesji
		    $_SESSION['Password'] = $haslozbazy; //zapisujemy haslo z bazy do sesji
		    $_SESSION['ranga'] = $ranga; //zapisujemy range z bazy do sesji
		    echo 'Zostałeś poprawnie zalogowany/s <b>'.$_SESSION['login'].'</b>! Mozesz przejsc na <a href="../index.php">Strone glowna!</a>'; //echujemy wiadomosc
	   } 
	   else { //jesli wystapi nieoczekiwany blad
		    echo 'Wystąpił nieoczekiwany błąd. Spróbuj ponownie.'; //echujemy wiadomosc
	   }
   }
} else { //jesli nie klikniemy przycisku wyswietlamy formularz
   if(isset($_SESSION['login'])) { //jesli istnieje sesja z loginem
	  echo 'Jesteś już zalogowany jako<b> '.$_SESSION['login'].'</b>! Mozesz przejsc na <a href="../index.php">Strone glowna!</a>'; //echujemy wiadomosc
   } else { //jesli nie ma sesji z loginem
	  echo $formularz; //wyswietlamy formularz
	} 

}
?>
