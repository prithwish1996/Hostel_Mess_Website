<?php session_start();
?>
<HTML>
<head>
<title>Mess Join</title>
<link rel="stylesheet" href="join3.css">
</head>
<body>
<div class="background"></div>
<strong>  <a href="optioncomm.php">Home/</a><a href="joinnview.php">MessJoin/</a><a href="editjoin.php">EditJoin</a></strong>
<h2 align="center"><b><u>EDIT NORMAL JOIN</u></b></h2>

<form action="editjoin.php" method="post">
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
<input id="submit" type="submit" onclick="return confirm('Are you sure you want to edit JOIN LIST?')" name="submit" value="Submit">
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
 $errormsg="ID ENTERED ALREADY JOINED!";
 $errormsg2="ID NOT FOUND";
 $successmsg="ID SUCCESSFULLY JOINED";
 if(isset($_POST['submit']))
 {
$flag;
  include 'dbconnect.php';
  $mid=$_POST['MessID'];
   $menu = mysqli_real_escape_string($link, $_POST['menu']);
  $query="select ID from messjoin";
  $result=mysqli_query($link,$query);
  while($rowuser=mysqli_fetch_array($result))
  {
	  if($rowuser['ID']==$mid)
	  {
		 $flag=0;
		 break;
	  }  
	 else {
          $flag=1;
          }

    }

      if($flag==1)
      {
		  echo '<script language="javascript">';
          echo 'alert("DATA NOT FOUND IN MESS JOIN\nRECORD NOT UPDATED")';
		  
          echo '</script>';
      }
      
      
   else if($flag==0)   
	{
$que="update messjoin set Menu='$menu' where ID='$mid'";

    if(mysqli_query($link,$que))
    {
		
      echo '<script language="javascript">';
echo 'alert("Record Updated Successfully")';
echo '</script>';
    }
   
    }
  }
}
  
  
?>