<?php 
include('get_current_user_rents.php');
$rentlist= json_decode($wynik);
$wiersze=$rentlist->rows;
if($wiersze >= 0) { 
    echo "<table cellpadding=\"2\" border=1>"; 
	
	echo "<tr>";
	echo "<td>L.p.</td>";
	echo "<td>Klient</td>";
	echo "<td>Samochod</td>";
	echo "<td>Start wypozyczenia</td>";
	echo "<td>Koniec Wypozyczenia</td>";
	echo "<td>Cena</td>";
	echo "<td>Stan</td>";
	echo "</tr>";
	
for($i=0; $i <$wiersze; $i++) { 
        echo "<tr>"; 
		
		echo "<td>".($i+1)."</td>";
	
        echo "<td>".$rentlist->rents[$i]->client."</td>"; 
		echo "<td>".$rentlist->rents[$i]->car."</td>"; 
        echo "<td>".$rentlist->rents[$i]->start."</td>"; 
		echo "<td>".$rentlist->rents[$i]->end."</td>"; 
		echo "<td>".$rentlist->rents[$i]->price."</td>";
		echo "<td>".$rentlist->rents[$i]->stan."</td>";
        echo "</tr>"; 

    } 
    echo "</table>"; 
} 

 
?> 