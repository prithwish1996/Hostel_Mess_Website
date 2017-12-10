<?php session_start();
?>
<?php
if($_SESSION['prcommlogin'] != "1")
{
  // session_destroy();
  echo"<script> window.open('login.php','_self');</script>";
}
else
{
include"dbconnect.php";
$query1 = "delete from feastjoin";
$query2 = "delete from feastcoupon";
$query3 = "delete from feastout";
if(mysqli_query($link,$query1) and mysqli_query($link,$query2) and mysqli_query($link,$query3))
{
	echo ' <script type="text/javascript">
             alert("Deletion of Previous Records of Feast Successful");
            </script>';
}
else{
	echo ' <script type="text/javascript">
             alert("ERROR!!!!");
            </script>';
}

echo"<script>window.open('feasthome.php','_self');</script>";
}





?>