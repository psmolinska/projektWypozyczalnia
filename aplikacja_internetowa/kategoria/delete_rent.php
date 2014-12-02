<?php
$response = array();
$link=mysqli_connect('localhost', 'root', '', 'celadyn');
$id=$_POST['id'];
$sql="DELETE FROM rent where ID=?";
$stmt = $link->prepare($sql);
$stmt->bind_param('i',$id);
if ($stmt->execute())
{
$response["success"] = 1;
$response["message"]="Usunieto";
$wynik= json_encode($response);
}
else
{
$response["success"] = 0;
$response["message"] = "Blad usuwania ";
$wynik= json_encode($response);
}
$stmt->close;
mysqli_close($link);
return $wynik;

?>