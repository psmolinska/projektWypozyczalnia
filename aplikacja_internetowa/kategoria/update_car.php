<?php
$response = array();
$link=mysqli_connect('localhost', 'root', '', 'celadyn');
$pid=$_POST['pid'];
$brand=$_POST['brand'];
$model=$_POST['model'];
$engine=$_POST['engine'];
$power=$_POST['power'];
$equipment=$_POST['equipment'];
$year=$_POST['year'];
$plate=$_POST['plate'];
$body=$_POST['body'];
$color=$_POST['color'];
$price=$_POST['price'];
$rent=$_POST['rent'];
$sql="update cars set Brand=?, Model=?, Engine=?, Power=?, Equipment=?, Year=?, Plate=?, Body=?, Color=?, Price=?, rent=? where PID=?";
$stmt = $link->prepare($sql);
$stmt->bind_param('sssisisssiii',$brand,$model,$engine,$power,$equipment,$year,$plate,$body,$color,$price,$rent,$pid);
if ($stmt->execute())
{
$response["success"] = 1;
$response["message"]="Zaktulizowano";
$wynik= json_encode($response);
}
else
{
$response["success"] = 0;
$response["message"] = "Blad aktualizacji ";
$wynik= json_encode($response);
}
$stmt->close;
mysqli_close($link);
return $wynik;

?>