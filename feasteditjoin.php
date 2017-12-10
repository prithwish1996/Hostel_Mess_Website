<?php session_start();
?>
<HTML>
<head>
<title>Athulya Girls Hostel</title>
<link rel="stylesheet" href="join3.css">
</head>
<body>
<div class="background"></div>
<strong>  <a href="optioncomm.php">Home/</a><a href="feasthome.php">MessFeast/</a><a href="feastjoinhome.php">FeastJoinHome/</a><a href="feasteditjoin.php">EditFeastJoin/</a></strong>
<h2 align="center"><b><u>EDIT FEAST JOIN</u></b></h2>

<form action="feasteditjoin.php" method="post">
<font color="white" id="f">
Mess ID
<input type="text" name="MessID">
<br><br>
Menu

<select name="menu">
  <option value="VEG">Veg</option>
  <option value="VE">Veg+Egg</option>
  <option value="VF">Veg+Fish</option>
  <option value="VFC">Veg+FishCurry</option>
  <option value="VFF">Veg+FishFry</option>
  <option value="VC">Veg+Chicken</option>
  <option value="NV">Non.Veg</option>
  <option value="NVE">Non.Veg-Egg</option>
  <option value="NVF">Non.Veg-Fish</option>
  <option value="NVFC">Non.Veg-FishCurry</option>
  <option value="NVFF">Non.Veg-FishFry</option>
  <option value="NVC">Non.Veg-Chicken</option>
</select> <br> <br>
</font>
<input id="submit" type="submit" onclick="return confirm('Are you sure you want to Add this ID in JOIN LIST?')" name="submit" value="Submit">
</form>

</body>
</HTML>


<?php
if($_SESSION['prcommlogin'] != "1")
{
  // session_destroy();
  echo"<script> window.open('login.php','_self');</script>";
}
else {

include"header.php";
include 'dbconnect.php';
 $errormsg="ID ENTERED ALREADY JOINED!";
 $errormsg2="ID NOT FOUND";
 $successmsg="ID SUCCESSFULLY UPDATED";
 
 if(isset($_POST['submit']))
 {
    $id = $_POST['MessID'];
    $menu = $_POST['menu'];
    $query1 = "select * from feastjoin";
    $q1 = mysqli_query($link,$query1);
    $flag1=0;
    while($row1=mysqli_fetch_array($q1))
    {
      if($id==$row1['ID'])
      {
        $flag1=1;
        break;
      }
    }
    $query2 = "select id from users";
    $q2 = mysqli_query($link,$query2);
    $flag2=0;
    while($row2=mysqli_fetch_array($q2))
    {
      if($id==$row2[0])
      {
        $flag2=1;
        break;
      }
      else
      {
        $flag2=0;
      }
    }
    
   if($flag2==0)
    {
      echo ' <script type="text/javascript">
     alert("'.$errormsg2.'");
    </script>
  ';
    }
    else if($flag1==0)
    {
      echo ' <script type="text/javascript">
     alert("The ID has not joined yet.");
    </script>
  ';
    }
    else{
      $query3 = "update feastjoin set Menu='$menu' where ID='$id'";
      $q3 = mysqli_query($link,$query3);
      if($q3)
      {
        echo ' <script type="text/javascript">
     alert("'.$successmsg.'");
    </script>';
      }
    }




 }

 }
?>