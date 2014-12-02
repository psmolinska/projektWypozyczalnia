<?php

$response = array();
$link=mysqli_connect('localhost','root','','celadyn');
if (isset($_POST["email"]))
{
$email = $_POST['email'];
$pass = $_POST['password'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$city = $_POST['city'];
$street = $_POST['street'];
$postcode = $_POST['postcode'];
$phone = $_POST['phone'];
$dln = $_POST['dln'];
$pass=password_hash($pass,PASSWORD_DEFAULT);
$sql= 'insert into users (EMail,Password,Name,LastName,City,PostCode,Street,Phone,DLN) VALUES (?,?,?,?,?,?,?,?,?)';
$stmt = $link->prepare($sql);
$stmt->bind_param('sssssssss',$email,$pass,$name,$lastname,$city,$street,$postcode,$phone,$dln);
if ($stmt->execute())
{
$response["success"] = 1;
$response["message"]="Zarejestrowano";
echo json_encode($response);
}
else
{
$response["success"] = 0;
$response["message"] = "Blad rejestracji ";
echo json_encode($response); 
}
} 
else 
{
$response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
    echo json_encode($response);
}
mysqli_close($link);
?>
