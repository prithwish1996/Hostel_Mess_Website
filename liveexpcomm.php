<?php session_start(); ?>
<!doctype html>

<html lang="en">

<head>
  <link rel="stylesheet" href="expcomm.css">
</head>
<body>


<div class="background"></div>
<strong>  <a href="expcomm.php">Home/</a></strong>
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
    <tr><td><article>
       <button class="button1" id="pu" onclick="viewpurchases()" type="button">VIEW PURCHASES</button>
    </article></td>
    <tr><td><article>
       <button class="button1" id="eu" onclick="editpurchases()" type="button">EDIT PURCHASES</button>
    </article></td>
    <tr><td><article>
       <button class="button1" id="ee" onclick="editeff()" type="button">EDIT EFFECTIVE DAYS</button>
    </article></td>
    </article></td></tr>
     <button class="button11" id="exmj" onclick="viewexmj()" type="button">VIEW MILK JOIN LIST</button>
    </article></td></tr>
  <!-- <td>  <article>
       <button class="button2" id="mj" onclick="messjoin()" type="button">MESS JOIN</button>
    </article></td>
    <td><article>
       <button class="button3" id="mr" onclick="reduction()" type="button">MESS REDUCTION</button>
    </article></td>
  <td>  <article>
       <button class="button4" id="co" onclick="coupon()" type="button">COUPON</button>
    </article></td>
  <td><article>
       <button class="button5" id="mi" onclick="milk()" type="button">MILK</button>
    </article></td> -->

    <!-- <td><article>
       <button class="button6" id="vtd" onclick="totaldishes()" type="button">VIEW TOTAL NO. OF DISHES</button>
    </article></td>
    <td><article>
       <button class="button7" id="vd" onclick="dues()" type="button">VIEW DUES</button>
    </article></td>
    <td><article>
       <button class="button8" id="vcd" onclick="caution()" type="button">VIEW CAUTION DEPOSIT</button>
    </article></td>
  <td>  <article> -->
       <button class="button9" id="gb" onclick="genbill()" type="button">GENERATE BILL</button>
    </article></td></tr>
     <button class="button10" id="ved" onclick="vieweff()" type="button">VIEW EFFECTIVE DAYS</button>
    </article></td></tr>
</table>
  </section>
</body>
  <script>
  // function messjoin()
  // {
  //   window.open("joinnview.php");
  // }
  // function reduction()
  // {
  //   window.open("rednview.php");
  // }
  // function coupon()
  // {
  //   window.open("insidecoupon.php");
  // }
  function viewpurchases()
  {
    window.open("viewdummypur.php","_self");
  }
  function editpurchases()
  {
    window.open("Editdummyp.php","_self");
  }
  function editeff()
  {
    window.open("editdummyeff.php","_self");
  }
  // function milk()
  // {
  //   window.open("milk.php");
  // }
  // function totaldishes()
  // {
  //   window.open("viewdishes.php");
  // }
  // function dues()
  // {
  //   window.open("dues.php");
  // }
  // function caution()
  // {
  //   window.open("viewcaution.php");
  // }
  function genbill()
  {

    window.open("totalcoupon.php","_self");
  }
  function vieweff()
  {

    window.open("viewdummyeff.php","_self");
  }
function viewexmj()
  {

    window.open("viewexpcommmilk.php","_self");
  }

  </script>
</html>
<?php
include "header.php";
include"dbconnect.php";

if($_SESSION['expcommlogin'] != "1")
{
  // session_destroy();
  echo"<script> window.open('login.php','_self');</script>";
}
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