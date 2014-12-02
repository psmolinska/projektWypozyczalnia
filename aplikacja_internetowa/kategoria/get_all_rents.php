<?php
$response = array();
require_once __DIR__ . '/db_connect.php';
$db = new DB_CONNECT();
$result = mysql_query("SELECT * FROM celadyn.rent") or die(mysql_error ());
if (mysql_num_rows($result) > 0)
 {
    $response["rent"] = array();
    while ($row = mysql_fetch_array($result)) {
    $wyp = array();
    $wyp["ID"] = $row["ID"];
    $wyp["Client"] = $row["Client"];
    $wyp["Car"] = $row["Car"];
    $wyp["Start"] = $row["Start"];
    $wyp["End"] = $row["End"];
    $wyp["Price"] = $row["Price"];
	 $wyp["stan"] = $row["Status"];

    array_push($response["rent"], $wyp);
    }
$response["rows"]=mysql_num_rows($result);
    $response["success"] = 1;
    $response["message"] = "Rents found";
    $allrents = json_encode($response);

} 
else 
{
    
    $response["success"] = 0;
    $response["message"] = "No rents found";
    echo json_encode($response);
}
return $allrents;
?>



