<?php
@include '../start.php';
@include '../config.php';
@setPoziom(1);
@seo();
@headlinki();
session_Start()

?>
</head><body>
<?php @include '../top_up.php'; ?>
<?php @include '../menu-top.php'; @setPoziom_menutop(1); @buttontop1(); @buttontop2(); @buttontop3(); @buttontop4(); @buttontop5();?>
<?php @include '../top_down.php'; ?>
<?php @include '../home_up.php'; ?>
<h2>Panel Rejestracji oraz Logowania</h2>
<h3>Logowanie</h3>
<div class="tekst">

<?php mysql_connect ("localhost", "root", "")or
		die ("Blad podczas polaczenia z MySQL. Jesli mozesz to poinformuj o tym administracje. Sprobuj takze odswiezyc strone.");
		mysql_select_db ("celadyn") or
	 	die ("Blad podczas wybierania bazy. Jesli mozesz to poinformuj o tym administracje. Sprobuj takze odswiezyc strone.");
	include('silnik.php'); /*główny silnik - rejestracja, 	logowanie, edycja i wylogowanie*/	
?>

<?php if(isset($_SESSION['login'])) 
{ 
echo '
<p><a href="?strona=wylogowanie">Wylogowanie</a></p>';
}?>

</div>

<h4>Rejestracja</h4>
<div class="tekst">
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
							<input type="text" name="Name" maxlength="30" />
						</td>
					</tr>
					<tr>
						<td width="120">
							Nazwisko
						</td>
						<td>
							<input type="text" name="LastName" maxlength="60" />
						</td>
					</tr>
					<tr>
						<td width="120">
							Numer prawa jazdy						</td>
						<td>
							<input type="text" name="DLN" maxlength="30" />
						</td>
					</tr>
					<tr>
						<td>
							Hasło
						</td>
						<td>
							<input type="password" name="Password" />
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
							<input type="text" name="EMail" maxlength="100" />
						</td>
					</tr>
					<tr>
						<td width="120">
							Miasto
						</td>
						<td>
							<input type="text" name="City" maxlength="30" />
						</td>
					</tr>
					<tr>
						<td width="120">
							Kod Pocztowy
						</td>
						<td>
							<input type="text" name="PostCode" maxlength="30" />
						</td>
					</tr>
					<tr>
						<td width="120">
							Ulica
						</td>
						<td>
							<input type="text" name="Street" maxlength="30" />
						</td>
					</tr>
					<tr>
						<td width="120">
							Numer Telefonu
						</td>
						<td>
							<input type="text" name="Phone" maxlength="30" />
						</td>
					</tr>
					
					<tr>
						<td>
							
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
		$DLN = addslashes(htmlspecialchars($_POST['DLN']));
		$Password = addslashes(htmlspecialchars($_POST['Password']));
		$password2 = addslashes(htmlspecialchars($_POST['password2']));
		$EMail = addslashes(htmlspecialchars($_POST['EMail']));
		$Name = addslashes(htmlspecialchars($_POST['Name']));
		$LastName = addslashes(htmlspecialchars($_POST['LastName']));
		$City = addslashes(htmlspecialchars($_POST['City']));
		$PostCode = addslashes(htmlspecialchars($_POST['PostCode']));
		$Phone = addslashes(htmlspecialchars($_POST['Phone']));
			$Street = addslashes(htmlspecialchars($_POST['Street']));
 
		/*Sprawdzanie, czy wszystkie pola zostały uzupełnione i czy są poprawne*/
		if(empty($DLN)) {
			echo'<p>Uzupełnij pole <span>Numer prawa jazdy</span></p>';
		} elseif(strlen($nick) > 50 ) {
			echo'<p>Nick może składać się z maksymalnie 50 znaków</p>';
		} elseif(empty($Password)) {
			echo'<p>Uzupełnij pole <span>hasło</span></p>';
		} elseif(empty($password2)) {
			echo'<p>Powtórz hasło</p>';
		} elseif($Password != $password2) {
			echo'<p>Podane hasła różnią się</p>';
		} elseif(empty($EMail)) {
			echo'<p>Uzupełnij pole <span>E-mail</span></p>';
		} elseif(strlen($EMail) > 50 ) {
			echo'<p>E-mail może składać się z maksymalnie 50 znaków</p>';
		} elseif(!preg_match('/^[a-zA-Z0-9\.\-\_]+\@[a-zA-Z0-9\.\-\_]+\.[a-z]{2,4}$/D', $EMail)) {
			echo'<p>Podany adres <span>E-mail</span> jest nieprawidłowy.
			 Prawidłowy E-mail jest niezbędny w celu dokończenia procesu rejestracji.</p>';
			}
 elseif(empty($Name)) {
			echo'<p>Imie jest puste</p>';
		}
		 elseif(empty($LastName)) {
			echo'<p>Nazwisko jest [puste</p>';
		}
		 elseif(empty($City)) {
			echo'<p>Misato Puste</p>';
		}
		 elseif(empty($PostCode)) {
			echo'<p>Kod pocztowy Pusty</p>';
		}
		 elseif(empty($Phone)) {
			echo'<p>Numer telefonu pusty</p>';
		}
 elseif(empty($Street)) {
			echo'<p>Ulica Pusta</p>';
		}



			else { //Jeśli wszystkie pola się zgadzają zapytujemy bazę danych
			/*Sprawdzanie, czy podany email istnieje w bazie danych*/
			$zapytajka_user = mysql_query("SELECT * FROM `USERS` WHERE `EMail` = '$EMail';");
			if(mysql_num_rows($zapytajka_user) == 1) {
				echo '<p>Taki adres email jest już zarejestrowany!</p>';
			} else {
				/*Sprawdzanie, czy podany EMail istnieje w bazie danych*/
		  		$zapytajka_EMail = mysql_query("SELECT * FROM `USERS` WHERE `EMail` = '$EMail';");
		     	if(mysql_num_rows($zapytajka_EMail) == 1) {
		        	echo '<p>Przepraszam, taki <span>e-mail</span> jest już zajęty. Możliwe, że posiadasz już konto w moim serwisie, bądź ktoś podał Twój adres.';
				} else {
					/*Dodawanie nowego użytkownika do bazy danych*/
					echo '<p>Dzięki za rejestracje <span>'.$EMail.'</span>, możesz się teraz <a href="?strona=glowna">zalogować</a>.</p>';
					$haslo_zakodowane = md5($Password);
			        $zapytanie = mysql_query("INSERT INTO USERS (DLN, Password, EMail, ranga, data, Name, LastName, City, PostCode, Phone, Street)
			        VALUES ('$DLN', '$haslo_zakodowane', '$EMail',  1, now(), '$Name', '$LastName', '$City', '$PostCode', '$Phone', '$Street');");
				}
			}
		}
	} else { //Jeśli nie został wciśnięty przycisk wyświetlamy formularz
		echo $formularz;
	}
}
?>

</div>


<?php @include '../stop.php'; ?>