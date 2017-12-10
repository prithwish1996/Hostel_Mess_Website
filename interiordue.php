<?php session_start();
?>
<!doctype html>
<html lang="en">
  <link rel="stylesheet" href="interiordues.css">


<body>

  <div class="background"></div>
  <strong>  <a href="optionusers.php">Home/</a><a href="interiordues.php">DuesDetail/</a></strong>

    <p><strong></strong</p>
  <h1 align="center"><u>DUES</u></h1>
  <section id="sec">

    <article>
       <button class="button" id="viewdues" onclick="funcviewdues()" type="button">VIEW DUES</button>
    </article>
    <article>
       <button class="button" id="editdues" onclick="funceditdues()" type="button">EDIT DUES</button>
    </article>
  </section>
</body>
<script>
function funcviewdues()
{
   window.open("dues.php","_self");
}
function funceditdues()
{
   window.open("#","_self");
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
  include"dbconnect2.php";
}
?>
