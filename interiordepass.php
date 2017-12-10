<?php session_start();
?>
<!doctype html>
<html lang="en">
  <link rel="stylesheet" href="interiorpass.css">


<body>

  <div class="background"></div>
  <strong>  <a href="optionusers.php">Home/</a><a href="interiordepass.php">Password/</a></strong>

    <p><strong></strong</p>
  <h1 align="center"><u>PASSWORDS</u></h1>
  <section id="sec">

    <article>
       <button class="button" id="secpass" onclick="funcsecpass()" type="button">GENERATE SECRETARY PASSWORD</button>
    </article>
    <article>
       <button class="button" id="commpass" onclick="funccommpass()" type="button">GENERATE MESS COMMITTEE PASSWORD</button>
    </article>
    <article>
       <button class="button" id="viewcommpass" onclick="funcviewcommpass()" type="button">VIEW MESS COMMITTEE PASSWORD</button>
    </article>
    <article>
       <button class="button" id="viewstudpass" onclick="funcviewstudpass()" type="button">VIEW INMATES PASSWORD</button>
    </article>
  </section>
</body>
<script>
function funcsecpass()
{
  window.open("secpass.php","_self")
}
function funccommpass()
{
  window.open("commpass.php","_self");
}
function funcviewcommpass()
{
   window.open("viewcommpass.php","_self");
}
function funcviewstudpass()
{
  window.open("viewstudpass.php","_self");
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
}
?>