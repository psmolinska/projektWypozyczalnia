<?php 
include('get_current_user.php');
$userdata= json_decode($wynik);
        echo ' <form action="mojprofil.php" method="post">
	<input type="hidden" name="a" value="save" />
Imie:<br /> 
        <input type="text" name="name" value="'.$userdata->users[0]->name.'" /><br />
Nazwisko:<br /> 
        <input type="text" name="surname" value="'.$userdata->users[0]->surname.'" /><br />
Email:<br /> 
       <input type="text" name="email" value="'.$userdata->users[0]->email.'" /><br />
Miasto:<br /> 
        <input type="text" name="city" value="'.$userdata->users[0]->city.'" /><br />
Ulica:<br /> 
        <input type="text" name="street" value="'.$userdata->users[0]->street.'" /><br />
PostCode:<br /> 
        <input type="text" name="postcode" value="'.$userdata->users[0]->post.'" /><br />
Telefon:<br /> 
        <input type="text" name="phone" value="'.$userdata->users[0]->phone.'" /><br />
Numer prawa jazdy:<br /> 
        <input type="text" name="dln" value="'.$userdata->users[0]->DLN.'" /><br />
		<input type="submit" value="Aktualizuj" /> 
        </form>'; 
$a=$_POST['a'];
if($a == 'save') 
{ 
$name=trim($_POST['name']);
$surname=trim($_POST['surname']);
$email=trim($_POST['email']);
$city=trim($_POST['city']);
$street=trim($_POST['street']);
$postcode=trim($_POST['postcode']);
$phone=trim($_POST['phone']);
$DLN=trim($_POST['DLN']);
include('update_user.php');
}


?> 