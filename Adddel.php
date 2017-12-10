<?php session_start();
?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="Adddel.css">
<body>

  <div class="background"></div>
<strong>  <a href="optionusers.php">Home/</a><a href="interioruser.php">Inmates/</a><a href="Adddel.php">RemoveInmates/</a></strong>
<p><strong></strong</p>

  <section >
<h2 align="center"><b><u>REMOVE INMATES</b></u></h2>
    <form id="form" action="Adddel.php" method="post">
   <li id="id">
    <font color="white">Enter ID of the Inmate You want to Delete</font>
    <br><input type="number" name="id" min="101" ><br>
  </li>
      <li id="submit">
      <input id = "submit" type="submit" name="submit" value="Submit" onclick="return confirm('Are you sure you want to Delete this ID?')" font-size="20px">
    </li>
    </form>

  </section>

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
  include "header.php";
  include"dbconnect.php";
  // mysql_connect("localhost","root","")or die("OOps Unable to connect to the database");
  // mysql_select_db("hostel") or die("No Database Found");

  if(isset($_POST['submit']))
  {
    $id = $_POST['id'];
    if(!is_null($id))
    {
      $query = "select ID from users";
      $sql = mysqli_query($link,$query);
      $flag;
   while($row = mysqli_fetch_array($sql))
    {
        if(($row[0])==$id)
        {
          $flag=0;
          break;
        }
        else {
          $flag=1;

        }

    }

      if($flag==0)
      {echo '<script language="javascript">';
echo 'alert("DATA FOUND")';
echo '</script>';}
      else {
        echo '<script language="javascript">';
  echo 'alert("NO DATA FOUND")';
  echo '</script>';
      }
      $query = "delete from users where id='$id'";
      $query1 = "delete from messjoin where id='$id'";
      $query2 = "delete from dummyeffdays where id='$id'";
      $query3 = "delete from latejoin where id ='$id'";
      $query4 = "delete from milkfirsthalf where id='$id'";
      $query5 = "delete from milksecondhalf where id='$id'";
      $query6 = "delete from reduction where id='$id'";


    if(mysqli_query($link,$query) and mysqli_query($link,$query1) and mysqli_query($link,$query2) and mysqli_query($link,$query3) and mysqli_query($link,$query4) and mysqli_query($link,$query5) and mysqli_query($link,$query6) and $flag==0)
    {
      echo '<script language="javascript">';
echo 'alert("Record DELETED Successfully")';
echo '</script>';
    }
    else {
      echo '<script language="javascript">';
echo 'alert("Record NOT Deleted")';
echo '</script>';
    }
  }
}
}
?>