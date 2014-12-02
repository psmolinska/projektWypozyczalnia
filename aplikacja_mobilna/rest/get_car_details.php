<?php
$response = array();
$link=mysqli_connect('localhost','root','','celadyn');
if (isset($_GET['pid'])) 
{
$pid=$_GET['pid'];
$sql= 'SELECT PID,Brand,Model,Engine,Power,Equipment,Year,Plate,Body,Color,Price FROM cars where PID LIKE ?';
$stmt = $link->prepare($sql);
$stmt->bind_param('s',$pid);
$stmt->execute();
$stmt->bind_result($pid,$brand,$model,$engine,$power,$equipment,$year,$plate,$body,$color,$price);
if($stmt->fetch())
{
        $car = array();
        $car["PID"] = $pid;
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
        $response["success"] = 1;
        $response["car"] = array();
        array_push($response["car"], $car);
        echo json_encode($response);
      } 
	 else 
	 {
	      $response["success"] = 0;
            $response["message"] = "No car found 1";
            echo json_encode($response);
      }
} 
else 
{
   $response["success"] = 0;
   $response["message"] = "Required field(s) is missing";
   echo json_encode($response);
}
?>