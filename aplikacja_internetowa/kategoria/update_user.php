<?php
$response = array();
$link=mysqli_connect('localhost', 'root', '', 'celadyn');
$name=$_POST['name'];
$surname=$_POST['surname'];
$email=$_POST['email'];
$city=$_POST['city'];
$street=$_POST['street'];
$postcode=$_POST['postcode'];
$phone=$_POST['phone'];
$DLN=$_POST['DLN'];

$sql="update users set Name=?, LastName=?, EMail=?, City=?, Street=?, PostCode=?, Phone=? DLN=? where EMail LIKE ?";
$stmt = $link->prepare($sql);
$stmt->bind_param('ssssssss',$name,$surname,$email,$city,$street,$postcode,$phone,$DLN);
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