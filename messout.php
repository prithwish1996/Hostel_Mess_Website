<?php
session_start();
if($_SESSION['prcommlogin'] != "1")
 {
   // session_destroy();
   echo"<script> window.open('login.php','_self');</script>";
 }
 else
 {
include 'dbconnect.php';

$query5="UPDATE messout set messout=1 where id=1";
mysqli_query($link,$query5);

$query_for_reduction="SELECT * from reduction";   //code for updating reduction db when join happens
$reduced=mysqli_query($link,$query_for_reduction);
while($rowred=mysqli_fetch_row($reduced))
{
 if(($rowred[1]<3)&&($rowred[2]==1))
 {
  $query3="UPDATE reduction SET count=0,active=0 where ID='$rowred[0]'";
  mysqli_query($link,$query3);
 }
 else if (($rowred[1]>=3)&&($rowred[2]==1))
 {
  $query4="UPDATE reduction SET count=0,active=0,total=total+'$rowred[1]' where ID='$rowred[0]'";
  mysqli_query($link,$query4);
 }
}


$query_for_join="SELECT * from messjoin";   //code for updating reduction db when join happens
$joined=mysqli_query($link,$query_for_join);
while($rowred=mysqli_fetch_row($joined))
{
  $query3="UPDATE messjoin SET active=0 where ID='$rowred[0]'";
  mysqli_query($link,$query3);
}
echo '<script language="javascript">';
echo 'alert("Mess Out has Been Activated Successfully")';
echo '</script>';
echo"<script>window.open('optioncomm.php','_self');</script>";
}
?>
