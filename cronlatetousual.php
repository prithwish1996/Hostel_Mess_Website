<?php





include "dbconnect.php";



$sql="UPDATE messjoin set late=0,count=0 where count=1";

mysqli_query($link,$sql);       

 



?> 

