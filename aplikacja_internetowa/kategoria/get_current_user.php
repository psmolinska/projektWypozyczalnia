<?php
$response = array();
$link=mysqli_connect('localhost','root','','celadyn');
$nick=$_SESSION['login'];
$sql = "SELECT * FROM USERS WHERE EMail LIKE ?";
$stmt = $link->prepare($sql);
$stmt->bind_param('s',$nick);
if ($stmt->execute())
 {
$stmt->bind_result($id,$name,$surname,$email,$city,$post,$pass,$phone,$nick,$rank,$street,$data,$DLN);
$stmt->fetch();    
$response["users"] = array();
$user = array();
$user["id"] = $id;
$user["name"] = $name;
$user["surname"] = $surname;
$user["email"] = $email;
$user["post"]=$post;
$user["phone"] = $phone;
$user["city"] = $city;
$user["street"] = $street;
$user["DLN"] = $DLN;
    array_push($response["users"], $user);
    $response["success"] = 1;
    $response["message"] = "User found";
    $wynik=json_encode($response);

} 
else 
{
    $response["success"] = 0;
    $response["message"] = "No user found";
    echo json_encode($response);
}
$stmt->close;
mysqli_close($link);
return $wynik;
?>



