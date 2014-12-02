<?php

$response = array();
$link = mysqli_connect('localhost','root','','celadyn');
$nick=$_SESSION['login'];

$sql= "SELECT * FROM rent where Client LIKE ?";
$stmt = $link->prepare($sql);
$stmt->bind_param('s',$nick);
if($stmt->execute()){
	$stmt->store_result();
	$stmt->bind_result($id,$client,$car,$start,$end,$price,$stan);
	$response["rents"] = array();
	while($stmt->fetch())
	{
	$rent = array();
	$rent["client"] = $client;
    $rent["car"] = $car;
    $rent["start"] = $start;
	$rent["end"] = $end;
    $rent["price"] = $price;
	$rent["stan"] = $stan;
    array_push($response["rents"], $rent);
	}
	$response["rows"]=$stmt->num_rows;
	$response["success"] = 1;
	$response["message"] = "Rent founds";
    $wynik = json_encode($response);
}
else 
{
    
    $response["success"] = 0;
    $response["message"] = "No cars found";
    $wynik = json_encode($response);
}
$stmt->close;
mysqli_close($link);
return $wynik;
?>