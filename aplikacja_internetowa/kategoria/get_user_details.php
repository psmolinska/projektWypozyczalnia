<?php
$response = array();
$link = mysqli_connect('localhost', 'root', '', 'celadyn');
if (isset($_GET['id'])) 
{
$ID=$_GET['id'];
$sql= "SELECT ID, Name, EMail, LastName, City, PostCode, Phone, DLN FROM USERS where ID = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param('i',$ID);
$stmt->execute();
$stmt->bind_result($ID,$Name,$EMail,$LastName,$City,$PostCode,$Phone,$DLN);
if($stmt->fetch())
{
        $user = array();
        $user["ID"] = $ID;
        $user["Name"] = $Name;
        $user["EMail"] = $EMail;
	   $user["LastName"] = $LastName;
        $user["City"] = $City;
        $user["PostCode"] = $PostCode;
        $user["Phone"] = $Phone;
        $user["DLN"] = $DLN;
        $response["success"] = 1;
        $response["user"] = array();
        array_push($response["user"], $user);
        $wynik = json_encode($response);
      } 
	 else 
	 {
	      $response["success"] = 0;
            $response["message"] = "No user found 1";
            $wynik = json_encode($response);
      }
} 
else 
{
   $response["success"] = 0;
   $response["message"] = "Required field(s) is missing";
 $wynik = json_encode($response);
}

return $wynik;
?>