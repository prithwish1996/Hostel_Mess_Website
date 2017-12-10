<?php session_start();
?>
<html>
<link rel="stylesheet" href="generate.css">
<link rel="stylesheet" href="biller.css">
<body>
  <div class="background"></div>
<strong><a href="expcomm.php">Home/</a><a href="totalcoupon.php">TotalCouponCharge/</a><a href="extra.php">TotalExtraAmount/</a><a href="milkamount.php">TotalMilkAmount/</a><a href="openstock.php">OpeningStock/</a><a href="closestock.php">Establishment/</a><a href="establishment.php">ClosingStock/</a><a href="milk15.php">MilkforFirst15Days/</a><a href="milk30.php">MilkforSecond15Days/</a><a href="tpgc.php">TotalPermanentGuest/</a><a href="generate.php">GeneratePage/</a></strong>

<?php
if($_SESSION['expcommlogin'] != "1")
{
  // session_destroy();
  echo"<script> window.open('login.php','_self');</script>";
}
else {
  # code...

include"header.php";
include 'dbconnect.php';

if(isset($_POST['milk30']))
{

 $milk30 = mysqli_real_escape_string($link, $_POST['milk30']);
 $query = "UPDATE billfactors  SET milk30='$milk30' where id=1";
 mysqli_query($link,$query);

}
// echo 'done';

   echo "<table class=biller>";
   echo "<tr>";
   echo "<td class=idc>id</td>";
   echo "<td class=room>Room</td>";
   echo "<td class=nmc>Name</td>";
   echo "<td class=eff>Eff.Days</td>";
   echo "<td class=pd>Per Day</td>";
   echo "<td class=effpd>Eff*P.Day</td>";
   echo "<td class=milk>Milk</td>";
   echo "<td class=estbl>Establishment</td>";
   echo "<td class=mb>Mess Bill</td>";
   echo "<td class=src>SRC</td>";
   echo "<td class=gbm>GBM FINE</td>";
   echo "<td class=due>Due</td>";
   echo "<td class=aftercd>After CD Reduction</td>";
   echo "<td class=total>Total</td>";
   echo "</tr>";
   echo "</table>";

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

 $query="SELECT SUM(FINE) as total FROM users";
 $result=mysqli_query($link,$query);

 while ($row = mysqli_fetch_assoc($result))
 {
  //  echo $row['total'];
   $fine=$row['total'];
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

 $perday=(($totalpaid+$totalunpaid)-($coupon+$extra+$milk+$fine+$tpgc)+($openstock-$closestock))/($totaleffdays);   //calculation of per day rate



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

 $totestbl=($totalpaidestbl+$totalunpaidestbl+$estbl)/($inmates);


//calculation of personal bill

 $query="SELECT * from users";
 $result=mysqli_query($link,$query);

 while($row=mysqli_fetch_array($result))
 {
  $id=$row[0];
  $queryx="SELECT * from dummyeffdays";
  $resultx=mysqli_query($link,$queryx);
  while($rowx=mysqli_fetch_array($resultx))
  {

   if(($rowx[1]>=1)&&($rowx[1]<=5))
   {
    $rowx[1]=5;
    $amount=($rowx[1]*$perday)+($totestbl);
   }
   else
   {
    $amount=($rowx[1]*$perday)+($totestbl);
   }
   if($row[9]==1)
   {
    $amount=$totestbl;
   }

   $query2="SELECT * from milkfirsthalf";
   $result2=mysqli_query($link,$query2);


   while($row2=mysqli_fetch_array($result2))
   {
    if($row2[0]==$id)
    {
     $amount=$amount+$milk15;
     $milk=$milk15;
     break;
    }
   }

   $query3="SELECT * from milksecondhalf";
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
   $eff=round($rowx[1]*$perday);
   $grandtotal=round($amount+$src+$row[8]+$row[6]+0);
   $mb=round($amount);
   $perday=round($perday);
   $totestbl=round($totestbl);
   if($row[9]==1)
   {
    $eff=0;
    $rowx[1]=0;
   }
   echo "<table class=biller>";
   echo "<tr>";
   echo "<td class=idc>{$id}</td>";
   echo "<td class=room>{$row[3]}</td>";
   echo "<td class=nmc>{$row[1]}</td>";
   echo "<td class=eff>{$rowx[1]}</td>";
   echo "<td class=pd>{$perday}</td>";
   echo "<td class=effpd>{$eff}</td>";
   echo "<td class=milk>{$milk}</td>";
   echo "<td class=estbl>{$totestbl}</td>";
   echo "<td class=amount>{$mb}</td>";
   echo "<td class=src>{$src}</td>";
   echo "<td class=gbm>{$row[8]}</td>";
   echo "<td class=due>{$row[6]}</td>";
   echo "<td class=aftercd>0</td>";
   echo "<td class=total>{$grandtotal}</td>";
   echo "</tr>";
   echo "</table>";

   break;
  }
 }
 echo"<h2> <br><br><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspBILL GENERATED SUCCESSFULLY. CLICK ON HOME BUTTON.</h2>";

}

?>



</body>
</html>