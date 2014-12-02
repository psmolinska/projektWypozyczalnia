<?php
if(strpos(strtolower($_SERVER['SCRIPT_FILENAME']), '/menu-left.php')!==false){$protektor=file_get_contents('http://imasz.boo.pl/errors/403.html'); echo $protektor; die();}
/**Adres podstrony**/
$podstrona='';
$path='';
function setPoziom_menuleft($poziom){
global $podstrona,$path;
$arr=explode('/',$_SERVER['SCRIPT_FILENAME']);
$arr=explode('/',$_SERVER['SCRIPT_FILENAME'],count($arr)-$poziom);
$podstrona=str_replace('.php','',$arr[count($arr)-1]);
for($i=0;$i<$poziom;$i++){$path.='../';}}
/**Buttonleft1**/
function buttonleft1(){
global $podstrona,$path;
$thesame='<li><a href="'.$path.'kategoria/podstrona1.php" title="">Przeglądaj ofertę</a></li>';
$active='<li class="active"><a href="'.$path.'kategoria/podstrona1.php" title="">Przeglądaj ofertę</a></li>';
$buttonleft1=array(
'kategoria/index'=>$thesame,
'kategoria/podstrona1'=>$active,
'kategoria/podstrona2'=>$thesame,
'kategoria/podstrona3'=>$thesame,
'kategoria/podstrona4'=>$thesame,
'kategoria/podstrona5'=>$thesame,
'kategoria/podstrona6'=>$thesame,
'kategoria/podstrona7'=>$thesame,

);
echo $buttonleft1[$podstrona];}
/**Buttonleft2**/
function buttonleft2(){
global $podstrona,$path;
$thesame='<li><a href="'.$path.'kategoria/podstrona2.php" title="">Cennik</a></li>';
$active='<li class="active"><a href="'.$path.'kategoria/podstrona2.php" title="">Cennik</a></li>';
$buttonleft2=array(
'kategoria/index'=>$thesame,
'kategoria/podstrona1'=>$thesame,
'kategoria/podstrona2'=>$active,
'kategoria/podstrona3'=>$thesame,
'kategoria/podstrona4'=>$thesame,
'kategoria/podstrona5'=>$thesame,
'kategoria/podstrona6'=>$thesame,
'kategoria/podstrona7'=>$thesame,

);
echo $buttonleft2[$podstrona];}
/**Buttonleft3**/
function buttonleft3(){
global $podstrona,$path;
$thesame='<li><a href="'.$path.'kategoria/podstrona3.php" title="">Regulamin</a></li>';
$active='<li class="active"><a href="'.$path.'kategoria/podstrona3.php" title="">Regulamin</a></li>';
$buttonleft3=array(
'kategoria/index'=>$thesame,
'kategoria/podstrona1'=>$thesame,
'kategoria/podstrona2'=>$thesame,
'kategoria/podstrona3'=>$active,
'kategoria/podstrona4'=>$thesame,
'kategoria/podstrona5'=>$thesame,
'kategoria/podstrona6'=>$thesame,
'kategoria/podstrona7'=>$thesame,

);
echo $buttonleft3[$podstrona];}
/**Buttonleft4**/
function buttonleft4(){
global $podstrona,$path;
$thesame='<li><a href="'.$path.'kategoria/podstrona4.php" title="">Kontakt</a></li>';
$active='<li class="active"><a href="'.$path.'kategoria/podstrona4.php" title="">Kontakt</a></li>';
$buttonleft4=array(
'kategoria/index'=>$thesame,
'kategoria/podstrona1'=>$thesame,
'kategoria/podstrona2'=>$thesame,
'kategoria/podstrona3'=>$thesame,
'kategoria/podstrona4'=>$active,
'kategoria/podstrona5'=>$thesame,
'kategoria/podstrona6'=>$thesame,
'kategoria/podstrona7'=>$thesame,

);
echo $buttonleft4[$podstrona];}
/**Buttonleft5**/
function buttonleft5(){
global $podstrona,$path;
$thesame='<li><a href="'.$path.'podstrona/przegladzamowienia.php" title="">Przeglądaj zamówienia</a></li>';
$active='<li class="active"><a href="'.$path.'podstrona/przegladzamowienia.php" title="">Przeglądaj zamówienia</a></li>';
$buttonleft5=array(
'kategoria/index'=>$thesame,
'kategoria/podstrona1'=>$thesame,
'kategoria/podstrona2'=>$thesame,
'kategoria/podstrona3'=>$thesame,
'kategoria/podstrona4'=>$thesame,
'kategoria/podstrona5'=>$thesame,
'kategoria/podstrona6'=>$thesame,
'kategoria/podstrona7'=>$thesame,
'podstrona/przegladzamowienia'=>$active,
'podstrona/mojprofil'=>$thesame,

);
echo $buttonleft5[$podstrona];}
/**Buttonleft6**/
function buttonleft6(){
global $podstrona,$path;
$thesame='<li><a href="'.$path.'podstrona/mojprofil.php" title="">Mój Profil</a></li>';
$thesame='<li><a href="'.$path.'podstrona/mojprofil.php" title="">Mój Profil</a></li>';
$active='<li class="active"><a href="'.$path.'podstrona/mojprofil.php" title="">Mój Profil</a></li>';
$buttonleft6=array(
'kategoria/index'=>$thesame,
'kategoria/podstrona1'=>$thesame,
'kategoria/podstrona2'=>$thesame,
'kategoria/podstrona3'=>$thesame,
'kategoria/podstrona4'=>$thesame,
'kategoria/podstrona5'=>$thesame,
'kategoria/podstrona6'=>$thesame,
'kategoria/podstrona7'=>$thesame,
'podstrona/przegladzamowienia'=>$thesame,
'podstrona/mojprofil'=>$active,

);
echo $buttonleft6[$podstrona];}
/**Buttonleft7**/
function buttonleft7(){
global $podstrona,$path;
$thesame='<li><a href="'.$path.'kategoria/podstrona7.php" title="">Podstrona 7</a></li>';
$active='<li class="active"><a href="'.$path.'kategoria/podstrona7.php" title="">Podstrona 7</a></li>';
$buttonleft7=array(
'kategoria/index'=>$thesame,
'kategoria/podstrona1'=>$thesame,
'kategoria/podstrona2'=>$thesame,
'kategoria/podstrona3'=>$thesame,
'kategoria/podstrona4'=>$thesame,
'kategoria/podstrona5'=>$thesame,
'kategoria/podstrona6'=>$thesame,
'kategoria/podstrona7'=>$active,

);
echo $buttonleft7[$podstrona];}
/**Buttonleftblank**/
function buttonleftblank(){
global $podstrona,$path;
$thesame='<li class="blank"></li>';
$buttonleftblank=array(
'kategoria/index'=>$thesame,
'kategoria/podstrona1'=>$thesame,
'kategoria/podstrona2'=>$thesame,
'kategoria/podstrona3'=>$thesame,
'kategoria/podstrona4'=>$thesame,
'kategoria/podstrona5'=>$thesame,
'kategoria/podstrona6'=>$thesame,
'kategoria/podstrona7'=>$thesame,

);
echo $buttonleftblank[$podstrona];}
?>