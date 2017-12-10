<?php
include"dbconnect.php";
$query1 = "delete from latecoupon";
$query2 = "delete from coupon";
mysqli_query($link,$query1); 
mysqli_query($link,$query2);

 ?>
