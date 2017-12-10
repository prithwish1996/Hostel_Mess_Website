<?php session_start();
?>
<html>
<body>
<div class="background"></div>
  <strong>  <a href="optioncomm.php">Home/</a><a href="insidecoupon.php">Coupon/</a><a href="editcoupon.php">EditCoupon</a></strong>
  <h2 align="center"><u>EDIT COUPON</u></h2>
  </body>
  </html>
<?php
if($_SESSION['prcommlogin'] != "1")
{
  // session_destroy();
  echo"<script> window.open('login.php','_self');</script>";
}
else {

include"dbconnect.php";
include"header.php";
 $breakfast=0; $lunch=0; $tea=0; $teasnacks=0; $snacks=0; $dinner=0;$milk=0;
 $successmsg="COUPON ADDED SUCCESSFULLY!";
 $errormsg="ERROR!";
  $flag=0;
if(isset($_POST['view']))
  {

         $id = $_POST['srno'];


		  $query0 = "select id from coupon";
      $sql0 = mysqli_query($link,$query0);
      while($row2=mysqli_fetch_array($sql0))
	  {
		 if($row2['id']==$id)
		 {
			 $flag=1;
			 break;
		 }
	  }
		if($flag==1)
		{
       $query = "select * from coupon where id='$id' ";
      $sql = mysqli_query($link,$query);
      $row=mysqli_fetch_array($sql);

	  $name=$row['Name'];
	  $room=$row['room'];
	  $br=$row['Breakfast'];
	  $l=$row['Lunch'];
	  $tea=$row['Tea'];
	  $teas=$row['TeaSnacks'];
	  $snack=$row['Snacks'];
	  $dinner=$row['Dinner'];
          $milk=$row['Milk'];
		}
		else
		{
			echo"<h2>DATA NOT FOUND</h2>";
		}


    }
	 if(isset($_POST['del']))
 {
	 $id=$_POST['srno'];
	 if($id=="")
	 {
		 echo"<h3>Please Enter The Serial Number!!!<h3";
	 }
	 else{
		$que= "DELETE FROM coupon WHERE id='$id'";
		if(mysqli_query($link,$que))
 {

      echo '<script language="javascript">';
echo 'alert("DELETED SUCCESSFULLY ")';
echo '</script>';
    }
    else {
      echo '<script language="javascript">';
echo 'alert("NOT DELETED")';
echo '</script>';
    }
	 }
 }


 if(isset($_POST['submit']))
 {
	 $id=$_POST['srno'];
	 if($id=="")
	 {
		 echo"<h3>Please Enter The Serial Number!!!<h3";
	 }
	 else{
  $name = mysqli_real_escape_string($link, $_POST['name']);
  $room = mysqli_real_escape_string($link, $_POST['room']);
  $menu= mysqli_real_escape_string($link, $_POST['menu']);
  if(isset($_POST['breakfast']))
  {
   $breakfast=mysqli_real_escape_string($link, $_POST['breakfast']);
  }
  if(isset($_POST['lunch']))
  {
   $lunch=mysqli_real_escape_string($link, $_POST['lunch']);
  }
  if(isset($_POST['tea']))
  {
   $tea=mysqli_real_escape_string($link, $_POST['tea']);
  }
  if(isset($_POST['tea+snacks']))
  {
   $teasnacks=mysqli_real_escape_string($link, $_POST['tea+snacks']);
  }
  if(isset($_POST['snacks']))
  {
   $snacks=mysqli_real_escape_string($link, $_POST['snacks']);
  }
  if(isset($_POST['dinner']))
  {
   $dinner=mysqli_real_escape_string($link, $_POST['dinner']);
  }
if(isset($_POST['milk']))
  {
   $milk=mysqli_real_escape_string($link, $_POST['milk']);
  }
  $query="SELECT COUNT(id) as count FROM coupon";
  $result=mysqli_query($link,$query);
  /*while ($row = mysqli_fetch_assoc($result))
  {
   $coupon=$row['count'];
  }
  $id=$coupon+1;*/
  if($teasnacks==1)
  {
    $tea=0;
    $snacks=0;
  }

  // echo $id;
  // echo $name;
  // echo $breakfast;
  // echo $snacks;

 $query = "update coupon set Name='$name',room='$room',Menu='$menu',Breakfast='$breakfast',Lunch='$lunch',Tea='$tea',TeaSnacks='$teasnacks',Snacks='$snacks',Dinner='$dinner',Milk='$milk' where id='$id'";
 if(mysqli_query($link,$query))
 {

      echo '<script language="javascript">';
echo 'alert("UPDATED SUCCESSFULLY ")';
echo '</script>';
    }
    else {
      echo '<script language="javascript">';
echo 'alert("NOT UPDATED")';
echo '</script>';
    }


 }

}
 }
 ?>

<HTML>
  <link rel="stylesheet" href="editcoupon.css">
<head>
<title>Coupon</title>

</head>
<body>


<p><strong></strong</p>
<section>
<form action="editcoupon.php" method="post">
<font size="4%" color="white">Enter Serial No.</font>
<input type="text" name="srno" required>
<input id="view" type="submit" name="view" value="View">
</form>
</section>
<section>
<form action="editcoupon.php" method="post">
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font size="4%" color="white">Sr.No.</font>
<input type="text" name="srno" value="<?php echo @$id;?>" readonly>
<br><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font size="4%" color="white">Name</font>
<input type="text" name="name" value="<?php echo @$name;?>" >
<br><br>


<font size="4%" color="white">Room No.</font>
<input type="text" name="room" value="<?php echo @$room;?>" >
<br><br>


&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font size="4%" color="white">Menu</font>
<select id="menus" name="menu" style="width: 170px">
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
<div id="hi">
<font size="4%" color="white">
Breakfast&nbsp
<input type="checkbox" name="breakfast" value="1">&nbsp&nbsp&nbsp


Lunch&nbsp
<input type="checkbox" name="lunch" value="1">&nbsp&nbsp&nbsp



Tea&nbsp
<input type="checkbox" name="tea" value="1">&nbsp&nbsp&nbsp



Tea+Snacks&nbsp
<input type="checkbox" name="tea+snacks" value="1">&nbsp&nbsp&nbsp



Snacks&nbsp
<input type="checkbox" name="snacks" value="1">&nbsp&nbsp&nbsp


Dinner&nbsp
<input type="checkbox" name="dinner" value="1">&nbsp&nbsp&nbsp
Milk&nbsp
<input type="checkbox" name="milk" value="1">&nbsp&nbsp&nbsp
</font>
<br><br>

</div>

<input id="submit" type="submit" name="submit" value="Submit" onclick="return confirm('Are you sure you want to update coupon?')">
<input id="del" type="submit" name="del" value="Delete" onclick="return confirm('Are you sure you want to Delete Coupon?')">
</form>
</section>
</body>
</HTML>