<?php session_start();
?>
<!doctype html>
<html lang="en">
  <link rel="stylesheet" href="messblockmenu.css">


<body>

  <div class="background"></div>
  <strong> <br> <a href="optionusers.php">Home/</a><a href="messblockmenu.php">MessBlock/</a></strong>

    <p><strong></strong</p>
  <h1 align="center"><u>MESS BLOCK</u></h1>
  <section id="sec">

      <article>
         <button class="button" id="nj" onclick="normal()" type="button">ENTER MESS BLOCK</button>
      </article>
      <article>
         <button class="button" id="lj" onclick="edit()" type="button">EDIT MESS BLOCK</button>
      </article>
      <article>
         <button class="button" id="vj" onclick="view()" type="button">VIEW MESS BLOCK</button>
      </article>


  </section>
</body>
<script>
function normal()
{
  window.open("messblock.php","_self");
}
function edit()
{
  window.open("editmessblock.php","_self");
}
function view()
{
  window.open("viemessblock.php","_self");
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
