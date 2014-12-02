<?php

$response = array();
$link=mysqli_connect('localhost','root','','celadyn');
$plate = $_POST['plate'];
$client = $_POST['client'];
$start = $_POST['start'];
$end = $_POST['end'];
$price = $_POST['price'];
$sql= 'insert into rent(Client,Car,Start,End,Price) VALUES (?,?,?,?,?)';
$stmt = $link->prepare($sql);
$stmt->bind_param('sssss',$client,$plate,$start,$end,$price);
if ($stmt->execute())
{
$response["success"] = 1;
$response["message"]="Wypozyczono ";
echo json_encode($response);
}
else
{
$response["success"] = 0;
$response["message"] = "Blad wypozyczenia ";
echo json_encode($response); 
}
$sql='update cars set Rent=1 where Plate LIKE ?';
$stmt = $link->prepare($sql);
$stmt->bind_param('s',$plate);
$stmt->execute();
mysqli_close($link);
?>
