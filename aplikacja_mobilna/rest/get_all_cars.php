<?php
$response = array();
require_once __DIR__ . '/db_connect.php';
$db = new DB_CONNECT();
$result = mysql_query("SELECT * FROM celadyn.cars where rent=0") or die(mysql_error ());
if (mysql_num_rows($result) > 0)
 {
    $response["cars"] = array();
    while ($row = mysql_fetch_array($result)) {
    $car = array();
    $car["pid"] = $row["PID"];
    $car["brand"] = $row["Brand"];
    $car["model"] = $row["Model"];
        //$car["Equipment"] = $row["Equipment"];
       // $car["Year"] = $row["Year"];
       // $car["Plate"] = $row["Plate"];
       // $car["Body"] = $row["Body"];
	  // $car["Color"] = $row["Color"];
    array_push($response["cars"], $car);
    }
    $response["success"] = 1;
    $response["message"] = "Cars found";
    echo json_encode($response);
} 
else 
{
    
    $response["success"] = 0;
    $response["message"] = "No cars found";
    echo json_encode($response);
}
?>



