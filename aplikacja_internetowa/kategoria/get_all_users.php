<?php
$response = array();
require_once __DIR__ . '/db_connect.php';
$db = new DB_CONNECT();
$result = mysql_query("SELECT * FROM celadyn.USERS") or die(mysql_error ());
if (mysql_num_rows($result) > 0)
 {
    $response["users"] = array();
    while ($row = mysql_fetch_array($result)) {
    $user = array();
    $user["ID"] = $row["ID"];
    $user["nick"] = $row["nick"];
    $user["EMail"] = $row["EMail"];
    $user["LastName"] = $row["LastName"];
	$user["Name"] = $row["Name"];
	$user["City"] = $row["City"];
	$user["PostCode"] = $row["PostCode"];
	$user["Password"] = $row["Password"];
	$user["Phone"] = $row["Phone"];
	$user["Street"] = $row["Street"];
	$user["DLN"] = $row["DLN"];
    array_push($response["users"], $user);
    }
	$response["rows"]=mysql_num_rows($result);
    $response["success"] = 1;
    $response["message"] = "User found";
    $allusers=json_encode($response);

} 
else 
{
    
    $response["success"] = 0;
    $response["message"] = "No userss found";
    echo json_encode($response);
}

$stmt->close;
mysqli_close($link);
return $allusers;

?>



