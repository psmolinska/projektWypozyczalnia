<?php
$get = addslashes($_GET['strona']);
 
switch($get) {
	case '':
		include('includes/logowanie.php');
	break;
 
	case 'glowna':
		include('includes/logowanie.php');
	break;
 
	case 'rejestracja':
		include('includes/rejestracja.php');
	break;
 
	case 'logowanie':
		include('includes/logowanie.php');
	break;
 
	case 'edycja':
		include('includes/edycja.php');
	break;
 
	case 'wylogowanie':
		include('includes/wylogowanie.php');
	break;
}
?>
