<?php session_start();
?>
<!doctype html>
<html lang="en">
  <link rel="stylesheet" href="joinnview.css">


<body>

  <div class="background"></div>
  <strong>  <a href="optioncomm.php">Home/</a><a href="joinnview.php">MessJoin/</a></strong>

    <p><strong></strong</p>
  <h1 align="center"><u>MESS JOIN/VIEW</u></h1>
  <section id="sec">

      <article>
         <button class="button" id="nj" onclick="normaljoin()" type="button">NORMAL JOIN</button>
      </article>
      <article>
         <button class="button" id="lj" onclick="latejoin()" type="button">LATE JOIN</button>
      </article>
      <article>
         <button class="button" id="vj" onclick="viewjoin()" type="button">VIEW JOIN</button>
      </article>


  </section>
</body>
<script>
function normaljoin()
{
  window.open("join3.php","_self");
}
function latejoin()
{
  window.open("late_join.php","_self");
}
function viewjoin()
{
  window.open("viewjoin.php","_self");
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
  include"dbconnect2.php";
}
?>
