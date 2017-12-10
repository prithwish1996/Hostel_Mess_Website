<?php session_start();
?>
<HTML>
<head>
<title>Late Join</title>
  <link rel="stylesheet" href="latejoin.css">
</head>
<body>
<div class="background"></div>
<strong>  <a href="optioncomm.php">Home/</a><a href="joinnview.php">MessJoin/</a><a href="late_join.php">LateJoin</a></strong>
<h2 align="center"><b><u>LATE JOIN</u></b></h2>

<form action="late_join.php" method="post">

Mess ID<br>
<input type="text" name="MessID">
<br><br>
MENU<br>
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
<input id="submit" type="submit" name="submit" onclick="return confirm('Are you sure you want to Add this ID in LATE JOIN LIST?')" value="Submit">
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

include "dbconnect.php";
include "header.php";
 $errormsg="ID ENTERED ALREADY JOINED!";
 $errormsg2="ID NOT FOUND";
 $successmsg="ID SUCCESSFULLY JOINED (LATE  JOIN)";
 if(isset($_POST['submit']))
 {





// Escape user inputs for security
  $userchecker=0;
  $flag=1;
  $mid = mysqli_real_escape_string($link, $_POST['MessID']);
  $menu = mysqli_real_escape_string($link, $_POST['menu']);
  $day=date("d");
  $total=date("t");
  $effective=($total-$day);
  $query2='SELECT id from users';
  $users=mysqli_query($link,$query2);
  while($rowuser=mysqli_fetch_array($users))
  {
    if(($rowuser[0]==$mid))
    {
      //check with join db
       $userchecker=1; //variable for validity of presence in user db
       $query='SELECT id from messjoin';
       $search=mysqli_query($link,$query);

       while ($row=mysqli_fetch_array($search))
       {

        if(($row[0]==$mid))
        {
         $flag=0; //already joined
         break;
        }

       }

       if($flag==1) //yet to join
       {


        // attempt insert query execution
        $sql = "INSERT INTO latejoin (id, menu,effective,count) VALUES ('$mid', '$menu','$effective',0)";
         if(mysqli_query($link, $sql))
         {
          echo ' <script type="text/javascript">
             alert("'.$successmsg.'");
            </script>
          ';

           $query_for_reduction="SELECT * from reduction";   //code for updating reduction db when join happens
           $reduced=mysqli_query($link,$query_for_reduction);
           while($rowred=mysqli_fetch_row($reduced))
           {
            if(($rowred[0]==$mid)&&($rowred[1]<3)&&($rowred[2]==1))
            {
             $query3="UPDATE reduction SET count=0,active=0 where id='$rowred[0]'";
             mysqli_query($link,$query3);
            }
            else if (($rowred[0]==$mid)&&($rowred[1]>=3)&&($rowred[2]==1))
            {
             $query4="UPDATE reduction SET count=0,active=0,total=total+'$rowred[1]' where id='$rowred[0]'";
             mysqli_query($link,$query4);
            }
           }

          }

         else
         {
           echo ' <script type="text/javascript">
                alert("'.$errormsg.'");
           </script>
           ';
         }



         mysqli_close($link);
       }

       else
       {
        echo ' <script type="text/javascript">
             alert("'.$errormsg.'");
        </script>
        ';
       }







     //end of check with join db
    }




  }
  if($userchecker==0)
    {
        echo ' <script type="text/javascript">
             alert("'.$errormsg2.'");
        </script>
        ';
    }

 }
 }
 ?>
