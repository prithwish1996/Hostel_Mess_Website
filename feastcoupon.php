<?php session_start();
?>
<HTML>
  <link rel="stylesheet" href="coupon2.css">
<head>
<title>Athulya Girls Hostel</title>

</head>
<body>

    <div class="background"></div>
  <strong>  <a href="optioncomm.php">Home/</a><a href="feasthome.php">MessFeast/</a><a href="feastcouponhome.php">FeastCoupon/</a><a href="feastcoupon.php">EnterFeastCoupon/</a></strong>
<h2 align="center"><u>ENTER FEAST COUPON</u></h2>
<p><strong></strong</p>
<section>
<form action="feastcoupon.php" method="post">

&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font size="4%" color="white">Name</font>
<input type="text" name="name">
<br><br>


<font size="4%" color="white">Room No.</font>
<input type="text" name="room">
<br><br>


&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font size="4%" color="white" >Menu</font>
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

<input id="submit" type="submit" name="submit" value="Submit">
</form>
</section>
</body>
</HTML>


<?php
if($_SESSION['prcommlogin'] != "1")
{
  // session_destroy();
  echo"<script> window.open('login.php','_self');</script>";
}
else {

include"dbconnect.php";
include"header.php";
$dates = date('Y-m-d');
 $breakfast=0; $lunch=0; $tea=0; $teasnacks=0; $snacks=0; $dinner=0; $milk=0;
 $successmsg="COUPON ADDED SUCCESSFULLY!";
 $errormsg="ERROR!";

 if(isset($_POST['submit']))
 {
  $query999 = "select * from feastactivate";
    $q999 = mysqli_query($link,$query999);
    $flag999=0;
    while($row999 = mysqli_fetch_array($q999))
    {
      // echo''.$row999[0].'';
      if($row999[0]==0)
      {
        $flag999=1;
      }
    }
if($flag999==1)
    {
      echo ' <script type="text/javascript">
     alert("Mess Feast is Not Activated Yet. Please Contact Mess Committee.");
    </script>
  ';
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
   ++$milk;
  }
  $query="select id from feastcoupon";
  $coupon=1;
  $result=mysqli_query($link,$query);
  while ($row = mysqli_fetch_assoc($result))
  {
   if($coupon==$row["id"])
   {
     ++$coupon;
   }
   else {
     break;
   }
  }
  $id=$coupon;
  if($teasnacks==1)
  {
    $tea=0;
    $snacks=0;
  }

  // echo $id;
  // echo $name;
  // echo $breakfast;
  // echo $snacks;

 $query="INSERT into feastcoupon (id,dates,Name,room,Menu,Breakfast,Lunch,Tea,TeaSnacks,Snacks,Milk,Dinner) VALUES ('$id','$dates','$name','$room','$menu','$breakfast','$lunch','$tea','$teasnacks','$snacks','$milk','$dinner')";
 if(mysqli_query($link,$query))
 {
  echo ' <script type="text/javascript">
             alert("'.$successmsg.'");
            </script>
          ';
 }
 else {
    echo ' <script type="text/javascript">
             alert("'.$errormsg.'");
            </script>
          ';
  }


 }


}
}

 ?>