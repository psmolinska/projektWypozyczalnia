<?php
$response = array();
$link=mysqli_connect('localhost', 'root', '', 'celadyn');
$id=$_POST['id'];
$client=$_POST['login'];
$plate=$_POST['plate'];
$start=$_POST['start'];
$end=$_POST['end'];
$price=$_POST['price'];
$sql="update rent set Client=?, Car=?, Start=?, End=?, Price=? where ID=?";
$stmt = $link->prepare($sql);
$stmt->bind_param('sssssi',$client,$plate,$start,$end,$price,$id);
if ($stmt->execute())
{
$response["success"] = 1;
$response["message"]="Zaktulizowano";
$wynik= json_encode($response);
}
else
{
$response["success"] = 0;
$response["message"] = "Blad aktualizacji ";
$wynik= json_encode($response);
}
$stmt->close;
mysqli_close($link);
return $wynik;

?>