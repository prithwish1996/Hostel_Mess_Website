<?php include 'dbconnect.php'; 

 $query="SELECT * from messout where id=1";
 $result=mysqli_query($link,$query);
 while($row=mysqli_fetch_row($result))
 {
  $check=$row[1];	
 }
 if($check==0)
 {	
  $query='SELECT * from reduction';
  $result=mysqli_query($link,$query);
  while ($row=mysqli_fetch_row($result))
  {
   printf ("%s %s\n",$row[0],$row[1]);
   $query2="UPDATE reduction SET count=count+1 WHERE id='$row[0]' AND active=1";
   mysqli_query($link,$query2);
  }
 }
 ?>