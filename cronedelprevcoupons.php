<?php
include"dbconnect.php";
$date = date('d');
// $date = "4";
if($date%4==0)
{
$query1 = "delete from prevcoupon";
$query2 = "delete from prevlatecoupon";


mysqli_query($link,$query1);
mysqli_query($link,$query2);
$query7 = "ALTER TABLE prevlatecoupon AUTO_INCREMENT = 1";
$query8 = "ALTER TABLE prevcoupon AUTO_INCREMENT = 1";
mysqli_query($link,$query7);
mysqli_query($link,$query8);
echo"Previous and Late Coupons Deleted";
}
else{
	echo"Record is of Less than 3 days so No deletion";
}

 ?>