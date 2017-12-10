<?php session_start();
?>
<html>
<body>
<div class="background"></div>
</body>
</html>
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
if(isset($_POST['view']))
  {

         $id = $_POST['id'];
        $query = "select FINE from users where ID='$id' ";
      $sql = mysqli_query($link,$query);
      $row=mysqli_fetch_array($sql);
	  $due=$row['FINE'];
     

    }
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
//$row= mysqli_num_rows($result);


if( !is_null($result) )    //probably could use isset here or empty
{
  $query5 = "UPDATE users
           SET FINE='$fine'
           WHERE ID='$id'";
  $sql5 = mysqli_query($link,$query5);
  echo"UPDATED SUCCESSFULLY";


}
else
{
    $query3 = "insert into users (FINE) values ('$fine') where ID='$id'";
    $sql1=mysqli_query($link,$query3);
echo"UPDATED";

}
}
else{
  echo"Record not found";
}
}
}

?>
<HTML>
<head>
<title>EDIT FINE</title>
<link rel="stylesheet" href="editdue.css">
</head>
<body>

<strong>  <a href="optionusers.php">Home/</a><a href="interiorfine.php">EditOrViewFine/</a><a href="editfine.php">EditFine</a></strong>
<p><strong></strong</p>
  <h1 align="center"><u>EDIT FINE</u></h1>
<section >

    <form id="form" action="editfine.php" method="post">
   <li id="id">
    &nbsp&nbsp&nbsp&nbsp<font color="white">Enter ID</font>
    <input type="number" name="id" required >
	 <input id = "view" type="submit" name="view" value="View" font-size="20px">
    
    </form>
<section>
<form action="editfine.php" method="post">
<font color="white" id="f">
&nbsp&nbsp&nbsp&nbspMess ID
<input type="text" name="MessID" value="<?php echo@$id?>" readonly>
<br><br>
Total Fine
<input type="number" step="any" name="fineamount" value="<?php echo@$due?>">
<br><br>

</font>
<input id="submit" type="submit" onclick="return confirm('Are you sure you want to UPDATE fine?')" name="submit" value="Submit">
</form>
</setion>
</body>
</HTML>