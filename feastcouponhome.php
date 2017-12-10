<?php session_start();
?>
<!doctype html>

<html lang="en">

<head>
<title>Athulya Girls Hostel</title>
  <link rel="stylesheet" href="feast2.css">
</head>
<body>


<div class="background"></div>
<strong>  <a href="optioncomm.php">Home/</a><a href="feasthome.php">MessFeast/</a><a href="feastcouponhome.php">FeastCouponHome/</a></strong>
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

    <tr>
  <td>  <article>
       <button class="button2" id="co" onclick="feastcoupon()" type="button">FEAST COUPONS</button>
    </article></td>
    <td><article>
       <button class="button3" id="mj" onclick="feasteditcoupon()" type="button">EDIT COUPONS</button>
    </article></td>
  <td>  <article>
       <button class="button4" id="mr" onclick="feastcouponview()" type="button">VIEW FEAST COUPON</button>
    </article></td>
  <!-- <td><article>
       <button class="button5" id="mi" onclick="feastcoupon()" type="button">FEAST COUPON</button>
    </article></td>


    <td><article>
       <button class="button6" id="vtd" onclick="deleteall()" type="button">DELETE PREVIOUS FEAST</button>
    </article></td> -->

    <!-- <td><article>
       <button class="button7" id="vmj" onclick="viewmilkjoin()" type="button">MILK JOIN LIST</button>
    </article></td>
    <td><article>
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

  </section>
</body>
  <script>
  function feastcoupon()
  {
   
     window.open("feastcoupon.php","_self");
   
  }
  function feasteditcoupon()
  {
   
     window.open("feasteditcoupon.php","_self");
   
  }
  function feastcouponview()
  {
    window.open("feastcouponview.php","_self");
  }
  // function feastoutlist()
  // {
  //   window.open("insidecoupon.php","_self");
  // }
  // function feastjoin()
  // {
  //   window.open("feastjoinhome.php","_self");
  // }
  // function feastcoupon()
  // {
  //   window.open("milk.php","_self");
  // }
  //  // function deleteall()
   // {
  //   window.open("count.php","_self");
  // }
  // function viewmilkjoin()
  // {
  //   window.open("viewmilkjoin.php","_self");
  // }
  // function deleteall()
  // {
  //   if(confirm('Are you sure you want to Delete Previous Feast Datas?'))
  // {
  //    window.open("feastdelall.php","_self");
  //  }
  // }
  // // function dues()
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
else{
  include"header.php";
  include"dbconnect.php";
}
?>
