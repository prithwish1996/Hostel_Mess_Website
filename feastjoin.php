<?php session_start();
?>
<HTML>
<head>
<title>Athulya Girls Hostel</title>
<link rel="stylesheet" href="join3.css">
</head>
<body>
<div class="background"></div>
<strong>  <a href="optioncomm.php">Home/</a><a href="feasthome.php">MessFeast/</a><a href="feastjoinhome.php">FeastJoinHome/</a><a href="feastjoin.php">FeastJoin/</a></strong>
  <p><strong></strong></p>
<h2 align="center"><b><u>FEAST JOIN</u></b></h2>

<form action="feastjoin.php" method="post">
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
 $successmsg="ID SUCCESSFULLY JOINED";
 
 if(isset($_POST['submit']))
 {

    $id = $_POST['MessID'];
    $query999 = "select * from feastactivate";
    $q999 = mysqli_query($link,$query999);
    $flag999=0;
    while($row999 = mysqli_fetch_array($q999))
    {
      if($row999[0]==0)
      {
        $flag999=1;
      }
    }
    $query99 = "select * from feastout";
    $flag99=0;
    $q99 = mysqli_query($link,$query99);
    while($row99 = mysqli_fetch_array($q99))
    {
      if($id==$row99[0])
      {

        $flag99=1;
        break;
      }
      
    }
    if($flag999==1)
    {
      echo ' <script type="text/javascript">
     alert("Mess Feast is Not Activated Yet. Please Contact Mess Committee.");
    </script>
  ';
    }
    else if($flag99==1)
    {
      echo ' <script type="text/javascript">
     alert("Sorry You are in the Mess Out List!!!! Please Contact Mess Committee.");
    </script>
  ';
    }
    else{

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
    if($flag1==1)
    {
      echo ' <script type="text/javascript">
     alert("'.$errormsg.'");
    </script>
  ';
    }
    else if($flag2==0)
    {
      echo ' <script type="text/javascript">
     alert("'.$errormsg2.'");
    </script>
  ';
    }
    else{
      $query3 = "insert into feastjoin values('$id','$menu')";
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
}
?>