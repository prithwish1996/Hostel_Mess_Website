<?php session_start(); ?>

<!doctype html>

<html lang="en">


  <link rel="stylesheet" href="optionusers.css">
<body>
<div class="background"></div>
<strong><a href="optionusers.php">Home/</a><strong>
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

    <article>
       <button class="button" id="add" onclick="funcaddu()" type="button">INMATE DETAILS</button>
     </article>


    <article>
       <button class="button" id="viewcommpass" onclick="funcviewcommpass()" type="button">PASSWORD DETAILS</button>
    </article>

    <article>
       <button class="button" id="viewcaution" onclick="funcvcaution()" type="button">CAUTION DEPOSITS</button>
    </article>

    <article>
       <button class="button" id="delcomm" onclick="funcdelcomm()" type="button" >DELETE COMMITTEE</button>
    </article>
    <article>
       <button class="button" id="delco" onclick="funcdue()" type="button"> DUES DETAILS</button>
    </article>
    <article>
       <button class="button" id="fine" onclick="funcfine()" type="button"> ADD/EDIT/VIEW FINE</button>
    </article>
    <article>
       <button class="button" id="messcut" onclick="funcmesscut()" type="button">MESS CUT LIST</button>
    </article>
    <article>
       <button class="button" id="messblock" onclick="funcmessblock()" type="button">MESS BLOCK</button>
    </article>
    
    <article>
       <button class="button" id="billpay" onclick="funcbillpay()" type="button"> BILL PAYMENT</button>
    </article>

    <!-- <article>
       <button id="view" onclick="funcaddu()" type="button"><a>ADD USERS</a></button>
    </article>
    <article>
       <button id="view" onclick="funcdelu()" type="button"><a>DELETE USERS</a></button>
    </article>
    <article>
       <button id="view" onclick="funcviewu()" type="button"><a>VIEW USERS</a></button>
    </article> -->
  </section>
</body>
  <script>
  function funcaddu()
  {
    window.open("interioruser.php","_self");
  }
  function funcfine()
  {
    window.open("interiorfine.php","_self");
  }



function funcvcaution()
{
   window.open("interiordeposit.php","_self");
}

function funcviewcommpass()
{
   window.open("interiordepass.php","_self");
}
function funcdelcomm()
{
  if(confirm('Are you sure you want to Delete the Previous Committee?'))
{
   window.open("delcomm.php","_self");
 }
}
function funcdue()
{
   window.open("interiordues.php","_self");
}
function funcbillpay()
{
   window.open("billpay.php","_self");
}
function funcmesscut()
{
  window.open("viewmesscut.php","_self");

}
function funcmessblock()
{
  window.open("messblockmenu.php","_self");

}


  </script>
</html>
<?php
if($_SESSION['seclogin'] != "1")
{
  // session_destroy();
  echo"<script> window.open('login.php','_self');</script>";
}
else
{
include "header.php";
include"dbconnect.php";
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
}
?>