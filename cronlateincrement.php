<?php


include "dbconnect.php";

   $sql="UPDATE messjoin set count=count+1 where late=1";
   mysqli_query($link,$sql);       
 

?> 
