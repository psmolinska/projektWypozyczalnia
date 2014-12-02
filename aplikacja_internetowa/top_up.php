<?php
if(strpos(strtolower($_SERVER['SCRIPT_FILENAME']), '/top_up.php')!==false){$protektor=file_get_contents('http://imasz.boo.pl/errors/403.html'); 
echo $protektor; die();}
?>
<div class="top">
<div class="top-inside">

<div class="h1"><h1><?php @h1(); ?></h1></div>
<div class="menutop">