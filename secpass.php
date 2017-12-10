<?php session_start();
?>
<!doctype html>

<html lang="en">
<link rel="stylesheet" href="password.css">
<body>
  <div class="background"></div>
  <strong>  <a href="optionusers.php">Home/</a><a href="interiordepass.php">Password/</a><a href="secpass.php">GenerateSecretoryPassword/</a></strong>
  <section>
  <font color="white">
    <form id = "form1" name="login"  method="post" accept-charset="utf-8">
      <p id="loginhere"><u>SECRETARY PASSWORD CHANGE</u></p><br>
  <ul style="list-style-type:none">
    <li id="username"><label for="usermail" >Username&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
    <input type="text" name="username" placeholder="Enter Username" required></li><br>
    <li id="password"><label for="password" >Password&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
    <input type="password" name="password" placeholder="Enter Password" required></li><br>
    <li id="submit">
    <input type="submit" name="submit1" value="SUBMIT" onclick="return confirm('Are you sure to Change the Password?')"></li>
  </ul>
</form>
  </section>
  </html>
  <?php
  if($_SESSION['seclogin'] != "1")
  {
    // session_destroy();
    echo"<script> window.open('login.php','_self');</script>";
  }
  else
  {
  include"dbconnect.php";
  include "header.php";



    //   function func()
    //   {
    //     $link = "<script>window.open('Purchases.php')</script>";
    //     echo "$link";
    // }
  //mysql_connect("localhost","root","")or die("OOps Unable to connect to the database");
  //mysql_select_db("hostel") or die("No Database Found");
  if(isset($_POST['submit1']))
  {
    $uname = $_POST['username'];
    $pass = $_POST['password'];

//session_start();
//$_SESSION['fromMain'] = "true";
$query1 = "select * from secpass";
$q1 = mysqli_query($link,$query1);
while($row = mysqli_fetch_array($q1))
{
  $u = $row['USERNAME'];
  $p = $row['PASSWORD'];
}
if($pass==$p)
{

  echo '<script language="javascript">';
  echo 'alert("PASSWORD you Entered Matches with the Previous SECRETARY. PLEASE provide different PASSWORD.")';
  echo '</script>';
}
else {
  $query2 = "update secpass set username='$uname', password='$pass'";
  if(mysqli_query($link,$query2))
  {
    echo '<script language="javascript">';
    echo 'alert("PASSWORD HAS BEEN CHANGED. NEW USERNAME is '.$uname.'. NEW PASSWORD IS '.$pass.'")';
    echo '</script>';
  }
  else {
    echo '<script language="javascript">';
    echo 'alert("There is Some error in Changing the Password!!!!!")';
    echo '</script>';
  }
}
  //session_start();
  //$_SESSION['fromMain'] = "true";


}

}
?>