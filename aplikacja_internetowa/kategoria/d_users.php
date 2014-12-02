<?php 
include('get_all_users.php');
$userlist= json_decode($allusers);
$wiersze=$userlist->rows;
if($wiersze >= 0) {
    echo "<table cellpadding=\"2\" border=1>"; 
	
	echo "<tr>";
	echo "<td>Imie</td>";
	echo "<td>Nazwisko</td>";
	echo "<td>Email</td>";
	echo "<td>Miaasto</td>";
	echo "<td>Kod Pocztowy</td>";
	echo "<td>Numer Telefonu</td>";
	echo "<td>Numer prawa jazdy</td>";
	echo "<td>Akcja</td>";
	echo "</tr>";
	
	
for($i=0; $i <$wiersze; $i++) { 
        echo "<tr>"; 
     
  echo "<td>".$userlist->users[$i]->Name."</td>"; 
	echo "<td>".$userlist->users[$i]->LastName."</td>"; 
        echo "<td>".$userlist->users[$i]->EMail."</td>"; 
	echo "<td>".$userlist->users[$i]->City."</td>"; 
	echo "<td>".$userlist->users[$i]->PostCode."</td>";
 echo "<td>".$userlist->users[$i]->Phone."</td>"; 	
 echo "<td>".$userlist->users[$i]->DLN."</td>"; 
        echo "<td> 
<a href=\"listauserow.php?a=del&amp;id={$userlist->users[$i]->ID}\">DEL</a> 
<a href=\"listauserow.php?a=edit&amp;id={$userlist->users[$i]->ID}\">EDIT</a>
       </td>"; 
        echo "</tr>"; 
    } 
    echo "</table>"; 
} 



$a = trim($_REQUEST['a']); 
$id = trim($_GET['id']);


if($a == 'edit' and !empty($id)) { 
    include('get_user_details.php');
 	$userspec = json_decode($wynik);
        echo '<form action="listauserow.php" method="post"> 
        <input type="hidden" name="a" value="saveedit" /> 
        <input type="hidden" name="ID" value="'.$userspec->car[0]->ID.'" /> 
Imie:<br /> 
        <input type="text" name="Name" value="'.$userspec->user[0]->Name.'" /><br />
Naziwsko:<br /> 
        <input type="text" name="LastName" value="'.$userspec->user[0]->LastName.'" /><br />
Email:<br /> 
        <input type="txt" name="EMail" value="'.$userspec->user[0]->EMail.'" /><br />
Miasto:<br /> 
        <input type="text" name="City" value="'.$userspec->user[0]->City.'" /><br />
Kodpocztowy:<br /> 
        <input type="text" name="PostCode" value="'.$userspec->user[0]->PostCode.'" /><br />
Telefon:<br /> 
        <input type="text" name="Phone" value="'.$userspec->user[0]->Phone.'" /><br />
Numer prawa jazdy:<br /> 
        <input type="text" name="DLN" value="'.$userspec->user[0]->DLN.'" /><br />

        <input type="submit" value="popraw" /> 
        </form>'; 
    } 
	
elseif($a == 'del') 
{
echo '<form action="listauserow.php" method="post">
		<input type="hidden" name="ID" value="'.$id.'" />
		<input type="hidden" name="a" value="savedel" />
		Czy napewo chcesz usunac wybranego usera z bazy?
		<input type="submit" value="Potwierdz" /> 
        </form>';
}
elseif($a == 'savedel') 
{
	$ID=$_POST['ID'];
	include('delete_user.php');
}

elseif($a == 'saveedit')
{
$ID=trim($_POST['ID']);
$Name=trim($_POST['Name']);
$LastName=trim($_POST['$LastName']);
$PostCode=trim($_POST['$PostCode']);
$City=trim($_POST['$City']);
$Street=trim($_POST['$Street']);
$Phone=trim($_POST['$Phone']);
$EMail=trim($_POST['$EMail']);
$DLN=trim($_POST['$DLN']);
include('update_users.php');
}

?> 