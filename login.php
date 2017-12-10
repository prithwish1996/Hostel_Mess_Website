<?php
session_start();
?>
<!doctype html>

<html lang="en">
<link rel="stylesheet" href="login.css">
<body>
  <div class="background"></div>
  <section>
  <font color="white">
    <form id = "form1" name="login"  method="post" accept-charset="utf-8">
      <p id="loginhere"><u>SECRETARY LOGIN</u></p><br>
  <ul style="list-style-type:none">
    <li id="username"><label for="usermail">Username&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
    <input type="text" name="username" placeholder="Enter Username" required></li><br>
    <li id="password"><label for="password">Password&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
    <input type="password" name="password" placeholder="Enter Password" required></li><br>
    <li id="submit">
    <input type="submit" name="submit1" value="SUBMIT"></li>
  </ul>
</form>


<form id = "form2" name="login"  method="post" accept-charset="utf-8">
  <p id="loginhere"><u>COMMITTEE LOGIN</u></p><br>
<ul style="list-style-type:none">
<li id="username"><label for="usermail">Username&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
<input type="text" name="username" placeholder="Enter Username" required></li><br>
<li id="password"><label for="password">Password&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
<input type="password" name="password" placeholder="Enter Password" required></li><br>
<li id="submit">
<input type="submit" name="submit2" value="SUBMIT"></li>
</ul>
</form>
</font>
  </section>
  </html>
  <?php
  include "header.php";
  // include"dbconnect.php";





    //   function func()
    //   {
    //     $link = "<script>window.open('Purchases.php')</script>";
    //     echo "$link";
    // }
  include"dbconnect.php";

  $_SESSION['seclogin'] = "0";
  $_SESSION['prcommlogin'] = "0";
  $_SESSION['expcommlogin'] = "0";

  if(isset($_POST['submit1']))
  {










    $uname = $_POST['username'];
    $pass = $_POST['password'];
    $query = "select * from secpass";
    $q = mysqli_query($link,$query);
    while($row=mysqli_fetch_array($q))
    {
      $u = $row['USERNAME'];
      $p = $row['PASSWORD'];
      if($uname==$u and $pass==$p)
      {
        //session_start();
        //$_SESSION['fromMain'] = "true";
        $_SESSION['seclogin'] = "1";
        echo"<script> window.open('optionusers.php','_self');</script>";
      //  echo "<script> window.location.assign('Purchases.php'); </script>";

      }
      else {

        echo '<script language="javascript">';
        echo 'alert("OOPS!!!! It seems that you have entered Incorrect Username or Password.")';
        echo '</script>';
      }
      break;
    }



}
if(isset($_POST['submit2']))
{

  

  $uname = $_POST['username'];
  $pass = $_POST['password'];
  $query1 = "select * from commpass";
  $q1 = mysqli_query($link,$query1);
  $flag=0;
  while($row=mysqli_fetch_array($q1))
  {
    $u = $row['USERNAME'];
    $p = $row['PASSWORD'];
    $b = $row['BOOLEAN'];
    $l = $row['LAST_DATE'];
    if($uname==$u and $pass==$p)
    {
      if($b=='1')
      {
        $_SESSION['prcommlogin'] = "1";
        echo"<script> window.open('optioncomm.php','_self');</script>";
        $flag=1;
        break;
      }
      else {
        $_SESSION['expcommlogin'] = "1";
        echo"<script> window.open('expcomm.php','_self');</script>";
        $flag=1;
        break;
      }

    }
    if($flag==1)
    break;
  }
  if($flag==0)
  {
    echo '<script language="javascript">';
    echo 'alert("OOPS!!!! It seems that You have Entered Invalid Username or Password.")';
    echo '</script>';
  }

//session_start();
//$_SESSION['fromMain'] = "true";

}

?>