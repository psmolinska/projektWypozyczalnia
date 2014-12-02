<?php
if(!count($_POST)){@include 'http://imasz.boo.pl/errors/403.html';die();}
header("Content-Type: text/xml");
echo '<?xml version="1.0" encoding="utf-8" standalone="yes"?>';
echo '<response>';
$nadawca_name=$_POST['name'];
$nadawca_mail=$_POST['email'];
$temat=$_POST['temat'];
$odbiorca='kontakt@domena.pl';
$link='http://www.domena.pl';
$nazwa_strony='Domena.pl';
$naglowki='Reply-to: '.$nadawca_mail.' <'.$nadawca_mail.'> '.PHP_EOL.'From: '.$nadawca_mail.' <'.$nadawca_mail.'> '.PHP_EOL;
$naglowki.='MIME-Version: 1.0 '.PHP_EOL.'Content-type: text/html; charset=utf-8 '.PHP_EOL;
$ip=$_SERVER['REMOTE_ADDR'];
$nowa_tresc=$_POST['tresc'];
$nowa_tresc=htmlspecialchars(stripslashes($nowa_tresc));
$przed=array('/\n/','/([\w]+:\/\/[^\s]+[\w=\/#])/','/(www\.[^\s]+[\w=\/#])/','/([\w-\.]+@([\w-]+\.)+[\w]{2,4})/');
$po=array('<br>','<a href="\1" target="_blank">\1</a>','<a href="http://\1" target="_blank">\1</a>','<a href="mailto:\1">\1</a>');
$nowa_tresc=preg_replace($przed,$po,$nowa_tresc);
$tresc='Wiadomość wysłana przez formularz kontaktowy na stronie <a href="'.$link.'" target="_blank">'.$nazwa_strony.'</a> z '.($ip ? 'IP '.$ip : 'nieznanego IP').'.<br>';
$tresc.='Nadawca: '.$nadawca_name.' &lt;'.$nadawca_mail.'&gt;<br><br>';
$tresc.=$nowa_tresc;
if(@mail($odbiorca,$temat,$tresc,$naglowki)){
echo '[b]Wiadomość została wysłana pomyślnie.[/b]';}
else{echo '[b]Nie udało się wysłać wiadomości![/b]';}
echo '</response>';
?>