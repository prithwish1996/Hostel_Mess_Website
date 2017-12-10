<?php session_start();
?>
<!doctype html>
<html lang="en">
  <link rel="stylesheet" href="interioruser.css">


<body>

  <div class="background"></div>
  <strong>  <a href="optionusers.php">Home/</a><a href="joinnview.php">InmateDetail/</a></strong>

    <p><strong></strong</p>
  <h1 align="center"><u>USERS</u></h1>
  <section id="sec">

    <article>
       <button class="button" id="add" onclick="funcaddu()" type="button">ADD INMATES</button>
    </article>
    <article>
  <article>
     <button class="button" id="edit" onclick="funceditu()" type="button">EDIT INMATES</button>
  </article>
  <article>
     <button class="button" id="remove" onclick="funcremu()" type="button">REMOVE INMATES</button>
  </article>
  <article>
     <button class="button" id="view" onclick="funcviewu()" type="button">VIEW PARTICULAR INMATES</button>
  </article>
  <article>
     <button class="button" id="viewall" onclick="funcviewall()" type="button">VIEW ALL INMATES</button>
  </article>
  </section>
</body>
<script>
function funcaddu()
{
  window.open("Addremusers.php","_self");
}
function funceditu()
{
  window.open("Editusers.php","_self");
}
function funcremu()
{
  window.open("Adddel.php","_self");
}
function funcviewu()
{
  window.open("Viewusers.php","_self");
}
function funcviewall()
{
  window.open("Viewallusers.php","_self");
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
