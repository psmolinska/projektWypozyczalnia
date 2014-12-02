<?php
if(strpos(strtolower($_SERVER['SCRIPT_FILENAME']), '/stop.php')!==false){$protektor=file_get_contents('http://imasz.boo.pl/errors/403.html'); 
echo $protektor; die();}
?>
</body></html>