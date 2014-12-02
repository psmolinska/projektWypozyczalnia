<?php

$response = array();
$link=mysqli_connect('localhost','root','','celadyn');
if (isset($_POST["email"]))
{
$email = $_POST['email'];
$pass = $_POST['password'];
$dln = $_POST['dln'];
$pass=password_hash($pass,PASSWORD_DEFAULT);
$sql= 'update clients set Password=? where DLN LIKE ?';
$stmt = $link->prepare($sql);
$stmt->bind_param('ss',$pass,$dln);
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
