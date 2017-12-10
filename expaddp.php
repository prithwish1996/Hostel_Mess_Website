<?php session_start();
?>
<!doctype html>
<html lang="en">
  <link rel="stylesheet" href="Addp.css">
<body>
  <div class="background"></div>
  <strong>  <a href="expcomm.php">Home/</a><a href="expaddp.php">AddPurchases</a></strong>
  <p><strong></strong</p>
    <h2 align="center"><b><u>ADD PREVIOUS PURCHASES</b></u></h2>
  <section>
    <font color="white">
    <form id="form" action="expaddp.php" method="post">
      <li id="date">
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEnter Date&nbsp&nbsp&nbsp&nbsp
      <input type="date"  name="date" required><br>
    </li>
    <li id="exp">
      &nbspEnter Expenditure Paid&nbsp&nbsp&nbsp
      <input type="number" step="any"  name="exp" min="0" ><br>
</li>
<li id="exu">
  Enter Expenditure Unpaid
  <input type="number" step="any"  name="exu" min="0" ><br>
</li>
<li id="esp">
  &nbsp&nbsp&nbsp&nbspEnter Establishment Paid&nbsp
  <input type="number" step="any"  name="esp" min="0" ><br>
</li>
<li id="esu">
  Enter Establishment Unpaid
  <input type="number" step="any"  name="esu" min="0" ><br>
</li>
      <li id="submit">
      <input id = "submit" type="submit" name="submit" value="Submit" onclick="return confirm('Are you sure you want to Add the Deatils of Purchases?')" font-size="20px">
    </li>
    </form>
</font>
  </section>
  </html>
  <?php
  if($_SESSION['expcommlogin'] != "1")
  {
    // session_destroy();
    echo"<script> window.open('login.php','_self');</script>";
  }
  else {

  include "header.php";
  include"dbconnect.php";
  //session_start();
  // if(!isset($_SESSION['fromPurchases'])){
  //    //send them back
  //
  //    header("Location: Adminlogin.php");
  // }
  if(isset($_POST['submit']))
  {
    $date = $_POST['date'];
    $exp = $_POST['exp'];
    $exu = $_POST['exu'];
    $esp = $_POST['esp'];
    $esu = $_POST['esu'];
    if(!is_null($date))
    {
      $query = "insert into dummypurchases (Date,Expenditure_Paid,Expenditure_Unpaid,Establishment_Paid,Establishment_Unpaid) values ('$date','$exp','$exu','$esp','$esu')";
    }
    else {
      echo "<h3>Date field cant be left blank</h3>";
    }
    if(mysqli_query($link,$query))
    {
      echo '<script language="javascript">';
echo 'alert("Record INSERTED SUCCESSFULLY")';
echo '</script>';
    }
    else {
      echo '<script language="javascript">';
echo 'alert("NOT INSERTED!!!!! Purchase on same Date Found, Please Delete it or Update it.")';
echo '</script>';
    }
  }
}
?>
