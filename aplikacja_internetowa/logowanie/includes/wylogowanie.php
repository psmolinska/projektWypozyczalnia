<?php
if(isset($_SESSION['login'])) {
	echo' Wylogowanie przebiegło pomyślnie '.$_SESSION['login'];
echo '
<p><a href="?strona=logowanie">Logowanie</a></p>';

	session_destroy();
} else {
	echo'Jesteś już wylogowany/a';
}
?>
