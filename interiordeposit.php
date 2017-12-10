<?php session_start();
?>
<!doctype html>
<html lang="en">
  <link rel="stylesheet" href="interiordeposit.css">


<body>

  <div class="background"></div>
  <strong>  <a href="optionusers.php">Home/</a><a href="interiodeposit.php">DepositDetails/</a></strong>

    <p><strong></strong</p>
  <h1 align="center"><u>USERS</u></h1>
  <section id="sec">

    <article>
       <button class="button" id="viewcaution" onclick="funcviewcaution()" type="button">VIEW CAUTION DEPOSITS</button>
    </article>
    <article>
       <button class="button" id="editcaution" onclick="funceditcaution()" type="button">EDIT CAUTION DEPOSITS</button>
    </article>
  </section>
</body>
<script>
function funcviewcaution()
{
   window.open("viewcaution.php","_self");
}
function funceditcaution()
{
   window.open("editcauson.php","_self");
}
</script>
  </html>
  <?php
  if($_SESSION['seclogin'] != "1")
  {
    // session_destroy();
    echo"<script> window.open('login.php','_self');</script>";
  }
  else{
  include "header.php";
  include"dbconnect.php";
}
?>