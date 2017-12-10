<?php
include"dbconnect2.php";
$query = "delete from latejoin";
if(mysql_query($query))
{
  echo"Deleted Successfully from Late Join list";
}
else {
  echo"error";
}
 ?>
