<?php session_start();
?>
<!doctype html>
<html lang="en">
  <link rel="stylesheet" href="interiorfine.css">


<body>

  <div class="background"></div>
  <strong>  <a href="optionusers.php">Home/</a><a href="interiorfine.php">Edit/ViewFine/</a></strong>

    <p><strong></strong</p>
  <h1 align="center"><u>EDIT/VIEW FINE</u></h1>
  <section id="sec">

    <article>
       <button class="button" id="addnfine" onclick="funcaddnfine()" type="button">ADD NORMAL FINE</button>
    </article>
    <article>
       <button class="button" id="addgbmfine" onclick="funcaddgbmfine()" type="button">ADD GBM FINE</button>
    </article>
    <article>
       <button class="button" id="editnormalfine" onclick="funceditfine()" type="button">EDIT FINE</button>
    </article>
    <article>
       <button class="button" id="viewfine" onclick="funcviewfine()" type="button">VIEW FINE</button>
    </article>
  </section>
</body>
<script>
function funcaddnfine()
{
   window.open("addfine.php","_self");
}
function funcaddgbmfine()
{
   window.open("addfine.php","_self");
}
function funceditfine()
{
   window.open("editfine.php","_self");
}
function funcviewfine()
{
   window.open("fine.php","_self");
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
