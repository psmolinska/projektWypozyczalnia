<?php
$response = array();
$link=mysqli_connect('localhost','root','','celadyn');
// check for post data
if (isset($_POST["email"])) 
{
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$sql= 'select EMail,Password from users where EMail LIKE ?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s',$email);
	$stmt->execute();
	$stmt->bind_result($mail,$hash);
if ($stmt->fetch())
{
if(password_verify($pass,$hash))
{
	$response["success"] = 1;
	$response["message"]="Zalogowano";
	echo json_encode($response);
}
else
{
	$response["success"] = 0;
	$response["message"] = "Zle haslo ";
	echo json_encode($response); 

}
}
else
{
	
	$response["success"] = 0;
	$response["message"] = "No user ";
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
