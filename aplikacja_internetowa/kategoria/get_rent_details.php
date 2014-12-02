<?php
$response = array();
$link = mysqli_connect('localhost', 'root', '', 'celadyn');
$id=$_GET['id'];
$sql= 'SELECT ID,Client,Car,Start,End,Price from rent where ID=?';
$stmt = $link->prepare($sql);
$stmt->bind_param('i',$id);
$stmt->execute();
$stmt->bind_result($id,$client,$car,$start,$end,$price);
if($stmt->fetch())
	{
        $rent = array();
		$rent["id"]= $id;
		$rent["client"]= $client;
        $rent["plate"]= $car;
        $rent["start"] = $start;
        $rent["end"] = $end;
	   $rent["price"] = $price;
        $response["success"] = 1;
        $response["rent"] = array();
        array_push($response["rent"], $rent);
        $wynik=json_encode($response);
     } 
	 else 
	 {
	      $response["success"] = 0;
            $response["message"] = "No rent found ";
           $wynik=json_encode($response);
      }

return $wynik;
?>
