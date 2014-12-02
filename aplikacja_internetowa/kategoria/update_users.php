<?php
$response = array();
$link=mysqli_connect('localhost', 'root', '', 'celadyn');
$Name=$_POST['Name'];
$LastName=$_POST['LastName'];
$EMail=$_POST['EMail'];
$City=$_POST['City'];
$Street=$_POST['Street'];
$PostCode=$_POST['PostCode'];
$Phone=$_POST['Phone'];
$DLN=$_POST['DLN'];
$sql="update USERS set Name=?, LastName=?, EMail=?, City=?, Street=?, PostCode=?, Phone=? DLN=? where EMail LIKE ?";
$stmt = $link->prepare($sql);
$stmt->bind_param('ssssssss',$Name,$LastName,$EMail,$City,$Street,$PostCode,$Phone,$DLN);
if ($stmt->execute())
{
$response["success"] = 1;
$response["message"]="Zaktulizowano";
$wynik= json_encode($response);
}
else
{
$response["success"] = 0;
$response["message"] = "Blad aktualizacji ";
$wynik= json_encode($response);
}
$stmt->close;
mysqli_close($link);
return $wynik;

?>