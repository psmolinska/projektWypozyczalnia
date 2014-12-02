<?php 
include('get_all_cars.php');
$carlist= json_decode($allcars);
$wiersze=$carlist->rows;

 if($_SESSION['ranga']==2) {
if($wiersze >= 0) {
    echo "<table cellpadding=\"2\" border=1>"; 
		echo "<tr>";
	echo "<td>Marka</td>";
	echo "<td>Model</td>";
	echo "<td>Wyposazenie</td>";
	echo "<td>Rok Produkcji</td>";
	echo "<td>Nr Rejestracyjny</td>";
	echo "<td>Nadwozie</td>";
	echo "<td>Kolor</td>";
	echo "<td>Silnik</td>";
	echo "<td>Moc</td>";
	echo "<td>Akcja</td>";
	echo "</tr>";
for($i=0; $i <$wiersze; $i++) { 
        echo "<tr>"; 
        echo "<td>".$carlist->cars[$i]->brand."</td>"; 
	echo "<td>".$carlist->cars[$i]->model."</td>"; 
        echo "<td>".$carlist->cars[$i]->Equipment."</td>"; 
	echo "<td>".$carlist->cars[$i]->Year."</td>"; 
	echo "<td>".$carlist->cars[$i]->Plate."</td>";
 echo "<td>".$carlist->cars[$i]->Body."</td>"; 	
 echo "<td>".$carlist->cars[$i]->Color."</td>"; 
 echo "<td>".$carlist->cars[$i]->Engine."</td>"; 
 echo "<td>".$carlist->cars[$i]->Power."</td>"; 
 echo "<td> 
<a href=\"przegladsamochodow.php?a=del&amp;id={$carlist->cars[$i]->pid}\">DEL</a> 
<a href=\"przegladsamochodow.php?a=edit&amp;id={$carlist->cars[$i]->pid}\">EDIT</a>
<a href=\"przegladsamochodow.php?a=rent&amp;id={$carlist->cars[$i]->pid}\">RENT</a> 
       </td>"; 
        echo "</tr>"; 
    } 
    echo "</table>"; 
	echo "<a href=\"przegladsamochodow.php?a=add\">ADD NEW CAR</a>";
} 
$a = trim($_REQUEST['a']); 
$id = trim($_GET['id']);

if($a == 'edit' and !empty($id)) { 
    include('get_car_details.php');
 	$carspec = json_decode($wynik);
        echo '<form action="przegladsamochodow.php" method="post"> 
        <input type="hidden" name="a" value="saveedit" /> 
        <input type="hidden" name="pid" value="'.$carspec->car[0]->pid.'" /> 
Marka:<br /> 
        <input type="text" name="brand" value="'.$carspec->car[0]->brand.'" /><br />
Model:<br /> 
        <input type="text" name="model" value="'.$carspec->car[0]->model.'" /><br />
Silnik:<br /> 
       <input type="text" name="engine" value="'.$carspec->car[0]->engine.'" /><br />
Moc:<br /> 
        <input type="text" name="power" value="'.$carspec->car[0]->power.'" /><br />
Wyposażenie:<br /> 
        <input type="text" name="equipment" value="'.$carspec->car[0]->equipment.'" /><br />
Rok:<br /> 
        <input type="text" name="year" value="'.$carspec->car[0]->year.'" /><br />
Rejestracja:<br /> 
        <input type="text" name="plate" value="'.$carspec->car[0]->plate.'" /><br />
Nadwozie:<br /> 
        <input type="text" name="body" value="'.$carspec->car[0]->body.'" /><br />
Kolor:<br /> 
        <input type="text" name="color" value="'.$carspec->car[0]->color.'" /><br />
Cena:<br /> 
        <input type="text" name="price" value="'.$carspec->car[0]->price.'" /><br />
Stan wypożyczenia:<br /> 
        <input type="text" name="rent" value="'.$carspec->car[0]->rent.'" /><br />
		
        <input type="submit" value="popraw" /> 
        </form>'; 
    } 	
elseif($a == 'add') 
{ 
    include('get_car_details.php');
 	$carspec = json_decode($wynik);
        echo '<form action="przegladsamochodow.php" method="post"> 
        <input type="hidden" name="a" value="saveadd" /> 
Marka:<br /> 
        <input type="text" name="brand" value="'.$carspec->car[0]->brand.'" /><br />
Model:<br /> 
        <input type="text" name="model" value="'.$carspec->car[0]->model.'" /><br />
Silnik:<br /> 
       <input type="text" name="engine" value="'.$carspec->car[0]->engine.'" /><br />
Moc:<br /> 
        <input type="text" name="power" value="'.$carspec->car[0]->power.'" /><br />
Wyposażenie:<br /> 
        <input type="text" name="equipment" value="'.$carspec->car[0]->equipment.'" /><br />
Rok:<br /> 
        <input type="text" name="year" value="'.$carspec->car[0]->year.'" /><br />
Rejestracja:<br /> 
        <input type="text" name="plate" value="'.$carspec->car[0]->plate.'" /><br />
Nadwozie:<br /> 
        <input type="text" name="body" value="'.$carspec->car[0]->body.'" /><br />
Kolor:<br /> 
        <input type="text" name="color" value="'.$carspec->car[0]->color.'" /><br />
Cena:<br /> 
        <input type="text" name="price" value="'.$carspec->car[0]->price.'" /><br />
Stan wypożyczenia:<br /> 
        <input type="text" name="rent" value="'.$carspec->car[0]->rent.'" /><br />
		
        <input type="submit" value="popraw" /> 
        </form>'; 
    } 	
elseif($a == 'del') 
{
echo '<form action="przegladsamochodow.php" method="post">
		<input type="hidden" name="pid" value="'.$id.'" />
		<input type="hidden" name="a" value="savedel" />
		Czy napewo chcesz usunac wybrany samochod z bazy?
		<input type="submit" value="Potwierdz" /> 
        </form>';
}
elseif($a == 'savedel') 
{
	$pid=$_POST['pid'];
	include('delete_car.php');
}
elseif($a == 'rent') 
{
include('get_car_details.php');
$carspec = json_decode($wynik);
echo '<form action="przegladsamochodow.php" method="post">
		<input type="hidden" name="a" value="saverent" />
		<input type="hidden" name="stan" value="OPEN" />
	Klient zamawiajacy:<br />
		<input type="text" name="login" value="'.$_SESSION['login'].'" /><br />  
	Nr rejestracji:<br /> 
        <input type="text" readonly="readonly" name="plate" value="'.$carspec->car[0]->plate.'" /><br />
	Poczatek:<br /> 
        <input type="date" name="start" value="" /><br />
	Koniec:<br /> 
       <input type="date" name="end" value="" /><br />
	Cena:<br /> 
        <input type="text" readonly="readonly" name="price" value="" /><br />
	<input type="submit" value="zamow" /> 
 </form>';
}
elseif($a == 'saveadd')
{
$pid=trim($_POST['pid']);
$brand=trim($_POST['brand']);
$model=trim($_POST['model']);
$engine=trim($_POST['engine']);
$power=trim($_POST['power']);
$equipment=trim($_POST['equipment']);
$year=trim($_POST['year']);
$plate=trim($_POST['plate']);
$body=trim($_POST['body']);
$color=trim($_POST['color']);
$price=trim($_POST['price']);
$rent=trim($_POST['rent']);
include('post_car.php');
echo "Wpis dodany";
}
elseif($a == 'saveedit')
{
$pid=trim($_POST['pid']);
$brand=trim($_POST['brand']);
$model=trim($_POST['model']);
$engine=trim($_POST['engine']);
$power=trim($_POST['power']);
$equipment=trim($_POST['equipment']);
$year=trim($_POST['year']);
$plate=trim($_POST['plate']);
$body=trim($_POST['body']);
$color=trim($_POST['color']);
$price=trim($_POST['price']);
$rent=trim($_POST['rent']);
include('update_car.php');
echo "Wpis zaktualizowany";
}
elseif($a == 'saverent') 
{
$stan=trim($_POST['stan']);
$plate=trim($_POST['plate']);
$start=trim($_POST['start']);
$end=trim($_POST['end']);
$price=trim($_POST['price']);
include('rent.php');
echo 'Samochod zostal wypozyczony'; 
}
}

else if ($_SESSION['ranga']==1) {
if($wiersze >= 0) {
    echo "<table cellpadding=\"2\" border=1>"; 
	
	echo "<tr>";
	echo "<td>Marka</td>";
	echo "<td>Model</td>";
	echo "<td>Wyposazenie</td>";
	echo "<td>Rok Produkcji</td>";
	echo "<td>Nr Rejestracyjny</td>";
	echo "<td>Nadwozie</td>";
	echo "<td>Kolor</td>";
	echo "<td>Silnik</td>";
	echo "<td>Moc</td>";
	echo "<td>Akcja</td>";
	echo "</tr>";
	
for($i=0; $i <$wiersze; $i++) { 
        echo "<tr>"; 
//echo "<td>".$i."</td>";
        echo "<td>".$carlist->cars[$i]->brand."</td>"; 
	echo "<td>".$carlist->cars[$i]->model."</td>"; 
        echo "<td>".$carlist->cars[$i]->Equipment."</td>"; 
	echo "<td>".$carlist->cars[$i]->Year."</td>"; 
	echo "<td>".$carlist->cars[$i]->Plate."</td>";
 echo "<td>".$carlist->cars[$i]->Body."</td>"; 	
 echo "<td>".$carlist->cars[$i]->Color."</td>"; 
 echo "<td>".$carlist->cars[$i]->Engine."</td>";  
 echo "<td>".$carlist->cars[$i]->Power."</td>";
        echo "<td> 
<a href=\"przegladsamochodow.php?a=rent&amp;id={$carlist->cars[$i]->pid}\">RENT</a> 
       </td>"; 
        echo "</tr>"; 
    } 
    echo "</table>"; 
} 

$a = trim($_REQUEST['a']); 
$id = trim($_GET['id']);

if($a == 'rent') 
{
include('get_car_details.php');
$carspec = json_decode($wynik);
echo '<form action="przegladsamochodow.php" method="post">
	<input type="hidden" name="a" value="saverent" /> 
	<input type="hidden" name="stan" value="OPEN" />
	Klient zamawiajacy:<br />
		<input type="text" name="login" value="'.$_SESSION['login'].'" /><br />  
	Nr rejestracji:<br /> 
        <input type="text" readonly="readonly" name="plate" value="'.$carspec->car[0]->plate.'" /><br />
	Poczatek:<br /> 
        <input type="date" name="start" value="" /><br />
	Koniec:<br /> 
       <input type="date" name="end" value="" /><br />
	Cena:<br /> 
        <input type="text" name="price" value="" /><br />
	<input type="submit" value="zamow" /> 
 </form>';
}
elseif($a == 'saverent') 
{
$stan=trim($_POST['stan']);
$plate=trim($_POST['plate']);
$start=trim($_POST['start']);
$end=trim($_POST['end']);
$price=trim($_POST['price']);
include('rent.php');
echo 'Samochod zostal wypozyczony'; 
}
}
//bez logowania
//else { echo 'Zapraszamy do <a href="../logowanie">logowania lub rejestracji.</a> ';}
//else { echo 'Zapraszamy do <a href="get_all_cars.php">logowania lub rejestracji.</a> ';}
else if ($_SESSION['ranga']==0) {
if($wiersze >= 0) {
    echo "<table cellpadding=\"2\" border=1>"; 
	
	echo "<tr>";
	echo "<td>Marka</td>";
	echo "<td>Model</td>";
	echo "<td>Wyposazenie</td>";
	echo "<td>Rok Produkcji</td>";
	echo "<td>Nr Rejestracyjny</td>";
	echo "<td>Nadwozie</td>";
	echo "<td>Kolor</td>";
	echo "<td>Silnik</td>";
	echo "<td>Moc</td>";
	echo "</tr>";
	
for($i=0; $i <$wiersze; $i++) { 
        echo "<tr>"; 
//echo "<td>".$i."</td>";
        echo "<td>".$carlist->cars[$i]->brand."</td>"; 
	echo "<td>".$carlist->cars[$i]->model."</td>"; 
        echo "<td>".$carlist->cars[$i]->Equipment."</td>"; 
	echo "<td>".$carlist->cars[$i]->Year."</td>"; 
	echo "<td>".$carlist->cars[$i]->Plate."</td>";
 echo "<td>".$carlist->cars[$i]->Body."</td>"; 	
 echo "<td>".$carlist->cars[$i]->Color."</td>"; 
 echo "<td>".$carlist->cars[$i]->Engine."</td>";  
 echo "<td>".$carlist->cars[$i]->Power."</td>";
        echo "</tr>"; 
    } 
    echo "</table>"; 
} 
}

?> 