<?php session_start();
?>
<HTML>
<head>
<title>EDIT FINE</title>
<link rel="stylesheet" href="join3.css">
</head>
<body>
<div class="background"></div>
<strong>  <a href="optionusers.php">Home/</a><a href="interiorfine.php">EditOrViewFine/</a><a href="editfine.php">AddFine</a></strong>


<form action="addfine.php" method="post">
<font color="white" id="f">
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMess ID
<input type="text" name="MessID" required>
<br><br>
TOTAL FINE
<input type="number" step="any" name="fineamount">
<br><br>

</font>
<input id="submit" type="submit" onclick="return confirm('Are you sure you want to ADD fine?')" name="submit" value="Submit">
</form>

</body>
</HTML>

<?php
if($_SESSION['seclogin'] != "1")
{
  // session_destroy();
  echo"<script> window.open('login.php','_self');</script>";
}
else
{
include"header.php";
include"dbconnect.php";
 $errormsg="ID ENTERED ALREADY JOINED!";
 $errormsg2="ID NOT FOUND";
 $successmsg="ID SUCCESSFULLY JOINED";
 if(isset($_POST['submit']))
 {


  $flag=0;
$id=$_POST['MessID'];
$fine=$_POST['fineamount'];
$sql2="select ID from users";
$result2=mysqli_query($link,$sql2);
while($row2=mysqli_fetch_array($result2))
{
  if($row2[0]==$id)
  {
  $flag=1;
  break;
}
}
if($flag==1)
{
  $query="select FINE from users where ID='$id'";
  $result = mysqli_query($link,$query);
  while($r=mysqli_fetch_array($result))
  {
    $re = $r[0];
    break;
  }
//$row= mysql_num_rows($result);


// if( !is_null($result) )    //probably could use isset here or empty
// {
//   $query5 = "UPDATE users
//            SET FINE='$fine'
//            WHERE ID='$id'";
//   $sql5 = mysql_query($query5);
//   echo"UPDATED SUCCESSFULLY";
//
//
// }
// else
// {
//     $query3 = "insert into users (FINE) values ('$fine') where ID='$id'";
//     $sql1=mysql_query($query3);
// echo"UPDATED";
//
// }
// echo"$re";
$query5 = "UPDATE users
            SET FINE='$fine' + '$re'
            WHERE ID='$id'";
   $sql5 = mysqli_query($link,$query5);
   echo"ADDED SUCCESSFULLY";

}
else{
  echo"Record not found";
}
}
}

?>