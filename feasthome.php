<?php session_start();
?>
<!doctype html>

<html lang="en">

<head>
<title>Athulya Girls Hostel</title>
  <link rel="stylesheet" href="feast.css">
</head>
<body>


<div class="background"></div>
<strong>  <a href="optioncomm.php">Home/</a><a href="feasthome.php">MessFeast/</a>
  <p><strong></strong</p>
<h2 id="heading">OPTIONS</h2>
<!-- <nav id = "navi">
    <ul  style="list-style-type:circle">
      <li id="home"> Home></li>
    </u1>
    <u1>
    <li id="settings">#Settings</li>
</u1>
  </nav> -->

  <section id="sec">
<table>
    <tr>
  <td>  <article>
       <button class="button2" id="mj" onclick="feastout()" type="button">FEAST OUT</button>
    </article></td>
    <td><article>
       <button class="button3" id="mr" onclick="feastoutlist()" type="button">FEAST OUT LIST</button>
    </article></td>
  <td>  <article>
       <button class="button4" id="co" onclick="feastjoin()" type="button">FEAST JOIN</button>
    </article></td>
  <td><article>
       <button class="button5" id="mi" onclick="feastcoupon()" type="button">FEAST COUPON</button>
    </article></td>


    <td><article>
       <button class="button6" id="vtd" onclick="deleteall()" type="button">DELETE PREVIOUS FEAST</button>
    </article></td>


    <td><article>
       <button class="button7" id="vmj" onclick="feastcount()" type="button">FEAST COUNT</button>
    </article></td>
    <!-- <td><article>
       <button class="button8" id="mo" onclick="messout()" type="button">MESS OUT</button>
    </article></td> -->
    <!-- <td><article>
       <button class="button7" id="vd" onclick="dues()" type="button">DUES</button>
    </article></td>
    <td><article>
       <button class="button8" id="vcd" onclick="caution()" type="button">VIEW CAUTION DEPOSIT</button>
    </article></td> -->
  <!-- <td>  <article>
       <button class="button9" id="gb" onclick="genbill()" type="button">GENERATE BILL</button>
    </article></td></tr> -->
</table>
  </section>
</body>
  <script>
  function feastactivate()
  {
    if(confirm('Are you sure you want to Activate Feast? Before Pressing OK Please Delete the Previous Feast Details.'))
  {
     window.open("feastactivate.php","_self");
   }
  }
  function feastcount()
  {
    
     window.open("feastcount.php","_self");
   
  }
  function feastdeactivate()
  {
    if(confirm('Are you sure you want to Deactivate Feast?'))
  {
     window.open("feastactivate.php","_self");
   }
  }
  function feastout()
  {
    window.open("feastout.php","_self");
  }
  function feastoutlist()
  {
    window.open("feastoutview.php","_self");
  }
  function feastjoin()
  {
    window.open("feastjoinhome.php","_self");
  }
  function feastcoupon()
  {
    window.open("feastcouponhome.php","_self");
  }
   // function deleteall()
   // {
  //   window.open("count.php","_self");
  // }
  // function viewmilkjoin()
  // {
  //   window.open("viewmilkjoin.php","_self");
  // }
  function deleteall()
  {
    if(confirm('Are you sure you want to Delete Previous Feast Datas?'))
  {
     window.open("feastdelall.php","_self");
   }
  }
  // function dues()
  // {
  //   window.open("dues.php","_self");
  // }
  // function caution()
  // {
  //   window.open("viewcaution.php","_self");
  // }



  </script>
</html>
<?php

if($_SESSION['prcommlogin'] != "1")
{
  // session_destroy();
  echo"<script> window.open('login.php','_self');</script>";
}
else {
  include "header.php";
  include"dbconnect.php";
  $query1 = "select * from feastactivate";
  $q1 = mysqli_query($link,$query1);

while($row1=mysqli_fetch_array($q1))
  {
    if($row1[0]==0)
    {
      echo'<td><article>
       <button class="button1" id="pu" onclick="feastactivate()" type="button">ACTIVATE</button>
    </article></td>';
    }
    else{
     echo'<td><article>
       <button class="button1" id="pu" onclick="feastdeactivate()" type="button">DEACTIVATE</button>
    </article></td>'; 
    }
  }
}
// session_start();
// if(!isset($_SESSION['fromMain'])){
//    //send them back
//    header("Location: Adminlogin.php");
// }
// else{
//    //reset the variable
//    session_destroy();
//    session_start();
//    $_SESSION['fromPurchases'] = "true";
//    //header("Location: Purchases.php");
// }
?>