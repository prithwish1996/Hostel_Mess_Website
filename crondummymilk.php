<?php
include"dbconnect.php";
$last_date = date('t');
$pr_date = date('d');
// $pr_date = "30";
if($pr_date==$last_date)
{
$query1="delete from dummymilkfirsthalf";
mysqli_query($link,$query1);
$query2="delete from dummymilksecondhalf";
mysqli_query($link,$query2);

$query3="insert into  dummymilkfirsthalf select * from milkfirsthalf";
mysqli_query($link,$query3);
$query11="delete from dummymilkfirsthalf where id=0";
mysqli_query($link,$query11);
$query4="insert into  dummymilksecondhalf select * from milksecondhalf";
mysqli_query($link,$query4);
$query22="delete from dummymilksecondhalf where id=0";
mysqli_query($link,$query22);

$query5="delete from milkfirsthalf where id!=0";
mysqli_query($link,$query5);
$query6="delete from milksecondhalf where id!=0";
mysqli_query($link,$query6);
echo"Code for Dummy Milk Successfully Run";
}
else{
	echo"This Code runs at end of Every Month @ 9:25pm"; 
}
?>