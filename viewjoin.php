<?php session_start();
?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="viewjoin.css">
<body>
  <div class="background"></div>
  <strong>  <a href="optioncomm.php">Home/</a><a href="joinnview.php">MessJoin/</a><a href="viewjoin.php">ViewJoin</a></strong>
  </html>
  <?php
  if($_SESSION['prcommlogin'] != "1")
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
  //    header("Location: Adminlogin.php");
  // }
      $query1 = "select * from reduction";
      $query = "select ID from messjoin where id!=0";

      $sql1 = mysqli_query($link,$query1);
      $sql = mysqli_query($link,$query);
      $mj = array();
      $re = array();
      $ac = array();
      $jid = array();
      $i=0;
      $j=0;
      $r=0;
      $s=0;
      // if((mysqli_num_rows($sql)==0))
      // {
      //   echo"<br>";
      //   echo"<h2>No data Found in Normal Join</h2>";
      // }

        // echo "<br><br><table border='1'><tr><th>NORMAL JOIN ID's</th></tr>";
      while($row= mysqli_fetch_array($sql))
      {

        $mj[$i++]=$row['ID'];
      }
      while($row=mysqli_fetch_array($sql1))
      {

        $re[$j]=$row['ID'];
        $ac[$j]=$row['active'];
        ++$j;
      }
      $k=0;
      for($r=0; $r<$i; $r++)
      {
        $flag=0;
        for($s=0; $s<$j; $s++)
        {
          if($mj[$r]==$re[$s])
          {
            $flag=1;
            if($ac[$s]==0)
            {
              $jid[$k++]=$mj[$r];
              break;
            }
          else {
            break;
          }

          }
          else {
            $flag=0;
          }

        }
        if($flag==0)
        $jid[$k++]=$mj[$r];
      }
      $r=0;

      echo "<table id='nj' border='4'><tr><th><h3>NORMAL JOIN ID's</h3></th><th><h3>NAMES</h3></th></tr>";
    while($r<$k)
    {

      echo "<tr>";
      echo "<td><p id='jid'>" . $jid[$r] . "</p></td>";
      $querynew = "select NAME from users where ID='$jid[$r]'";
      $qnew=mysqli_query($link,$querynew);
      while($rownew = mysqli_fetch_array($qnew))
      {
        echo "<td><p id='jid'>" . $rownew[0] . "</p></td>";
      }

       echo "</tr>";
      ++$r;
 }
echo"</table>";



     
    $query = "select ID from messjoin where late=1";
    $sql = mysqli_query($link,$query);

    // if((mysql_num_rows($sql)==0))
    // {
    //   echo"<br>";
    //   echo"<h2>No data Found in Late Join</h2>";
    // }
    // else
      echo "<table id='lj' border='4'><tr><th><h3>LATE JOIN ID's</h3></th><th><h3>NAMES</h3></th></tr>";
    while($row= mysqli_fetch_array($sql))
    {

      echo "<tr>";
      echo "<td><p id='row'>" . $row[0] . "</p></td>";
      $querynew = "select NAME from users where ID='$row[0]'";
      $qnew=mysqli_query($link,$querynew);
      while($rownew = mysqli_fetch_array($qnew))
      {
        echo "<td><p id='jid'>" . $rownew[0] . "</p></td>";
      }
      echo "</tr>";
    }
    echo "</table>";
   


}



?>