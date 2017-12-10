<?php session_start();
?>
<html>
<body>
<div class="background"></div>
</body>
</html>

 <?php
  if($_SESSION['expcommlogin'] != "1")
  {
    // session_destroy();
    echo"<script> window.open('login.php','_self');</script>";
  }
  else
  {
  include "header.php";
  include"dbconnect.php";
  // mysql_connect("localhost","root","")or die("OOps Unable to connect to the database");
  // mysql_select_db("hostel") or die("No Database Found");
if(isset($_POST['view']))
  {

          $id = $_POST['id'];
        $query = "select EFFECTIVE_DAYS from dummyeffdays where ID='$id' ";
      $sql = mysqli_query($link,$query);
      $row=mysqli_fetch_array($sql);
	  $due=$row['EFFECTIVE_DAYS'];
    }
  if(isset($_POST['submit']))
  {
    $id = $_POST['id'];
	$day=$_POST['day'];
    if(!is_null($id))
    {
      $query = "select ID from dummyeffdays";
      $sql = mysqli_query($link,$query);
      $flag;
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

      $query = "update dummyeffdays set EFFECTIVE_DAYS='$day'  where ID='$id'";



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
  }
}
}
?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="editdue.css">
<body>

  
<strong>  <a href="expcomm.php">Home/</a><a href="editdummyeff.php">Edit_EffectiveDays/</a></strong>
<h2 align="center"><u>EDIT DUMMY_EFFECTIVE_DAYS</u></h2>
<p><strong></strong</p>
<section >

    <form id="form" action="editdummyeff.php" method="post">
   <li id="id">
    &nbsp&nbsp&nbsp&nbsp<font color="white">Enter ID</font>
    <input type="number" name="id" required >
	 <input id = "view" type="submit" name="view" value="View" font-size="20px">
    
    </form>
</section>
  <section >

    <form id="form" action="editdummyeff.php" method="post">
   <li id="id">
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color="white">Mess ID</font>
    <input type="number" name="id" value="<?php echo @$id;?>" readonly><br><br>
	<font color="white">Edit Effective Days</font>
    <input type="number" name="day" value="<?php echo @$due;?>" ><br>

  </li>
      <li id="submit">
      <input id = "submit" type="submit" name="submit" value="Submit" onclick="return confirm('Are you sure you want to Edit Effective Days?')" font-size="20px">
    </li>
    </form>

  </section>

</body>
  </html>