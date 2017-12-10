<?php session_start();
?>
<!doctype html>
<html lang="en">
  <link rel="stylesheet" href="Viewusers.css">
<body>
  <div class="background"></div>
  <strong>  <a href="optionusers.php">Home/</a><a href="interioruser.php">Inmates/</a><a href="Viewusers.php">ViewInmates/</a></strong>
  <p><strong></strong</p>
    <h2 align="center"><b><u>VIEW INMATES</u></b></h2>
  <section>
    <font color="white">
    <form id="form" action="Viewusers.php" method="post">
   <li id="id">
    Enter ID of the Inmate which You want to View <br>
    <br><input type="number" name="id" min="101" required><br>
  </li>
      <li id="submit">
      <input id = "submit" type="submit" name="submit" value="Submit" font-size="20px">
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
  else {

  include "header.php";
  include"dbconnect.php";

  // if(!isset($_SESSION['fromPurchases'])){
  //    //send them back
  //    header("Location: Adminlogin.php");
  // }


  if(isset($_POST['submit']))
  {
    $id = $_POST['id'];
    if(!is_null($id))
    {
      $query = "select ID from users where id='$id'";
      $sql = mysqli_query($link,$query);
      //$c= 101;

      //$row= mysqli_fetch_array($sql);

      //echo"a=$row[0]  b=$row[1]";
      $flag=1;
   while($row = mysqli_fetch_array($sql))
    {


         //echo"<<br>$row[$i]<br>";
        // echo"<br>t $i<br>";
        if(($row[0])==$id)
        {
          //echo"inr<br>";

          $flag=0;
          break;
        }


    }
      //echo"<br>$c";
      $query;
      if($flag==1)
      {
        echo"<h2>No Data Found</h2>";
      }
      else
      {
        echo "<br><br><table border='1'><tr><th>ID</th><th>NAME</th><th>DEPARTMENT</th></th><th>ROOM NO.</th><th>I CARD NO.<th>YEAR</th>";
        $query = "select * from users where id='$id'";
        $sql = mysqli_query($link,$query);
        while($row= mysqli_fetch_array($sql))
        {
          echo "<tr>";
          echo "<td>" . $row[0] . "</td>";
          echo "<td>" . $row[1] . "</td>";
          echo "<td>" . $row[2] . "</td>";
          echo "<td>" . $row[3] . "</td>";
          echo "<td>" . $row[4] . "</td>";
          echo "<td>" . $row[5] . "</td>";
          echo "</tr>";
        }
        echo "</table>";
        echo"<h2>Query Successfull</h2>";

        }

      //echo"<br>$query";



  }
}
}

?>