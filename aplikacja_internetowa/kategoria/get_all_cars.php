<?php
$response = array();
require_once __DIR__ . '/db_connect.php';
$db = new DB_CONNECT();


if($_SESSION['ranga']==2) {
$result = mysql_query("SELECT * FROM celadyn.cars") or die(mysql_error ());
if (mysql_num_rows($result) > 0)
 {
    $response["cars"] = array();
    while ($row = mysql_fetch_array($result)) {
    $car = array();
    $car["pid"] = $row["PID"];
    $car["brand"] = $row["Brand"];
    $car["model"] = $row["Model"];
    $car["Equipment"] = $row["Equipment"];
    $car["Year"] = $row["Year"];
    $car["Plate"] = $row["Plate"];
    $car["Body"] = $row["Body"];
    $car["Color"] = $row["Color"];
    $car["Engine"]=$row["Engine"];
    $car["Power"]=$row["Power"];
    array_push($response["cars"], $car);
    }
$response["rows"]=mysql_num_rows($result);
    $response["success"] = 1;
    $response["message"] = "Cars found";
    $allcars = json_encode($response);

} 
else 
{
    
    $response["success"] = 0;
    $response["message"] = "No cars found";
    echo json_encode($response);
}
return $allcars;

}

else if ($_SESSION['ranga']==1) {$result = mysql_query("SELECT * FROM cars where rent=0") or die(mysql_error ());
if (mysql_num_rows($result) > 0)
 {
    $response["cars"] = array();
    while ($row = mysql_fetch_array($result)) {
    $car = array();
    $car["pid"] = $row["PID"];
    $car["brand"] = $row["Brand"];
    $car["model"] = $row["Model"];
    $car["Equipment"] = $row["Equipment"];
    $car["Year"] = $row["Year"];
    $car["Plate"] = $row["Plate"];
    $car["Body"] = $row["Body"];
    $car["Color"] = $row["Color"];
    $car["Engine"]=$row["Engine"];
    $car["Power"]=$row["Power"];
    array_push($response["cars"], $car);
    }
$response["rows"]=mysql_num_rows($result);
    $response["success"] = 1;
    $response["message"] = "Cars found";
    $allcars = json_encode($response);

} 
else 
{
    
    $response["success"] = 0;
    $response["message"] = "No cars found";
    echo json_encode($response);
}
return $allcars;}

else if ($_SESSION['ranga']==0) {$result = mysql_query("SELECT * FROM cars where rent=0") or die(mysql_error ());
if (mysql_num_rows($result) > 0)
 {
    $response["cars"] = array();
    while ($row = mysql_fetch_array($result)) {
    $car = array();
    $car["pid"] = $row["PID"];
    $car["brand"] = $row["Brand"];
    $car["model"] = $row["Model"];
    $car["Equipment"] = $row["Equipment"];
    $car["Year"] = $row["Year"];
    $car["Plate"] = $row["Plate"];
    $car["Body"] = $row["Body"];
    $car["Color"] = $row["Color"];
    $car["Engine"]=$row["Engine"];
    $car["Power"]=$row["Power"];
    array_push($response["cars"], $car);
    }
$response["rows"]=mysql_num_rows($result);
    $response["success"] = 1;
    $response["message"] = "Cars found";
    $allcars = json_encode($response);

} 
else 
{
    
    $response["success"] = 0;
    $response["message"] = "No cars found";
    echo json_encode($response);
}
return $allcars;}
?>



