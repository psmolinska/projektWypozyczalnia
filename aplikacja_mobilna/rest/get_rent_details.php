<?php
$response = array();
$link=mysqli_connect('localhost','root','','celadyn');
if (isset($_GET['email'])) 
{
$email=$_GET['email'];
$sql= 'SELECT Car,Start,End,Price from rent where Client LIKE ?';
$stmt = $link->prepare($sql);
$stmt->bind_param('s',$email);
$stmt->execute();
$stmt->bind_result($car,$start,$end,$price);
if($stmt->fetch())
{
        $rent = array();
        $rent["plate"]= $car;
        $rent["start"] = $start;
        $rent["end"] = $end;
	   $rent["price"] = $price;
        $response["success"] = 1;
        $response["rent"] = array();
        array_push($response["rent"], $rent);
        echo json_encode($response);
      } 
	 else 
	 {
	      $response["success"] = 0;
            $response["message"] = "No rent found ";
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
