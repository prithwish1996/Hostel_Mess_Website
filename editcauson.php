<?php session_start();
?>
<html>
<body>
<div class="background"></div>
</body>
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
  // mysql_connect("localhost","root","")or die("OOps Unable to connect to the database");
  // mysql_select_db("hostel") or die("No Database Found");
if(isset($_POST['view']))
  {

         $id = $_POST['id'];
        $query = "select CAUTION_DEPOSIT from users where ID='$id' ";
      $sql = mysqli_query($link,$query);
      $row=mysqli_fetch_array($sql);
	  $due=$row['CAUTION_DEPOSIT'];
     

    }
  if(isset($_POST['submit']))
  {
    $id = $_POST['id'];
	$caution=$_POST['caution'];
    if(!is_null($id))
    {
      $query = "select ID from users";
      $sql = mysqli_query($link,$query);
      $flag=1;
   while($row = mysqli_fetch_array($sql))
    {
        if(($row[0])==$id)
        {
          $flag=0;
          break;
        }
        else {
          $flag=1;

        }

    }

      if($flag==1)
      {echo '<script language="javascript">';
echo 'alert("NO DATA FOUND")';
echo '</script>';}
else
    {  $query = "update users set CAUTION_DEPOSIT='$caution'  where ID='$id'";



    if(mysqli_query($link,$query) and $flag==0)
    {
      echo '<script language="javascript">';
echo 'alert("Record Updated Successfully")';
echo '</script>';
    }
    else {
      echo '<script language="javascript">';
echo 'alert("Record NOT Updated")';
echo '</script>';
    }
  }}
}
}
?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="editdue.css">
<body>

  
 <strong>  <a href="optionusers.php">Home/</a><a href="interiordeposit.php">DepositDetails/</a><a href="editcauson.php">EditCaustionDeposit/</a></strong>
<h2 align="center"><u>EDIT CAUTION_DEPOSIT</u></h2>
<p><strong></strong</p>
<section >

    <form id="form" action="editcauson.php" method="post">
   <li id="id">
    &nbsp&nbsp&nbsp&nbsp<font color="white">Enter ID</font>
    <input type="number" name="id" required >
	 <input id = "view" type="submit" name="view" value="View" font-size="20px">
    
    </form>
  <section >

    <form id="form" action="editcauson.php" method="post">
   <li id="id">
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color="white"> ID</font>
    <input type="number" name="id" value="<?php echo @$id;?>" readonly ><br><br>
	<font color="white">Edit Caution Deposit</font>
    <input type="number" name="caution" value="<?php echo @$due;?>" ><br>

  </li>
      <li id="submit">
      <input id = "submit" type="submit" name="submit" value="Submit" onclick="return confirm('Are you sure you want to Edit Caution Deposit?')" font-size="20px">
    </li>
    </form>

  </section>

</body>
  </html>