<?php session_start();
?>
<!doctype html>
<html lang="en">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->

  <link rel="stylesheet" href="Addremusers.css">
<body>
  <div class="background"></div>
<strong>  <a href="optionusers.php">Home/</a><a href="interioruser.php">Inmates/</a><a href="Addremusers.php">Add Inmates/</a></strong>
  <p id="hi" align="center"><strong> <u>ADD INMATES</u></strong</p>
  <section>

    <font color="white">
    <form id="form" action="Addremusers.php" method="post">
    <li id="name">
      Enter Full Name&nbsp
      <input type="text" name="name" required><br>
    </li>
      <li id="dept">
      &nbsp&nbspEnter Dept. Name&nbsp
      <input type="text" name="dept" required><br>
    </li>
    <li id="sem">
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEnter Year&nbsp
    <input type="number" name="sem" min="1996" required><br>
  </li>
  <li id="cno">
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEnter Card No
  <input type="number" name="cno" ><br>
</li>
<li id="rno">
&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEnter Room No
<input type="text" name="rno" required><br>
</li>
</li>
<li id="cau">
Enter Caution Deposit
<input type="number" step="any" name="cau"><br>
</li>

      <li id="submit">
      <input id = "submit" type="submit" name="submit" value="Submit" onclick="return confirm('Are you sure you want to add this Student?')" font-size="20px">
    </li>
    </form>
</font>
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
  include "header.php";
  include"dbconnect.php";
  //session_start();
  // if(!isset($_SESSION['fromPurchases'])){
  //    //send them back
  //    header("Location: Adminlogin.php");
  // }
  if(isset($_POST['submit']))
  {
    $name = $_POST['name'];
    $dept = $_POST['dept'];
    $year = $_POST['sem'];
    $cno = $_POST['cno'];
    $cau = $_POST['cau'];
    $rno=$_POST['rno'];

    if(!is_null($name))
    {
      $query = "select ID from users";
      $sql = mysqli_query($link,$query);
      $c= 101;

      //$row= mysqli_fetch_array($sql);

      //echo"a=$row[0]  b=$row[1]";
$i=0;
   while($row = mysqli_fetch_array($sql))
    {


         //echo"<<br>$row[$i]<br>";
        // echo"<br>t $i<br>";
        if(($row[0])==$c)
        {
          //echo"inr<br>";
          $c++;
        }
        else {//echo"dfawfd";
          break;
        }
++$i;
    }
    function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
$password = randomPassword();
      //echo"<br>$c";
      $query = "insert into users (ID,NAME,DEPT,YEAR,ROOM_NO,I_CARD_NO,CAUTION_DEPOSIT,password) values ('$c','$name','$dept','$year','$rno','$cno','$cau','$password')";
      //echo"<br>$query";

    if(mysqli_query($link,$query))
    {
      echo '<script language="javascript">';
echo 'alert("USER SUCCESSFULLY ADDED ID is '.$c.' and Password is '.$password.'")';
echo '</script>';
    }
    else {
      echo '<script language="javascript">';
echo 'alert("NOT INSERTED")';
echo '</script>';
    }
  }
}
}
?>