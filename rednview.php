<?php session_start();
?>
<!doctype html>
<html lang="en">
  <link rel="stylesheet" href="joinnview.css">


<body>

  <div class="background"></div>
  <strong>  <a href="optioncomm.php">Home/</a><a href="rednview.php">MessReduction&View/</a></strong>
  <h1 align="center"><u>MESS REDUCTION/VIEW</u></h1>
  <section id="sec">

      <article>
         <button class="button" id="nj" onclick="newred()" type="button">NEW REDUCTION</button>
      </article>
      <article>
         <button class="button" id="vj" onclick="viewred()" type="button">VIEW REDUCTION</button>
      </article>


  </section>
</body>
<script>
function newred()
{
  window.open("reduction.php",'_self');
}
function viewred()
{
  window.open("viewred.php",'_self');
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

  include"dbconnect2.php";
  include "header.php";
}

?>
