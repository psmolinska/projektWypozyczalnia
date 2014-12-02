<?php
session_start();
if(strpos(strtolower($_SERVER['SCRIPT_FILENAME']), '/menu-left2.php')!==false){$protektor=file_get_contents('http://imasz.boo.pl/errors/403.html'); echo $protektor; die();}
/**Adres podstrony**/
$podstrona='';
$path='';
function setPoziom_menuleft2($poziom){
global $podstrona,$path;
$arr=explode('/',$_SERVER['SCRIPT_FILENAME']);
$arr=explode('/',$_SERVER['SCRIPT_FILENAME'],count($arr)-$poziom);
$podstrona=str_replace('.php','',$arr[count($arr)-1]);
for($i=0;$i<$poziom;$i++){$path.='../';}}
/**Buttonleft1**/


function buttonleft12(){
global $podstrona,$path;
$thesame='<li><a href="'.$path.'kategoria/przegladaj.php" title="">Panel Sterowania</a></li>';
$active='<li class="active"><a href="'.$path.'kategoria/przegladaj.php" title="">Panel Sterowania</a></li>';
$buttonleft12=array(
'kategoria/przegladaj'=>$thesame,
'kategoria/przegladaj'=>$active,
'kategoria/przegladzamowienia'=>$thesame,
'kategoria/mojprofil'=>$thesame,
'kategoria/edytujusera'=>$thesame,
'kategoria/przegladsamochodow'=>$thesame,
'kategoria/przegladwypozyczen'=>$thesame,
'kategoria/listauserow'=>$thesame,

);
echo $buttonleft12[$podstrona];}
/**Buttonleft2**/
function buttonleft22(){
global $podstrona,$path;
$thesame='<li><a href="'.$path.'kategoria/przegladzamowienia.php" title="">Przeglądaj zmaówienie</a></li>';
$active='<li class="active"><a href="'.$path.'kategoria/przegladzamowienia.php" title="">Przeglądaj zamówienie</a></li>';
$buttonleft22=array(
'kategoria/przegladaj'=>$thesame,
'kategoria/przegladaj'=>$thesame,
'kategoria/przegladzamowienia'=>$active,
'kategoria/mojprofil'=>$thesame,
'kategoria/edytujusera'=>$thesame,
'kategoria/przegladsamochodow'=>$thesame,
'kategoria/przegladwypozyczen'=>$thesame,
'kategoria/listauserow'=>$thesame,

);
echo $buttonleft22[$podstrona];}
/**Buttonleft3**/
function buttonleft32(){
global $podstrona,$path;
$thesame='<li><a href="'.$path.'kategoria/mojprofil.php" title="">Mój Profil</a></li>';
$active='<li class="active"><a href="'.$path.'kategoria/mojprofil.php" title="">Mój Profil</a></li>';
$buttonleft32=array(
'kategoria/przegladaj'=>$thesame,
'kategoria/przegladaj'=>$thesame,
'kategoria/przegladzamowienia'=>$thesame,
'kategoria/mojprofil'=>$active,
'kategoria/edytujusera'=>$thesame,
'kategoria/przegladsamochodow'=>$thesame,
'kategoria/przegladwypozyczen'=>$thesame,
'kategoria/listauserow'=>$thesame,

);
echo $buttonleft32[$podstrona];}
/**Buttonleft4**/
function buttonleft42(){
global $podstrona,$path;
$thesame='<li><a href="'.$path.'kategoria/edytujusera.php" title="">Edycja Danych Usera</a></li>';
$active='<li class="active"><a href="'.$path.'kategoria/edytujusera.php" title="">Edycja Danych Usera</a></li>';
$buttonleft42=array(
'kategoria/przegladaj'=>$thesame,
'kategoria/przegladaj'=>$thesame,
'kategoria/przegladzamowienia'=>$thesame,
'kategoria/mojprofil'=>$thesame,
'kategoria/edytujusera'=>$active,
'kategoria/przegladsamochodow'=>$thesame,
'kategoria/przegladwypozyczen'=>$thesame,
'kategoria/listauserow'=>$thesame,

);
echo $buttonleft42[$podstrona];}
/**Buttonleft5**/
function buttonleft52(){
global $podstrona,$path;
$thesame='<li><a href="'.$path.'kategoria/przegladsamochodow.php" title="">Przegladaj samochody</a></li>';
$active='<li class="active"><a href="'.$path.'kategoria/przegladsamochodow.php" title="">Przegladaj samochody</a></li>';
$buttonleft52=array(
'kategoria/index'=>$thesame,
'kategoria/przegladaj'=>$thesame,
'kategoria/przegladzamowienia'=>$thesame,
'kategoria/mojprofil'=>$thesame,
'kategoria/edytujusera'=>$thesame,
'kategoria/przegladsamochodow'=>$active,
'kategoria/przegladwypozyczen'=>$thesame,
'kategoria/listauserow'=>$thesame,

);
echo $buttonleft52[$podstrona];}
/**Buttonleft6**/
function buttonleft62(){
global $podstrona,$path;
$thesame='<li><a href="'.$path.'kategoria/przegladwypozyczen.php" title="">Przegladaj wypozyczenia</a></li>';
$thesame='<li><a href="'.$path.'kategoria/przegladwypozyczen.php" title="">Przegladaj wypozczyenia</a></li>';
$active='<li class="active"><a href="'.$path.'kategoria/przegladwypozyczen.php" title="">Przegladaj wypozyczenia</a></li>';
$buttonleft62=array(
'kategoria/index'=>$thesame,
'kategoria/przegladaj'=>$thesame,
'kategoria/przegladzamowienia'=>$thesame,
'kategoria/mojprofil'=>$thesame,
'kategoria/edytujusera'=>$thesame,
'kategoria/przegladsamochodow'=>$thesame,
'kategoria/przegladwypozyczen'=>$active,
'kategoria/listauserow'=>$thesame,

);
echo $buttonleft62[$podstrona];}
/**Buttonleft7**/
function buttonleft72(){
global $podstrona,$path;
$thesame='<li><a href="'.$path.'kategoria/listauserow.php" title="">Przegladaj i Edytuj userow</a></li>';
$active='<li class="active"><a href="'.$path.'kategoria/listauserow.php" title="">Przegladaj i Edytuj userow</a></li>';
$buttonleft72=array(
'kategoria/index'=>$thesame,
'kategoria/przegladaj'=>$thesame,
'kategoria/przegladzamowienia'=>$thesame,
'kategoria/mojprofil'=>$thesame,
'kategoria/edytujusera'=>$thesame,
'kategoria/przegladsamochodow'=>$thesame,
'kategoria/przegladwypozyczen'=>$thesame,
'kategoria/listauserow'=>$active,

);
echo $buttonleft72[$podstrona];}
/**Buttonleftblank**/
function buttonleftblank2(){
global $podstrona,$path;
$thesame='<li class="blank"></li>';
$buttonleftblank=array(
'kategoria/index'=>$thesame,
'kategoria/przegladaj'=>$thesame,
'kategoria/przegladzamowienia'=>$thesame,
'kategoria/mojprofil'=>$thesame,
'kategoria/edytujusera'=>$thesame,
'kategoria/przegladsamochodow'=>$thesame,
'kategoria/przegladwypozyczen'=>$thesame,
'kategoria/listauserow'=>$thesame,

);
echo $buttonleftblank2[$podstrona];}
   

?>