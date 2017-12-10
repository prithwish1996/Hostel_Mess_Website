<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="valueset.css">
<style>

/*table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 75%;
    margin-left: 25%;

}

td, th {
    border: 0px solid #dddddd;
    text-align: left;
    padding: 8px;
}
.background {
    background:url(bg.jpg);
    /*background-size:cover;*/
    position: fixed;;
    z-index: -1;
    /*top: 0;*/
    /*bottom: 0;
    left: 0;
    right: 0;*/
    opacity: .5;
    width: 100%;
    height: 100%;

}
/*tr:nth-child(even) {
    background-color: #dddddd;
}*/

    select:invalid { color: gray; }*/

</style>
</head>
<body>
  <div class="background"></div>
  <strong>  <a href="optioncomm.php">Home/</a><a href="insidecoupon.php">Coupon/</a><a href="valueset.php">SetAmount/</a></strong>
<?php
if($_SESSION['prcommlogin'] != "1")
{
  // session_destroy();
  echo"<script> window.open('login.php','_self');</script>";
}
else {

include "header.php";
  include"dbconnect2.php";



if(isset($_POST['submit']))
   {
     $queryout = "SELECT `temper` FROM `lastday`";
     $queryrun = mysql_query($queryout);
     $rowa=mysql_fetch_array($queryrun);
     $oldday = $rowa[0];
     $brek = $_POST['breakfast'];
     $lunch = $_POST['lunch'];
     $tea = $_POST['tea'];
     $snacks= $_POST['snacks'];
     $teasnacks = $_POST['teasnacks'];
     $dinner = $_POST['dinner'];
      if(!is_null($brek) && !is_null($lunch) && !is_null($tea) && !is_null($teasnacks) && !is_null($dinner) && !is_null($snacks))
      {
        if($oldday == "mon"){$oldday = 'MONDAY';}
        if($oldday == "tue"){$oldday = 'TUESDAY';}
        if($oldday == "wed"){$oldday = 'WEDNESDAY';}
        if($oldday == "thus"){$oldday = 'THURSDAY';}
        if($oldday == "fri"){$oldday = 'FRIDAY';}
        if($oldday == "sat"){$oldday = 'SATURDAY';}
        if($oldday == "sun"){$oldday = 'SUNDAY';}






          $query5 = "UPDATE valueset2
                   SET BREAKFAST='$brek',LUNCH='$lunch',TEA='$tea',TEA_SNACKS='$teasnacks',DINNER='$dinner',SNACKS='$snacks'
                   WHERE DAYS='$oldday'";
          $sql5 = mysql_query($query5);

    /*    if($_POST['days'] == "mon")
       {
           $query5 = "UPDATE valueset2
                    SET BREAKFAST='$breakfast',LUNCH='$lunch',TEA='$tea',TEA_SNACKS='$teasnacks',DINNER='$dinner'
                    WHERE DAYS='MONDAY'";
           $sql5 = mysql_query($query5);
         }*/



        if($sql5)
         {
           echo"<h2>INSERTED SUCCESSFULLY FOR $oldday</h2><br>";
         }


}
  }

  if(isset($_POST['sun']))
     {
       $newday = $_POST['sun'];
       $queryin = "UPDATE lastday
                SET temper='$newday' ";
       $sqlinp = mysql_query($queryin);

      $query = "select * from valueset2 where DAYS='$newday' ";
    $sql = mysql_query($query);
    $row=mysql_fetch_array($sql);

    $lunch=$row[2];
    $tea=$row[3];
    $teasnacks=$row[4];
    $dinner=$row[5];
      $snacks=$row[6];
      $brek=$row[1];
  //}

  echo "<h3>RATES FOR $newday</h3><br>";

  }
  if(isset($_POST['mon']))
     {
       $newday = $_POST['mon'];
       $queryin = "UPDATE lastday
                SET temper='$newday' ";
       $sqlinp = mysql_query($queryin);

      $query = "select * from valueset2 where DAYS='$newday' ";
    $sql = mysql_query($query);
    $row=mysql_fetch_array($sql);
    $brek=$row[1];
    $lunch=$row[2];
    $tea=$row[3];
    $teasnacks=$row[4];
    $dinner=$row[5];
      $snacks=$row[6];
  //}

  echo "<h3>RATES FOR $newday</h3><br>";

  }
  if(isset($_POST['tue']))
     {
       $newday = $_POST['tue'];
       $queryin = "UPDATE lastday
                SET temper='$newday' ";
       $sqlinp = mysql_query($queryin);

      $query = "select * from valueset2 where DAYS='$newday' ";
    $sql = mysql_query($query);
    $row=mysql_fetch_array($sql);
    $brek=$row[1];
    $lunch=$row[2];
    $tea=$row[3];
    $teasnacks=$row[4];
    $dinner=$row[5];
      $snacks=$row[6];
  //}

  echo "<h3>RATES FOR $newday</h3><br>";

  }
  if(isset($_POST['wed']))
     {
       $newday = $_POST['wed'];
       $queryin = "UPDATE lastday
                SET temper='$newday' ";
       $sqlinp = mysql_query($queryin);

      $query = "select * from valueset2 where DAYS='$newday' ";
    $sql = mysql_query($query);
    $row=mysql_fetch_array($sql);
    $brek=$row[1];
    $lunch=$row[2];
    $tea=$row[3];
    $teasnacks=$row[4];
    $dinner=$row[5];
      $snacks=$row[6];
  //}

  echo "<h3>RATES FOR $newday</h3><br>";

  }
  if(isset($_POST['thus']))
     {
       $newday = $_POST['thus'];
       $queryin = "UPDATE lastday
                SET temper='$newday' ";
       $sqlinp = mysql_query($queryin);

      $query = "select * from valueset2 where DAYS='$newday' ";
    $sql = mysql_query($query);
    $row=mysql_fetch_array($sql);
    $brek=$row[1];
    $lunch=$row[2];
    $tea=$row[3];
    $teasnacks=$row[4];
    $dinner=$row[5];
      $snacks=$row[6];
  //}

  echo "<h3>RATES FOR $newday</h3><br>";

  }
  if(isset($_POST['fri']))
     {
       $newday = $_POST['fri'];
       $queryin = "UPDATE lastday
                SET temper='$newday' ";
       $sqlinp = mysql_query($queryin);

      $query = "select * from valueset2 where DAYS='$newday' ";
    $sql = mysql_query($query);
    $row=mysql_fetch_array($sql);
    $brek=$row[1];
    $lunch=$row[2];
    $tea=$row[3];
    $teasnacks=$row[4];
    $dinner=$row[5];
      $snacks=$row[6];
  //}

  echo "<h3>RATES FOR $newday</h3><br>";

  }
  if(isset($_POST['sat']))
     {
       $newday = $_POST['sat'];
       $queryin = "UPDATE lastday
                SET temper='$newday' ";
       $sqlinp = mysql_query($queryin);

      $query = "select * from valueset2 where DAYS='$newday' ";
    $sql = mysql_query($query);
    $row=mysql_fetch_array($sql);
    $brek=$row[1];
    $lunch=$row[2];
    $tea=$row[3];
    $teasnacks=$row[4];
    $dinner=$row[5];
    $snacks=$row[6];
  //}

  echo "<h3>RATES FOR $newday</h3><br>";

  }
}


?>



  <table>
    <tr>
      <th><b><u>ITEMS</u></b></th>
      <th><b><u>SET VALUE</u></b></th>
       </tr>




<div class = "menuss">
  <tr>

  <form id="days" action="valueset.php" method="post">
      <p align="center">  Enter Days

          <input id = "sun" type="submit" name="sun" value="SUNDAY" font-size="10px">
          <input id = "mon" type="submit" name="mon" value="MONDAY" font-size="10px">
          <input id = "tue" type="submit" name="tue" value="TUESDAY" font-size="10px">
          <input id = "wed" type="submit" name="wed" value="WEDNESDAY" font-size="10px">
          <input id = "thus" type="submit" name="thus" value="THURSDAY" font-size="10px">
          <input id = "sat" type="submit" name="fri" value="FRIDAY" font-size="10px">
          <input id = "sat" type="submit" name="sat" value="SATURDAY" font-size="10px"></p><hr>


    <tr><td><b>Breakfast</b></td>
    <td><input type="number" id="breakfast" name="breakfast" value="<?php echo @$brek;?>" ></td></tr>
  <tr><td><b>Lunch</b></td>
      <td><input type="number" id="lunch" name="lunch"  value="<?php echo @$lunch;?>"></td></tr>
  <tr><td><b>Tea</b></td>
      <td><input type="number" id="tea" name="tea" value="<?php echo @$tea;?>"></td></tr>
      <tr><td><b>Snacks</b></td>
        <td><input type="number" id="snacks" name="snacks" value="<?php echo @$snacks;?>" ></td></tr>
  <tr><td><b>Tea+Snacks</b></td>
      <td><input type="number" id="teasnacks" name="teasnacks" value="<?php echo @$teasnacks;?>"></td></tr>
  	<tr><td><b>Dinner</b></td>
      <td><input type="number" id="dinner" name="dinner" value="<?php echo @$dinner;?>"></td></tr>

  <tr><td></td>
   <td>
        <input id = "submit" type="submit" name="submit" value="Submit"  font-size="20px">
      </td></tr>


  	</form>
  </tr>
</div>


  </table>


  </body>
  </html>
