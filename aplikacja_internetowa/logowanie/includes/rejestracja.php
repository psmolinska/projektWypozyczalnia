<?php
if(isset($_SESSION['login'])) {
	echo'Posiadasz już konto';
} else {
/*Deklaracja zmiennej $formularz*/
$formularz ='
			<form action="?strona=rejestracja" method="post">
				<table>
				<tr>
						<td width="120">
							Imie
						</td>
						<td>
							<input type="text" name="name" maxlength="30" />
						</td>
					</tr>
					<tr>
						<td width="120">
							Nazwisko
						</td>
						<td>
							<input type="text" name="surname" maxlength="60" />
						</td>
					</tr>
					<tr>
						<td width="120">
							Nick
						</td>
						<td>
							<input type="text" name="nick" maxlength="30" />
						</td>
					</tr>
					<tr>
						<td>
							Hasło
						</td>
						<td>
							<input type="password" name="password" />
						</td>
					</tr>
					<tr>
						<td>
							Powtórz hasło
						</td>
						<td>
							<input type="password" name="password2" />
						</td>
					</tr>
					<tr>
						<td>
							E-mail
						</td>
						<td>
							<input type="text" name="email" maxlength="100" />
						</td>
					</tr>
					<tr>
						<td width="120">
							Numer pesel
						</td>
						<td>
							<input type="text" name="pesel_documentNo" maxlength="30" />
						</td>
					</tr>
					<tr>
						<td width="120">
							Data Urodzenia
						</td>
						<td>
							<input type="date" name="birthDate" maxlength="30" />
						</td>
					</tr>
					<tr>
						<td width="120">
							Numer Telefonu
						</td>
						<td>
							<input type="text" name="phoneNo" maxlength="30" />
						</td>
					</tr>
					<tr>
						<td>
							Kliknij
						</td>
						<td>
							<input type="submit" name="rejestracja" value="Rejestruj" />
						</td>
					</tr>
				</table>
			</form>
	';
 
	if(isset($_POST['rejestracja'])) { //Jeśli został wciśnięty przycisk
		/*Filtracja zmiennych z tablicy $_POST*/
		//$nick = addslashes(htmlspecialchars($_POST['nick']));
		$password = addslashes(htmlspecialchars($_POST['password']));
		$password2 = addslashes(htmlspecialchars($_POST['password2']));
		$email = addslashes(htmlspecialchars($_POST['email']));
		$name = addslashes(htmlspecialchars($_POST['name']));
		$surname = addslashes(htmlspecialchars($_POST['surname']));
		$pesel_documentNo = addslashes(htmlspecialchars($_POST['pesel_documentNo']));
		$birthDate = addslashes(htmlspecialchars($_POST['birthDate']));
		$phoneNo = addslashes(htmlspecialchars($_POST['phoneNo']));
 
		/*Sprawdzanie, czy wszystkie pola zostały uzupełnione i czy są poprawne*/
		if(empty($name)) {
		//	echo'<p>Uzupełnij pole <span>nick</span></p>';
		//} elseif(strlen($nick) > 50 ) {
		//	echo'<p>Nick może składać się z maksymalnie 50 znaków</p>';
		} elseif(empty($password)) {
			echo'<p>Uzupełnij pole <span>hasło</span></p>';
		} elseif(empty($password2)) {
			echo'<p>Powtórz hasło</p>';
		} elseif($password != $password2) {
			echo'<p>Podane hasła różnią się</p>';
		} elseif(empty($email)) {
			echo'<p>Uzupełnij pole <span>E-mail</span></p>';
		} elseif(strlen($email) > 50 ) {
			echo'<p>E-mail może składać się z maksymalnie 50 znaków</p>';
		} elseif(!preg_match('/^[a-zA-Z0-9\.\-\_]+\@[a-zA-Z0-9\.\-\_]+\.[a-z]{2,4}$/D', $email)) {
			echo'<p>Podany adres <span>E-mail</span> jest nieprawidłowy.
			 Prawidłowy E-mail jest niezbędny w celu dokończenia procesu rejestracji.</p>';}
			//}
 elseif(empty($name)) {
			echo'<p>Imie jest puste</p>';
		}
		 elseif(empty($surname)) {
			echo'<p>Nazwisko jest [puste</p>';
		}
		 elseif(empty($pesel_documentNo)) {
			echo'<p>Pesel pusty</p>';
		}
		 elseif(empty($birthDate)) {
			echo'<p>Urodziny puste</p>';
		}
		 elseif(empty($phoneNo)) {
			echo'<p>Numer telefonu pusty</p>';
		}

			else { //Jeśli wszystkie pola się zgadzają zapytujemy bazę danych
			/*Sprawdzanie, czy podany email istnieje w bazie danych*/
			$zapytajka_user = mysql_query("SELECT * FROM `USERS` WHERE `EMail` = '$email';");
			if(mysql_num_rows($zapytajka_user) == 1) {
				echo '<p>Przepraszam, taki login jest już zajęty - proszę wybrać inny adres email.</p>';
			} else {
				/*Sprawdzanie, czy podany email istnieje w bazie danych*/
		  		$zapytajka_email = mysql_query("SELECT * FROM `USERS` WHERE `EMail` = '$email';");
		     	if(mysql_num_rows($zapytajka_email) == 1) {
		        	echo '<p>Przepraszam, taki <span>e-mail</span> jest już zajęty. Możliwe, że posiadasz już konto w moim serwisie, bądź ktoś podał Twój adres.';
				} else {
					/*Dodawanie nowego użytkownika do bazy danych*/
					echo '<p>Dzięki za rejestracje <span>'.$email.'</span>, możesz się teraz <a href="?strona=glowna">zalogować</a>.</p>';
					$haslo_zakodowane = md5($password);
			        $zapytanie = mysql_query("INSERT INTO USERS (password, email, ranga, osobie, data, name, surname, pesel_documentNo, birthDate, phoneNo)
			        VALUES ('$email', '$haslo_zakodowane', '$email',  1, '---', now(), '$name', '$surname', '$pesel_documentNo', '$birthDate', '$phoneNo');");
				}
			}
		}
	} else { //Jeśli nie został wciśnięty przycisk wyświetlamy formularz
		echo $formularz;
	}
}
?>