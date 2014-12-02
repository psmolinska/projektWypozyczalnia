<?php
if(isset($_SESSION['login'])) {
	if(!isset($_POST['edycja'])) {
		$login = addslashes($_SESSION['login']);
		$zapytanie = mysql_query("SELECT * FROM `USERS` WHERE EMail='".$login."';");
		while ($zapytanie && $rekord = mysql_fetch_assoc($zapytanie)) {
			echo'<h2>Edycja danych</h2>
			<form action="" method="post">
				<textarea name="osobie" cols="40" rows="10">'.$rekord['osobie'].'</textarea>
				<input type="submit" name="edycja" value="Edytuj dane" />
			</form>
			';
		}
	} else {
		$osobie = addslashes(htmlspecialchars($_POST['osobie']));
		$login = addslashes($_SESSION['login']);
		mysql_query("UPDATE `USERS` SET `osobie`='$osobie' WHERE `EMail`='$login'");
		echo'Dane zostały zmodyfikowane pomyślnie!';
	}
} else {
	echo'Aby mieć dostęp do tej strony musisz być <a href="?strona=glowna">zalogowany</a>';
}
?>
