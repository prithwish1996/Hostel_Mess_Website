<?php session_start();
?>
<HTML>
<head>
<title>MILK JOIN</title>
<link rel="stylesheet" href="generate.css">
</head>
<body>
<div class="background"></div>
<strong>  <a href="optioncomm.php">Home/</a><a href="milk.php">MilkJoin/</a>

<form action="milk.php" method="post">
  <font color="white">
 <p id="mj"><u><b>MILK JOIN</b></u></p><br><br>
<p id="id">Mess ID&nbsp&nbsp&nbsp&nbsp
<input type="text" name="id"></p>
<br><br>


<input id="submit" type="submit" name="submit" onclick="return confirm('Are you sure you want to ADD this ID in MILK JOIN?')" value="Submit">
</form>
</font>
</body>
</HTML>



<?php


if($_SESSION['prcommlogin'] != "1")
{
  // session_destroy();

  echo"<script> window.open('login.php','_self');</script>";
}
else
{
include"header.php";
include "dbconnect.php";
if(isset($_POST['submit']))
 {
$id = $_POST['id'];
$mid=$id;
$flagg=0;
  $mont = date('m');
  $pd = date('d');
  $lm = date('t');
  $query9 = "select * from messcut2";
  $rr = mysqli_query($link,$query9);
  while($rrr = mysqli_fetch_array($rr))
  {
    if($mid==$rrr['id'])
    {
      $mon = $rrr['month'];
      if($mon!=$mont or $pd==$lm )
      {
        $flagg=1;
      }
      break;
    }
  }
$flaggg=0;
$query10 = "select * from messout";
$messout = mysqli_query($link,$query10);
while($mrow=mysqli_fetch_array($messout))
{
  if($mrow['messout']==1)
  {
    $flaggg=1;
    break;
  }

}
 $messblock=0;
  $query12 = "select * from messblock";
  $blockquery = mysqli_query($link,$query12);
  while($blockrow = mysqli_fetch_array($blockquery))
  {
    if($mid==$blockrow['id'])
    {
      if($mont==$blockrow['temp'])
      {
        $messblock=1;
      }
      break;
    }
  }
  if($flagg==1)
  {
    echo ' <script type="text/javascript">
      alert("Sorry!!!! This ID cannot join as it is in the MESS CUT LIST. Please Clear the dues.");
     </script>
    ';
  }
else if($flaggg==1)
{
  echo ' <script type="text/javascript">
    alert("Sorry!!!! MESS OUT IS ACTIVATED");
   </script>
  ';
}
else if($messblock==1)
  {
    echo ' <script type="text/javascript">
      alert("Sorry!!!! This ID cannot join as it is in the MESS BLOCK LIST. Please contact Mess Secretary.");
     </script>
    ';
  }
else {

  $system = date('d');
  // $system = "30";
  $ld = date('t');
  $hd = "15";
  $flagmf = 0;
  $flagsf=0;
  if($system<$hd or $system==$ld)
  {
    $query1 = "select * from milkfirsthalf";
    $r = mysqli_query($link,$query1);
    while($row = mysqli_fetch_array($r))
    {
      if($id==$row['id'])
      {
        echo ' <script type="text/javascript">
      alert("This ID is already joined in Milk First Half List");
     </script>
    ';
    $flagmf=1;
    break;
      }

    }
    if($flagmf==0)
    {
      $query2 = "insert into milkfirsthalf values ('$id')";
      if(mysqli_query($link,$query2))
      {echo ' <script type="text/javascript">
      alert("ID is Successfully Added Milk First Half List");
     </script>
    ';}
    else{
      echo ' <script type="text/javascript">
      alert("ERROR!!!!");
     </script>
    ';
    }
    }



  }

else{

  $query3 = "select * from milksecondhalf";
    $r = mysqli_query($link,$query3);
    while($row = mysqli_fetch_array($r))
    {
      if($id==$row['id'])
      {
        echo ' <script type="text/javascript">
      alert("This ID is already joined in Milk Second Half List");
     </script>
    ';
    $flagsf=1;
    break;
      }

    }
    if($flagsf==0)
    {
      $query4 = "insert into milksecondhalf values ('$id')";
      if(mysqli_query($link,$query4))
      {echo ' <script type="text/javascript">
      alert("ID is Successfully Added Milk Second Half List");
     </script>
    ';}
    else{
      echo ' <script type="text/javascript">
      alert("ERROR!!!!");
     </script>
    ';
    }
    }

}



}
}
}
?>