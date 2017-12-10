<?php session_start();
?>
<!doctype html>
<html lang="en">
  <link rel="stylesheet" href="insidecoupon.css">


<body>

  <div class="background"></div>
  <strong>  <a href="optioncomm.php">Home/</a><a href="insidecoupon.php">Coupon/</a></strong>
  <h1 align="center"><u><b>COUPON</b></u></h1>
  <section id="sec">

      <!-- <article>
         <button class="button" id="sa" onclick="setamt()" type="button">SET AMOUNT</button>
      </article> -->
      <article>
         <button class="button" id="ac" onclick="setcoupon1()" type="button">ENTER NORMAL COUPON</button>
      </article>
      <article>
         <button class="button"  id="lc" onclick="setcoupon2()" type="button">ENTER LATE COUPON</button>
      </article>
      <article>
         <button class="button"  id="eac" onclick="editcoupon1()" type="button">EDIT NORMAL COUPON</button>
      </article>
      <article>
         <button class="button"  id="elc" onclick="editcoupon2()" type="button">EDIT LATE COUPON</button>
      </article>
      <article>
         <button class="button" id="vc" onclick="viewtodayscoupon()" type="button">VIEW TODAYS COUPONS</button>
      </article>
      <article>
         <button class="button" id="vpc" onclick="viewpreviouscoupon()" type="button">VIEW PREVIOUS COUPONS</button>
      </article>

  </section>
</body>
<script>
function setamt()
{
  window.open("valueset.php","_self");
}
function setcoupon1()
{
  window.open("coupon2.php","_self");
}
function setcoupon2()
{
  window.open("latecoupon.php","_self");
}
function editcoupon1()
{
  window.open("editcoupon.php","_self");
}
function editcoupon2()
{
  window.open("editlatecoupon.php","_self");
}
function viewtodayscoupon()
{
  window.open("viewcoupons.php","_self");
}
function viewpreviouscoupon()
{
  window.open("viewprevcoupons.php","_self");
}
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
}
?>