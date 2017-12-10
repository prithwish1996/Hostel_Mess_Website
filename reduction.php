<?php session_start();
?>
<HTML>
  <link rel="stylesheet" href="reduction.css">
<head>

<title>REDUCTION</title>

</head>
<body>
<div class="background"></div>
<strong>  <a href="optioncomm.php">Home/</a><a href="rednview.php">MessReduction&View/</a><a href="reduction.php">NewReduction/</a></strong>
<form action="reduction.php" method="post">

Mess ID<br>
<input type="text" name="MessID">
<br><br>
<input id="submit" type="submit" name="submit" value="submit">
</form>

<?php
if($_SESSION['prcommlogin'] != "1")
{
  // session_destroy();
  echo"<script> window.open('login.php','_self');</script>";
}
else {

include"header.php";

  $day=date("d");
  $total=date("t");
  $month=date("n");
  $year=date("Y");
  if($day==$total)
  {
   if($month==12)
   {
    $day=1;
    $month=1;
    $year+=1;
   } 
   else{
    $day=1;
   $month+=1;
    }
   $number = cal_days_in_month(CAL_GREGORIAN,"$month", "$year");
   $effective=$number;
  }

  else
  {  $day+=1;
   $effective=($total-$day);
  }

 if(isset($_POST['submit']))
 {

  include 'dbconnect.php';
  $success="SUCCESSFULLY ADDED INTO THE REDUCTION LIST";
  $cuterror="ALREADY IN THE REDUCTION LIST!";
  $finderror="USER NOT JOINED!";
  $mid=mysqli_real_escape_string($link, $_POST['MessID']);
  $flag=0;
  $query='SELECT * from reduction';
  $search=mysqli_query($link,$query);
  while($row=mysqli_fetch_row($search)) //search if id already there in reduction db
  {
   if(($row[0]==$mid)&&($row[2]==1)) //id already in reduction db and active
   {

        echo ' <script type="text/javascript">
             alert("'.$cuterror.'");
        </script>
        ';
      $flag=1;
   	break;
   }

   else if(($row[0]==$mid)&&($row[2]==0))  //id already in db but inactive
   {
    $query="UPDATE reduction SET active=1 where id='$mid'";
    mysqli_query($link,$query);
    $flag=1;
    $dd= date('Y-m-d', strtotime(' +1 day'));
       $que1 = "insert into redn_dates(id,dates) values('$mid','$dd') ";
       $que2="UPDATE redn_counter SET redn_dates='$day',bool=1 where id='$mid'";
       //mysqli_query($link,$que1);
       mysqli_query($link,$que2); 
    echo ' <script type="text/javascript">
             alert("'.$success.'");
        </script>
        ';
        $query2='SELECT id from messjoin';
        $search2=mysqli_query($link,$query2);
        while($row2=mysqli_fetch_array($search2))
        {
          if($row2[0]==$mid)
          {
           $sql="UPDATE messjoin set active=0 where id='$row2[0]'";
           mysqli_query($link,$sql);
           break;
          }
   }
   $que3 = "select * from reduction where ID='$mid'";
       $rt = mysqli_query($link,$que3);
       while($ry = mysqli_fetch_array($rt))
       {

        $u = $ry[4];
      
        $u = $u.','.$dd;
        // echo $u;
        $que5 = "update reduction set dates='$u' where ID='$mid'";
        mysqli_query($link,$que5);
        break;
       }
 }

   else //check if the id is in join list
   {
    $query2='SELECT id from messjoin';
    $search2=mysqli_query($link,$query2);
    while($row2=mysqli_fetch_array($search2))
    {

      if(($row2[0]==$mid))
      {
        $dd= date('Y-m-d', strtotime(' +1 day'));
       $query3="INSERT into reduction (id,count,active,total,dates) values ('$mid',0,1,0,'$dd')";
       $que2="UPDATE redn_counter SET redn_dates='$day',bool=1 where id='$mid'";
       mysqli_query($link,$que2);
       $dd= date('Y-m-d', strtotime(' +1 day'));
       //$que1 = "insert into redn_dates(id,dates) values('$mid','$dd') ";
       // mysqli_query($link,$que1);
       if((mysqli_query($link,$query3)))
       {
       echo ' <script type="text/javascript">
             alert("'.$success.'");
        </script>
        ';
        $query2='SELECT id from messjoin';
        $search2=mysqli_query($link,$query2);
        while($row2=mysqli_fetch_array($search2))
        {
          if($row2[0]==$mid)
          {
           $sql="UPDATE messjoin set active=0 where id='$row2[0]'";
           mysqli_query($link,$sql);
           break;
          }
         }


       }
       $flag=1;
       break;
      }
    }

   }
  }
  if($flag==0)
  {
    echo ' <script type="text/javascript">
             alert("'.$finderror.'");
        </script>
        ';
  }
}
}
?>