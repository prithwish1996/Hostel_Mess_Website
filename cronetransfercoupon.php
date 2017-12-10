<?php
include"dbconnect.php";
$query1 = "select * from coupon";
$query2 = "select * from latecoupon";
$r1 = mysqli_query($link,$query1);
$r2 = mysqli_query($link,$query2);
while($row=mysqli_fetch_array($r1))
{
  $query3 = "insert into prevcoupon(dates,Name,room,Menu,Breakfast,Lunch,Tea,TeaSnacks,Snacks,Milk,Dinner) values ('".$row['dates']."','".$row['Name']."','".$row['room']."','".$row['Menu']."',
  '".$row['Breakfast']."','".$row['Lunch']."','".$row['Tea']."','".$row['TeaSnacks']."','".$row['Snacks']."',
  '".$row['Milk']."','".$row['Dinner']."')";
  mysqli_query($link,$query3);
}
while($row=mysqli_fetch_array($r2))
{
  $query4 = "insert into prevlatecoupon(dates,Name,room,Menu,Breakfast,Lunch,Tea,TeaSnacks,Snacks,Milk,Dinner) values ('".$row['dates']."','".$row['Name']."','".$row['room']."','".$row['Menu']."',
  '".$row['Breakfast']."','".$row['Lunch']."','".$row['Tea']."','".$row['TeaSnacks']."','".$row['Snacks']."',
  '".$row['Milk']."','".$row['Dinner']."')";
  mysqli_query($link,$query4);
}

$query5 = "delete from coupon";
$query6 = "delete from latecoupon";
mysqli_query($link,$query5);
mysqli_query($link,$query6);
echo"Successfully Transferred the Coupons in Previous Coupons List";


?>