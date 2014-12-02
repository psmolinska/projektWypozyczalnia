<?php
$response = array();
$link = mysqli_connect('localhost','root','','celadyn');
if (isset($_GET['id'])) 
{
$pid=$_GET['id'];
$sql= "SELECT pid,brand,model,engine,power,equipment,year,plate,body,color,price,rent FROM cars where PID = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param('i',$pid);
$stmt->execute();
$stmt->bind_result($pid,$brand,$model,$engine,$power,$equipment,$year,$plate,$body,$color,$price,$rent);
if($stmt->fetch())
{
        $car = array();
        $car["pid"] = $pid;
        $car["brand"] = $brand;
        $car["model"] = $model;
	   $car["engine"] = $engine;
        $car["power"] = $power;
        $car["equipment"] = $equipment;
        $car["year"] = $year;
        $car["plate"] = $plate;
        $car["body"] = $body;
        $car["color"] = $color;
	   $car["price"] = $price;
	   $car["rent"] = $rent;
        $response["success"] = 1;
        $response["car"] = array();
        array_push($response["car"], $car);
        $wynik = json_encode($response);
      } 
	 else 
	 {
	      $response["success"] = 0;
            $response["message"] = "No car found 1";
            $wynik = json_encode($response);
      }
} 
else 
{
   $response["success"] = 0;
   $response["message"] = "Required field(s) is missing";
   $wynik = json_encode($response);
}
return $wynik;
?>