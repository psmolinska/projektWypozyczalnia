<?php
if(strpos(strtolower($_SERVER['SCRIPT_FILENAME']), '/menu-top.php')!==false){$protektor=file_get_contents('http://imasz.boo.pl/errors/403.html'); echo $protektor; die();}
/**Adres podstrony**/
$podstrona='';
$path='';
function setPoziom_menutop($poziom){
global $podstrona,$path;
$arr=explode('/',$_SERVER['SCRIPT_FILENAME']);
$arr=explode('/',$_SERVER['SCRIPT_FILENAME'],count($arr)-$poziom);
$podstrona=str_replace('.php','',$arr[count($arr)-1]);
for($i=0;$i<$poziom;$i++){$path.='../';}}
/**Buttontop1**/
function buttontop1(){
global $podstrona,$path;
$menutop1='<a href="'.$path.'" title="" class="menutop1">Strona główna</a>';
$menutop2='<a href="'.$path.'" title="" class="menutop2">Strona główna</a>';
$buttontop1=array(
'index'=>$menutop1,
'kategoria/index'=>$menutop2,
'kategoria/podstrona1'=>$menutop2,
'kategoria/podstrona2'=>$menutop2,
'kategoria/podstrona3'=>$menutop2,
'kategoria/podstrona4'=>$menutop2,
'kategoria/podstrona5'=>$menutop2,
'kategoria/podstrona6'=>$menutop2,
'kategoria/podstrona7'=>$menutop2,
'kategoria/przegladaj'=>$menutop2,
'kategoria/przegladwypozyczen'=>$menutop2,
'kategoria/przegladsamochodow'=>$menutop2,
'kategoria/przegladzamowienia'=>$menutop2,
'kategoria/mojprofil'=>$menutop2,
'kategoria/listauserow'=>$menutop2,
'kategoria/edytujusera'=>$menutop2,
'kontakt/index'=>$menutop2,
'logowanie/index'=>$menutop2,
);
echo $buttontop1[$podstrona];}
/**Buttontop2**/
function buttontop2(){
global $podstrona,$path;
$menutop1='<a href="'.$path.'kategoria/" title="" class="menutop1">Oferta</a>';
$menutop2='<a href="'.$path.'kategoria/" title="" class="menutop2">Oferta</a>';
$buttontop2=array(
'index'=>$menutop2,
'kategoria/index'=>$menutop1,
'kategoria/podstrona1'=>$menutop1,
'kategoria/podstrona2'=>$menutop1,
'kategoria/podstrona3'=>$menutop1,
'kategoria/podstrona4'=>$menutop1,
'kategoria/podstrona5'=>$menutop1,
'kategoria/podstrona6'=>$menutop1,
'kategoria/podstrona7'=>$menutop1,
'kategoria/przegladaj'=>$menutop2,
'kategoria/przegladwypozyczen'=>$menutop2,
'kategoria/przegladsamochodow'=>$menutop2,
'kategoria/przegladzamowienia'=>$menutop2,
'kategoria/mojprofil'=>$menutop2,
'kategoria/listauserow'=>$menutop2,
'kategoria/edytujusera'=>$menutop2,
'kontakt/index'=>$menutop2,
'logowanie/index'=>$menutop2,
);
echo $buttontop2[$podstrona];}
/**Buttontop3**/
function buttontop3(){
global $podstrona,$path;
$menutop1='<a href="'.$path.'kategoria/przegladaj.php" title="" class="menutop1">Przegladaj</a>';
$menutop2='<a href="'.$path.'kategoria/przegladaj.php" title="" class="menutop2">Przegladaj</a>';
$buttontop3=array(
'index'=>$menutop2,
'kategoria/index'=>$menutop2,
'kategoria/podstrona1'=>$menutop2,
'kategoria/podstrona2'=>$menutop2,
'kategoria/podstrona3'=>$menutop2,
'kategoria/podstrona4'=>$menutop2,
'kategoria/podstrona5'=>$menutop2,
'kategoria/podstrona6'=>$menutop2,
'kategoria/podstrona7'=>$menutop2,
'kategoria/przegladaj'=>$menutop1,
'kategoria/przegladwypozyczen'=>$menutop1,
'kategoria/przegladsamochodow'=>$menutop1,
'kategoria/przegladzamowienia'=>$menutop1,
'kategoria/mojprofil'=>$menutop1,
'kategoria/listauserow'=>$menutop1,
'kategoria/edytujusera'=>$menutop1,
'kontakt/index'=>$menutop2,
'logowanie/index'=>$menutop2,
);
echo $buttontop3[$podstrona];}
/**Buttontop4**/
function buttontop4(){
global $podstrona,$path;
$menutop1='<a href="'.$path.'kontakt/" title="" class="menutop1">Kontakt</a>';
$menutop2='<a href="'.$path.'kontakt/" title="" class="menutop2">Kontakt</a>';
$buttontop4=array(
'index'=>$menutop2,
'kategoria/index'=>$menutop2,
'kategoria/podstrona1'=>$menutop2,
'kategoria/podstrona2'=>$menutop2,
'kategoria/podstrona3'=>$menutop2,
'kategoria/podstrona4'=>$menutop2,
'kategoria/podstrona5'=>$menutop2,
'kategoria/podstrona6'=>$menutop2,
'kategoria/podstrona7'=>$menutop2,
'kategoria/przegladaj'=>$menutop2,
'kategoria/przegladwypozyczen'=>$menutop2,
'kategoria/przegladsamochodow'=>$menutop2,
'kategoria/przegladzamowienia'=>$menutop2,
'kategoria/mojprofil'=>$menutop2,
'kategoria/listauserow'=>$menutop2,
'kategoria/edytujusera'=>$menutop2,
'kontakt/index'=>$menutop1,
'logowanie/index'=>$menutop2,
);
echo $buttontop4[$podstrona];}

function buttontop5(){
global $podstrona,$path;
$menutop1='<a href="'.$path.'logowanie/"" title="" class="menutop1">Rejestracja/Logowanie</a>';
$menutop2='<a href="'.$path.'logowanie/"" title="" class="menutop2">Rejestracja/Logowanie</a>';
$buttontop5=array(
'index'=>$menutop2,
'kategoria/index'=>$menutop2,
'kategoria/podstrona1'=>$menutop2,
'kategoria/podstrona2'=>$menutop2,
'kategoria/podstrona3'=>$menutop2,
'kategoria/podstrona4'=>$menutop2,
'kategoria/podstrona5'=>$menutop2,
'kategoria/podstrona6'=>$menutop2,
'kategoria/podstrona7'=>$menutop2,
'kategoria/przegladaj'=>$menutop2,
'kategoria/przegladwypozyczen'=>$menutop2,
'kategoria/przegladsamochodow'=>$menutop2,
'kategoria/przegladzamowienia'=>$menutop2,
'kategoria/mojprofil'=>$menutop2,
'kategoria/listauserow'=>$menutop2,
'kategoria/edytujusera'=>$menutop2,
'kontakt/index'=>$menutop2,
'logowanie/index'=>$menutop1,

);
echo $buttontop5[$podstrona];}
?>