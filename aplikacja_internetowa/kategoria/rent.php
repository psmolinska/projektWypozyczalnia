<?php
$response = array();
$link=mysqli_connect('localhost','root', '', 'celadyn');
$stan=$_POST['stan'];
$plate = $_POST['plate'];
$client = $_SESSION['login'];;
$start = $_POST['start'];
$end = $_POST['end'];
$price = $_POST['price'];
$sql= "insert into rent(Client,Car,Start,End,Price,Status) VALUES (?,?,?,?,?,?)";
$stmt = $link->prepare($sql);
$stmt->bind_param('ssssss',$client,$plate,$start,$end,$price,$stan);
if ($stmt->execute())
{
$response["success"] = 1;
$response["message"]="Wypozyczono ";
$wynik= json_encode($response);
}
else
{
$response["success"] = 0;
$response["message"] = "Blad wypozyczenia ";
$wynik= json_encode($response);
$wynik=$price;
return $wynik;
}
$sql='update cars set Rent=1 where Plate = ?';
$stmt = $link->prepare($sql);
$stmt->bind_param('i',$plate);
$stmt->execute();
$stmt->close;
mysqli_close($link);
return $wynik;
?>
