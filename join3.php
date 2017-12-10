<?php session_start();
?>
<HTML>
<head>
<title>Mess Join</title>
<link rel="stylesheet" href="join3.css">
</head>
<body>
<div class="background"></div>
<strong>  <a href="optioncomm.php">Home/</a><a href="joinnview.php">MessJoin/</a><a href="join3.php">NormalJoin</a></strong>
<h2 align="center"><b><u>MESS JOIN</u></b></h2>

<form action="join3.php" method="post">
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
 $errormsg="ID ENTERED ALREADY JOINED!";
 $errormsg2="ID NOT FOUND";
 $successmsg="ID SUCCESSFULLY JOINED";

 if(isset($_POST['submit']))
 {

  include 'dbconnect.php';
  $userchecker=0;
  $flag=1;
  $flagforjoin=0;
  $mid = mysqli_real_escape_string($link, $_POST['MessID']);
  //check for messcut
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
  //mess cut checked
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
  else{


  $menu = mysqli_real_escape_string($link, $_POST['menu']);
  $day=date("d");
  $total=date("t");
  $month=date("n");
  $year=date("Y");
  if($day==$total)
  {
   if($month==12)
   {
    // $day=1;
    $month=1;
    $year+=1;
   } 
   else{
     // $day=1;
   $month+=1;
    }
   $number = cal_days_in_month(CAL_GREGORIAN,"$month", "$year");
   $effective=$number;
  }

  else
  {
   // $day=$day+1;  
   $effective=($total-$day);
  }




  $query2="SELECT ID from users";    //first check with user db
  $users=mysqli_query($link,$query2);
  while($rowuser=mysqli_fetch_array($users))
  {
    if(($rowuser[0]==$mid))
    {
     $userchecker=1; //found in user table

     $query="SELECT * from messjoin";   //check if already joined
     $search=mysqli_query($link,$query);

     while ($row=mysqli_fetch_row($search))
     {
      if(($row[0]==$mid)&&($row[3]==1))  //found in messjoin but active
      {
        echo ' <script type="text/javascript">
          alert("'.$errormsg.'");
         </script>
        ';

       break;  //end searching in messjoin
      }
      else if(($row[0]==$mid)&&($row[3]==0)) //found in messjoin but inactive
      {
         $day= date('d', strtotime(' +1 day'));
        $sql="UPDATE messjoin set active=1 where ID='$mid'";
        $dd= date('Y-m-d', strtotime(' +1 day'));

       $que1 = "INSERT into join_dates(id,dates) values('$mid','$dd') ";
       
       $que2="UPDATE redn_counter SET join_dates='$day',bool=0 where id='$mid'";

       //mysqli_query($link,$que1);
       mysqli_query($link,$que2);
       $que3 = "select * from messjoin where ID='$mid'";
       $rt = mysqli_query($link,$que3);
       while($ry = mysqli_fetch_array($rt))
       {

        $u = $ry[6];
      
        $u = $u.','.$dd;
        // echo $u;
        $que5 = "update messjoin set active=1,dates='$u' where ID='$mid'";
        mysqli_query($link,$que5);
        break;
       }
       $qw = "select * from redn_counter where id='$mid'";
       $qww=mysqli_query($link,$qw);
       $diff=0;
       while($qrow=mysqli_fetch_row($qww))
       {
        $diff = $qrow[1]-$qrow[2];
        break;
       }
       if($diff<3)
       {
        $diff=0;
       }
       $fetchred = "select * from reduction where ID='$mid'";
       $fetchqw = mysqli_query($link,$fetchred);
       while($fetchqrow=mysqli_fetch_row($fetchqw))
       {
        $totalupdate=$fetchqrow[3]+$diff;
        $qu = "update reduction set total=$totalupdate where ID='$mid'";
        mysqli_query($link,$qu);
        break;
       }
        if( mysqli_query($link,$sql))
        {

         echo ' <script type="text/javascript">
           alert("'.$successmsg.'");
          </script>
         ';
        }

        $query_for_reduction="SELECT * from reduction";   //code for updating reduction db when join happens
        $reduced=mysqli_query($link,$query_for_reduction);
        while($rowred=mysqli_fetch_row($reduced))
        {
         if(($rowred[0]==$mid)&&($rowred[1]<3)&&($rowred[2]==1))
         {
          $query3="UPDATE reduction SET count=0,active=0 where ID='$rowred[0]'";
          mysqli_query($link,$query3);
         }
         else if (($rowred[0]==$mid)&&($rowred[1]>=3)&&($rowred[2]==1))
         {
          $query4="UPDATE reduction SET count=0,active=0,total=total+'$rowred[1]' where ID='$rowred[0]'";
          mysqli_query($link,$query4);
         }
        }


        break; //end searching in messjoin
      }
      else
      {
        $day= date('d', strtotime(' +1 day'));
        $dd= date('Y-m-d', strtotime(' +1 day'));
        $sql = "INSERT INTO messjoin (ID, menu,effective,active,late,count,dates) VALUES ('$mid', '$menu','$effective',1,0,0,'$dd')";
       $que1 = "INSERT into join_dates(id,dates) values('$mid','$dd') ";
       $que2="INSERT into redn_counter(id,join_dates,redn_dates,bool) VALUES ('$mid',0,0,0)"; 
      //mysqli_query($link,$que1);
      mysqli_query($link,$que2);
        if(mysqli_query($link, $sql))
        {
         echo ' <script type="text/javascript">
            alert("'.$successmsg.'");
           </script>
         ';
         }

         $query_for_reduction="SELECT * from reduction";   //code for updating reduction db when join happens
         $reduced=mysqli_query($link,$query_for_reduction);
         while($rowred=mysqli_fetch_row($reduced))
         {
          if(($rowred[0]==$mid)&&($rowred[1]<3)&&($rowred[2]==1))
          {
           $query3="UPDATE reduction SET count=0,active=0 where ID='$rowred[0]'";
           mysqli_query($link,$query3);
          }
          else if (($rowred[0]==$mid)&&($rowred[1]>=3)&&($rowred[2]==1))
          {
           $query4="UPDATE reduction SET count=0,active=0,total=total+'$rowred[1]' where ID='$rowred[0]'";
           mysqli_query($link,$query4);
          }
         }


      }


     }
   }
 }

 if($userchecker==0) //not found in user table
 {
  echo ' <script type="text/javascript">
     alert("'.$errormsg2.'");
    </script>
  ';
  }

}
}
}
?>