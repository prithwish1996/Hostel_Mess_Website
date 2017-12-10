<?php session_start();
?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="Removep.css">
<body>
  <div class="background"></div>
  <strong>  <a href="optioncomm.php">Home/</a><a href="Purchases.php">Purchases/</a><a href="Removep.php">RemovePurchases</a></strong>
    <h2 align="center"><b><u>REMOVE PURCHASES</u></b></h2>
    <p><strong></strong</p>
  <section>
    <form id="form" action="Removep.php" method="post">
      <li id="date">
      <font color="white">Enter Date for the Purchases to be Removed<br><br></font>
      <input type="date"  name="date" required>
    </li>
      <li id="submit">
      <input id = "submit" type="submit" name="submit" onclick="return confirm('Are you sure you want to REMOVE this PURCHASE?')" value="Submit" font-size="20px">
    </li>
    </form>

  </section>
  </html>
  <?php
  if($_SESSION['prcommlogin'] != "1")
  {
    // session_destroy();
    echo"<script> window.open('login.php','_self');</script>";
  }
  else{
  include"dbconnect.php";
  include "header.php";

  //session_start();
  // if(!isset($_SESSION['fromPurchases'])){
  //    //send them back
  //    header("Location: Adminlogin.php");
  // }
  if(isset($_POST['submit']))
  {
    $date = $_POST['date'];
    $query;
    $flag=0;
    if(!is_null($date))
    {
      $query1 = "select Date from purchases where Date='$date'";
      $q1 = mysqli_query($link,$query1);
      $q11 = mysqli_fetch_array($q1);
      if(empty($q11))
      {
        // echo"No Data Found";
        echo '<script language="javascript">';
        echo 'alert("No Data Found")';
        echo '</script>';
        $flag=1;
      }

    }
    $query = "delete from purchases where Date='$date'";
    if(mysqli_query($link,$query) and $flag==0)
    {
      // echo"<h2>Record Deletion Successfull</h2>";
      echo '<script language="javascript">';
      echo 'alert("Record DELETED Successfully")';
      echo '</script>';
    }
    else {
      echo '<script language="javascript">';
      echo 'alert("Record DELETETION NOT Successfull")';
      echo '</script>';
    }
  }
}
?>