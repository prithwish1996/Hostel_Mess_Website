<?php session_start();
?>
<html>
<!-- <link rel="stylesheet" href="generate.css"> -->
<link rel="stylesheet" href="viewjoin.css">
<body>
  <div class="background"></div>
<strong><a href="expcomm.php">Home/</a><a href="totalcoupon.php">TotalCouponCharge/</a><a href="extra.php">TotalExtraAmount/</a><a href="milkamount.php">TotalMilkAmount/</a><a href="openstock.php">OpeningStock/</a><a href="closestock.php">Establishment/</a><a href="establishment.php">ClosingStock/</a><a href="milk15.php">MilkforFirst15Days/</a><a href="milk30.php">MilkforSecond15Days/</a><a href="tpgc.php">TotalPermanentGuest/</a><a href="totalfine.php">TotalFine/</a><a href="src.php">SRC</a><a href="generate.php">GeneratePage/</a></strong>

<?php
if($_SESSION['expcommlogin'] != "1")
{
  // session_destroy();
  echo"<script> window.open('login.php','_self');</script>";
}
else {
  # code...

//include"header.php";
include 'dbconnect.php';

if(isset($_POST['src']))
{

 $src = mysqli_real_escape_string($link, $_POST['src']);
 $query = "UPDATE billfactors  SET src='$src' where id=1";
 mysqli_query($link,$query);

}
// echo 'done';

   
  

 $query="SELECT SUM(EXPENDITURE_PAID) as total FROM dummypurchases";
 $result=mysqli_query($link,$query);

 while ($row = mysqli_fetch_assoc($result))
 {
  //  echo $row['total'];
   $totalpaid=$row['total'];
 }



 $query="SELECT SUM(EXPENDITURE_UNPAID) as total FROM dummypurchases";
 $result=mysqli_query($link,$query);

 while ($row = mysqli_fetch_assoc($result))
 {
  //  echo $row['total'];
   $totalunpaid=$row['total'];
 }



 $query="SELECT coupon FROM billfactors where id=1";
 $result=mysqli_query($link,$query);

 while ($row = mysqli_fetch_assoc($result))
 {
  //  echo $row['coupon'];
   $coupon=$row['coupon'];
 }

 $query="SELECT extra FROM billfactors where id=1";
 $result=mysqli_query($link,$query);

 while ($row = mysqli_fetch_assoc($result))
 {
  //  echo $row['extra'];
   $extra=$row['extra'];
 }

 $query="SELECT src FROM billfactors where id=1";
 $result=mysqli_query($link,$query);

 while ($row = mysqli_fetch_assoc($result))
 {
  //  echo $row['extra'];
   $src=$row['src'];
 }


 $query="SELECT milk FROM billfactors where id=1";
 $result=mysqli_query($link,$query);

 while ($row = mysqli_fetch_assoc($result))
 {
  //  echo $row['milk'];
   $milk=$row['milk'];
 }


 $query="SELECT openstock FROM billfactors where id=1";
 $result=mysqli_query($link,$query);

 while ($row = mysqli_fetch_assoc($result))
 {
  //  echo $row['openstock'];
   $openstock=$row['openstock'];
 }


 $query="SELECT closestock FROM billfactors where id=1";
 $result=mysqli_query($link,$query);

 while ($row = mysqli_fetch_assoc($result))
 {
  //  echo $row['closestock'];
   $closestock=$row['closestock'];
 }

 $query="SELECT tpgc FROM billfactors where id=1";
 $result=mysqli_query($link,$query);

 while ($row = mysqli_fetch_assoc($result))
 {
  //  echo $row['closestock'];
   $tpgc=$row['tpgc'];
 }

 // $query="SELECT SUM(FINE) as total FROM users";
 // $result=mysqli_query($link,$query);

 // while ($row = mysqli_fetch_assoc($result))
 // {
 //  //  echo $row['total'];
 //   $fine=$row['total'];
 // }
$query = "select total_fine from billfactors where id=1";
$result=mysqli_query($link,$query);

 while ($row = mysqli_fetch_assoc($result))
 {
  //  echo $row['closestock'];
   $total_fine=$row['total_fine'];
 }


 $query="SELECT COUNT(id) as inmates FROM users";
 $result=mysqli_query($link,$query);

 while ($row = mysqli_fetch_assoc($result))
 {
  //  echo $row['inmates'];
   $inmates=$row['inmates'];
 }

 $query="SELECT SUM(EFFECTIVE_DAYS) as total FROM dummyeffdays";
 $result=mysqli_query($link,$query);

 while ($row = mysqli_fetch_assoc($result))
 {
  //  echo $row['total'];
   $totaleffdays=$row['total'];
 }

 $perday=(($totalpaid+$totalunpaid)-($coupon+$extra+$milk+$total_fine+$tpgc)+($openstock-$closestock))/($totaleffdays);   //calculation of per day rate



 $query="UPDATE billfactors set perday='$perday' where id=1";
 mysqli_query($link,$query);



 $query="SELECT milk15 FROM billfactors where id=1";
 $result=mysqli_query($link,$query);

 while ($row = mysqli_fetch_assoc($result))
 {
  //  echo $row['milk15'];
   $milk15=$row['milk15'];
 }


 $query="SELECT milk30 FROM billfactors where id=1";
 $result=mysqli_query($link,$query);

 while ($row = mysqli_fetch_assoc($result))
 {
  //  echo $row['milk30'];
   $milk30=$row['milk30'];
 }

 //establishment fee calculation


 $query="SELECT SUM(ESTABLISHMENT_PAID) as total FROM dummypurchases";
 $result=mysqli_query($link,$query);

 while ($row = mysqli_fetch_assoc($result))
 {
  //  echo $row['total'];
   $totalpaidestbl=$row['total'];
 }



 $query="SELECT SUM(ESTABLISHMENT_UNPAID) as total FROM dummypurchases";
 $result=mysqli_query($link,$query);

 while ($row = mysqli_fetch_assoc($result))
 {
  //  echo $row['total'];
   $totalunpaidestbl=$row['total'];
 }




 $query="SELECT establishment FROM billfactors where id=1";
 $result=mysqli_query($link,$query);

 while ($row = mysqli_fetch_assoc($result))
 {
  //  echo $row['establishment'];
   $estbl=$row['establishment'];
 }

 $totestbl=($totalpaidestbl+$totalunpaidestbl+$estbl)/(140);


//calculation of personal bill

 $query="SELECT * from users";
 $result=mysqli_query($link,$query);
echo "<table border='4'>";
   echo "<tr>";
   echo "<td><p id='row'>id</p></td>";
   echo "<td><p id='row'>Room</p></td>";
   echo "<td><p id='row'>Name</p></td>";
   echo "<td><p id='row'>Eff.Days</p></td>";
   echo "<td><p id='row'>Per Day</p></td>";
   echo "<td><p id='row'>Eff*P.Day</p></td>";
   echo "<td><p id='row'>Milk</p></td>";
   echo "<td><p id='row'>Establishment</p></td>";
   echo "<td><p id='row'>Mess Bill</p></td>";
   echo "<td><p id='row'>SRC</p></td>";
   echo "<td><p id='row'>GBM FINE</p></td>";
   echo "<td><p id='row'>Due</p></td>";
   echo "<td><p id='row'>After CD Reduction</p></td>";
   echo "<td><p id='row'>Total</p></td>";
   echo "</tr>";
   

   

 while($row=mysqli_fetch_array($result))
 {

  
  $id=$row[0];
  $queryx="SELECT EFFECTIVE_DAYS from dummyeffdays where ID='$id'";
  $resultx=mysqli_query($link,$queryx);

  while($rowx=mysqli_fetch_array($resultx))
  {
   
   if(($rowx['EFFECTIVE_DAYS']>=1)&&($rowx['EFFECTIVE_DAYS']<=5))
   {
    $rowx['EFFECTIVE_DAYS']=5;
    $amount=($rowx['EFFECTIVE_DAYS']*$perday)+($totestbl);
   }
   else
   {
    $amount=($rowx['EFFECTIVE_DAYS']*$perday)+($totestbl);
   }
   if($row[9]==1)
   {
    $amount=$totestbl;
   }

   $query2="SELECT * from dummymilkfirsthalf";
   $result2=mysqli_query($link,$query2);
   $milk=0;

   while($row2=mysqli_fetch_array($result2))
   {
    if($row2[0]==$id)
    {
     $amount=$amount+$milk15;
     $milk=$milk15;
     break;
    }
   }

   $query3="SELECT * from dummymilksecondhalf";
   $result3=mysqli_query($link,$query3);

   
   while($row3=mysqli_fetch_array($result3))
   {
    if($row3[0]==$id)
    {
     $amount=$amount+$milk30;
     $milk=$milk+$milk30;
     break;
    }
   }

   if($row[9]==1)
   {
    $amount=$totestbl;
   }



   $query5="UPDATE users set messbill='$amount' where id='$id'";
   mysqli_query($link,$query5);
   $eff=($rowx['EFFECTIVE_DAYS']*$perday);
   $grandtotal=round($amount+$src+$row[8]+$row[6]+$row[12]+0);
   $mb=$amount;
   $perday=$perday;
   $totestbl=$totestbl;
   if($row[9]==1)  //messblock
   {
    $eff=0;
    $rowx['EFFECTIVE_DAYS']=0;
   }

$dueshown=round($row[12]+$row[6],2);
$rowx['EFFECTIVE_DAYS']=round($rowx['EFFECTIVE_DAYS'],2);
$perday=round($perday,2);
$eff=round($eff,2);
$milk=round($milk,2);
$totestbl=round($totestbl,2);
$mb=round($mb,2);
$src=round($src,2);
$row[8]=round($row[8],2);
$dueshown=round($dueshown,2);
$grandtotal=round($grandtotal,0);
   
   echo"<tr>";
   echo "<td><p id='row'>{$id}</p></td>";
   echo "<td><p id='row'>{$row[3]}</p></td>";
   echo "<td><p id='row'>{$row[1]}</p></td>";
   echo "<td><p id='row'>{$rowx['EFFECTIVE_DAYS']}</p></td>";
   echo "<td> <p id='row'>{$perday}</p></td>";
   echo "<td><p id='row'>{$eff}</p></td>";
   echo "<td><p id='row'>{$milk}</p></td>";
   echo "<td><p id='row'>{$totestbl}</p></td>";
   echo "<td><p id='row'>{$mb}</p></td>";
   echo "<td><p id='row'>{$src}</p></td>";
   echo "<td><p id='row'>{$row[8]}</p></td>";
   echo "<td><p id='row'>{$dueshown}</p></td>";
   echo "<td><p id='row'>0</p></td>";
   echo "<td><p id='row'>{$grandtotal}</p></td>";
   echo "</tr>"; 

 $storedtotal=round(($amount+$src+$row[8]+$row[6]+0),2);
 $query="UPDATE users SET total='$grandtotal' where id='$id'";
 mysqli_query($link,$query);



   

   break;
  }
 }
 echo "</table>";

//to store total column in users


 echo"<h2> <br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspBILL GENERATED SUCCESSFULLY. CLICK ON PRINT BUTTON BELOW.</h2><br><button class='print' onclick='myFunction()'>Print This Page</button><script>function myFunction(){window.print()}</script><br><br>";

}
$que="UPDATE users SET due=0";
$que="UPDATE users SET fine=0";
?>



</body>
</html>