<?php 
include('get_all_rents.php');
$rentlist= json_decode($allrents);
$wiersze=$rentlist->rows;

if($wiersze >= 0) 
{ 
    echo "<table cellpadding=\"2\" border=1>"; 
	
	echo "<tr>";
	echo "<td>L.p.</td>";
	echo "<td>Klient</td>";
	echo "<td>Samochod</td>";
	echo "<td>Start wypozyczenia</td>";
	echo "<td>Koniec Wypozyczenia</td>";
	echo "<td>Cena</td>";
	echo "<td>Status</td>";
	echo "<td>Akcja</td>";
	echo "</tr>";
	
	for($i=0; $i <$wiersze; $i++) 
	{ 
        echo "<tr>"; 
		echo "<td>".$i."</td>";
        echo "<td>".$rentlist->rent[$i]->Client."</td>"; 
		echo "<td>".$rentlist->rent[$i]->Car."</td>"; 
        echo "<td>".$rentlist->rent[$i]->Start."</td>"; 
		echo "<td>".$rentlist->rent[$i]->End."</td>"; 
		echo "<td>".$rentlist->rent[$i]->Price."</td>";
		echo "<td>".$rentlist->rent[$i]->stan."</td>";

  
        echo "<td> 
		<a href=\"przegladwypozyczen.php?a=del&amp;id={$rentlist->rent[$i]->ID}\">DEL</a> 
       <a href=\"przegladwypozyczen.php?a=edit&amp;id={$rentlist->rent[$i]->ID}\">EDIT</a> 
       <a href=\"przegladwypozyczen.php?a=back&amp;id={$rentlist->rent[$i]->ID}\">RETURN</a> 
	   </td>"; 
        echo "</tr>"; 
    } 
    echo "</table>"; 
} 



$a = trim($_REQUEST['a']); 
$id = trim($_GET['id']); 

if($a == 'edit' and !empty($id)) 
{ 
	include('get_rent_details.php');
	$singlerent=json_decode($wynik);
	echo '<form action="przegladwypozyczen.php" method="post">
		<input type="hidden" name="a" value="saveedit" />
		<input type="hidden" name="id" value="'.$id.'" /> 
	Klient zamawiajacy:<br />
		<input type="text" name="login" value="'.$singlerent->rent[0]->client.'" /><br />  
	Plate:<br /> 
        <input type="text" name="plate" value="'.$singlerent->rent[0]->plate.'" /><br />
	Poczatek:<br /> 
        <input type="date" name="start" value="'.$singlerent->rent[0]->start.'" /><br />
	Koniec:<br /> 
       <input type="date" name="end" value="'.$singlerent->rent[0]->end.'" /><br />
	Cena:<br /> 
        <input type="text" name="price" value="'.$singlerent->rent[0]->price.'" /><br />
	<input type="submit" value="Aktualizuj" /> 
 </form>';
}
elseif($a == 'del') 
{
echo '<form action="przegladwypozyczen.php" method="post">
		<input type="hidden" name="id" value="'.$id.'" />
		<input type="hidden" name="a" value="savedel" />
		Czy napewo chcesz usunac wybrany samochod z bazy?
		<input type="submit" value="Potwierdz" /> 
        </form>';
}
elseif($a == 'back') 
{
include('get_rent_details.php');
$singlerent=json_decode($wynik);
echo '<form action="przegladwypozyczen.php" method="post">
		<input type="hidden" name="plate" value="'.$singlerent->rent[0]->plate.'" />
		<input type="hidden" name="id" value="'.$id.'" />
		<input type="hidden" name="a" value="saveback" />
		<input type="hidden" name="stan" value="CLOSE" />
		Czy napewo chcesz zwrocic wybrany samochod?
		<input type="submit" value="Potwierdz" /> 
        </form>';
}
elseif($a == 'saveedit')
{
$id=$_POST['id'];
$client=trim($_POST['login']);
$plate=trim($_POST['plate']);
$start=trim($_POST['start']);
$end=trim($_POST['end']);
$price=trim($_POST['price']);
include('update_rent.php');
echo "Wpis zaktualizowany";
}
elseif($a == 'savedel') 
{
	$id=$_POST['id'];
	include('delete_rent.php');
	echo "Wpis zostal usuniety";
}
elseif($a == 'saveback') 
{
	$id=$_POST['id'];
	$plate=$_POST['plate'];
	$stan=$_POST['stan'];
	include('patch_car.php');
	echo "Pomyslnie odano samochod";
}
?> 