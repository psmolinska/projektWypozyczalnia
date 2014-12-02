<?php
if(strpos(strtolower($_SERVER['SCRIPT_FILENAME']), '/config.php')!==false){$protektor=file_get_contents('http://imasz.boo.pl/errors/403.html'); echo $protektor; die();}
/**Adres podstrony**/
$podstrona='';
$path='';
function setPoziom($poziom){
global $podstrona,$path;
$arr=explode('/',$_SERVER['SCRIPT_FILENAME']);
$arr=explode('/',$_SERVER['SCRIPT_FILENAME'],count($arr)-$poziom);
$podstrona=str_replace('.php','',$arr[count($arr)-1]);
for($i=0;$i<$poziom;$i++){$path.='../';}}
/**SEO**/
function seo(){
global $podstrona;
$seo=array(
'index'=>'<meta name="description" lang="pl" content="" /><meta name="keywords" lang="pl" content="" /><title>Wypozyczalnia samochodow CCWD!</title>',
'kategoria/index'=>'<meta name="description" lang="pl" content="" /><meta name="keywords" lang="pl" content="" /><title>Wypozyczalnia samochodow CCWD!</title>',
'kategoria/podstrona1'=>'<meta name="description" lang="pl" content="" /><meta name="keywords" lang="pl" content="" /><title>Wypozyczalnia samochodow CCWD!</title>',
'kategoria/podstrona2'=>'<meta name="description" lang="pl" content="" /><meta name="keywords" lang="pl" content="" /><title>Wypozyczalnia samochodow CCWD!</title>',
'kategoria/podstrona3'=>'<meta name="description" lang="pl" content="" /><meta name="keywords" lang="pl" content="" /><title>Wypozyczalnia samochodow CCWD!</title>',
'kategoria/podstrona4'=>'<meta name="description" lang="pl" content="" /><meta name="keywords" lang="pl" content="" /><title>Wypozyczalnia samochodow CCWD!</title>',
'kategoria/podstrona5'=>'<meta name="description" lang="pl" content="" /><meta name="keywords" lang="pl" content="" /><title>Wypozyczalnia samochodow CCWD!</title>',
'kategoria/podstrona6'=>'<meta name="description" lang="pl" content="" /><meta name="keywords" lang="pl" content="" /><title>Wypozyczalnia samochodow CCWD!</title>',
'kategoria/podstrona7'=>'<meta name="description" lang="pl" content="" /><meta name="keywords" lang="pl" content="" /><title>Wypozyczalnia samochodow CCWD!</title>',
'kategoria/przegladaj'=>'<meta name="description" lang="pl" content="" /><meta name="keywords" lang="pl" content="" /><title>Wypozyczalnia samochodow CCWD!</title>',
'kategoria/przegladzamowienia'=>'<meta name="description" lang="pl" content="" /><meta name="keywords" lang="pl" content="" /><title>Wypozyczalnia samochodow CCWD!</title>',
'kategoria/mojprofil'=>'<meta name="description" lang="pl" content="" /><meta name="keywords" lang="pl" content="" /><title>Wypozyczalnia samochodow CCWD!</title>',
'kategoria/edytujusera'=>'<meta name="description" lang="pl" content="" /><meta name="keywords" lang="pl" content="" /><title>Wypozyczalnia samochodow CCWD!</title>',
'kategoria/przegladsamochodow'=>'<meta name="description" lang="pl" content="" /><meta name="keywords" lang="pl" content="" /><title>Wypozyczalnia samochodow CCWD!</title>',
'kategoria/przegladzwypozyczen'=>'<meta name="description" lang="pl" content="" /><meta name="keywords" lang="pl" content="" /><title>Wypozyczalnia samochodow CCWD!</title>',
'kategoria/listauserow'=>'<meta name="description" lang="pl" content="" /><meta name="keywords" lang="pl" content="" /><title>Wypozyczalnia samochodow CCWD!</title>',
'kontakt/index'=>'<meta name="description" lang="pl" content="" /><meta name="keywords" lang="pl" content="" /><title>Wypozyczalnia samochodow CCWD!</title>',
'logowanie/index'=>'<meta name="description" lang="pl" content="" /><meta name="keywords" lang="pl" content="" /><title>Srona Logowania i Rejestracji</title>',
);
echo $seo[$podstrona];}
/**headlinki**/
function headlinki(){
global $podstrona,$path;
$thesame='<link rel="stylesheet" href="'.$path.'style.css" type="text/css" />
<script type="text/javascript" src="'.$path.'skrypty.js"></script>';
$headlinki=array(
'index'=>$thesame,
'kategoria/index'=>$thesame,
'kategoria/podstrona1'=>$thesame,
'kategoria/podstrona2'=>$thesame,
'kategoria/podstrona3'=>$thesame,
'kategoria/podstrona4'=>$thesame,
'kategoria/podstrona5'=>$thesame,
'kategoria/podstrona6'=>$thesame,
'kategoria/podstrona7'=>$thesame,
'kategoria/przegladaj'=>$thesame,
'kategoria/przegladzamowienia'=>$thesame,
'kategoria/mojprofil'=>$thesame,
'kategoria/edytujusera'=>$thesame,
'kategoria/przegladsamochodow'=>$thesame,
'kategoria/przegladwypozyczen'=>$thesame,
'kategoria/listauserow'=>$thesame,
'kontakt/index'=>$thesame,
'logowanie/index'=>$thesame,


);
echo $headlinki[$podstrona];}
/**H1**/
function h1(){
global $podstrona;
$h1=array(
'index'=>'<b>WYPOZYCZALNIA SAMOCHODOW CCwD! SZYBKO, TANIO, BEZPIECZNIE!.</b>',
'kategoria/index'=>'<b>WYPOZYCZALNIA SAMOCHODOW CCwD! SZYBKO, TANIO, BEZPIECZNIE!</b>',
'kategoria/podstrona1'=>'<b>WYPOZYCZALNIA SAMOCHODOW CCwD! SZYBKO, TANIO, BEZPIECZNIE!</b>',
'kategoria/podstrona2'=>'<b>WYPOZYCZALNIA SAMOCHODOW CCwD! SZYBKO, TANIO, BEZPIECZNIE!</b>',
'kategoria/podstrona3'=>'<b>WYPOZYCZALNIA SAMOCHODOW CCwD! SZYBKO, TANIO, BEZPIECZNIE!</b>',
'kategoria/podstrona4'=>'<b>WYPOZYCZALNIA SAMOCHODOW CCwD! SZYBKO, TANIO, BEZPIECZNIE!</b>',
'kategoria/podstrona5'=>'<b>WYPOZYCZALNIA SAMOCHODOW CCwD! SZYBKO, TANIO, BEZPIECZNIE!</b>',
'kategoria/podstrona6'=>'<b>WYPOZYCZALNIA SAMOCHODOW CCwD! SZYBKO, TANIO, BEZPIECZNIE!</b>',
'kategoria/podstrona7'=>'<b>WYPOZYCZALNIA SAMOCHODOW CCwD! SZYBKO, TANIO, BEZPIECZNIE!</b>',
'kategoria/przegladaj'=>'<b>WYPOZYCZALNIA SAMOCHODOW CCwD! SZYBKO, TANIO, BEZPIECZNIE!</b>',
'kategoria/przegladzamowienia'=>'<b>WYPOZYCZALNIA SAMOCHODOW CCwD! SZYBKO, TANIO, BEZPIECZNIE!</b>',
'kategoria/edytujusera'=>'<b>WYPOZYCZALNIA SAMOCHODOW CCwD! SZYBKO, TANIO, BEZPIECZNIE!</b>',
'kategoria/przegladsamochodow'=>'<b>WYPOZYCZALNIA SAMOCHODOW CCwD! SZYBKO, TANIO, BEZPIECZNIE!</b>',
'kategoria/przegladwypozyczen'=>'<b>WYPOZYCZALNIA SAMOCHODOW CCwD! SZYBKO, TANIO, BEZPIECZNIE!</b>',
'kategoria/listauserow'=>'<b>WYPOZYCZALNIA SAMOCHODOW CCwD! SZYBKO, TANIO, BEZPIECZNIE!</b>',
'kategoria/mojprofil'=>'<b>WYPOZYCZALNIA SAMOCHODOW CCwD! SZYBKO, TANIO, BEZPIECZNIE!</b>',
'kontakt/index'=>'<b>WYPOZYCZALNIA SAMOCHODOW CCwD! SZYBKO, TANIO, BEZPIECZNIE!</b>',
'logowanie/index'=>'<b>Zalgouj lub zarejerstruj sie</b>',
);
echo $h1[$podstrona];}
?>