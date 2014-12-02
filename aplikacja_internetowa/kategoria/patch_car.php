<?php
$response = array();
$link=mysqli_connect('localhost', 'root', '','celadyn');
$id=$_POST['id'];
$plate=$_POST['plate'];
$stan=$_POST['stan'];
$sql="update rent set Status=? where ID=?";
$stmt = $link->prepare($sql);
$stmt->bind_param('si',$stan,$id);
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


$sql="update cars set rent=0 where Plate LIKE ?";
$stmt = $link->prepare($sql);
$stmt->bind_param('s',$plate);
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