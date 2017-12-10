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
  else
  {
  include "header.php";
  include"dbconnect.php";
  // mysql_connect("localhost","root","")or die("OOps Unable to connect to the database");
  // mysql_select_db("hostel") or die("No Database Found");

if(isset($_POST['view']))
  {

         $id = $_POST['id'];
        $query = "select * from users where ID='$id' ";
		$sql = mysqli_query($link,$query);
      $row=mysqli_fetch_array($sql);
	  if($row['total']!=0)
	  $due=$row['total'];
  else if($row['DUE']!=0)
     $due=$row['DUE'];
 else if($row['DUE']==0 and $row['total']==0)
         $due=$row['messcutdue'];
    }

   






  if(isset($_POST['submit']))
  {
    $id = $_POST['id'];
	$due=$_POST['due'];
    if(!is_null($id))
    {
      $query = "select ID from users";
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

      if($flag==1)   //data not found in user
      {  
echo '<script language="javascript">';
echo 'alert("NO DATA FOUND")';
echo '</script>';
      }

     $query = "select * from users where ID='$id' ";
		$sql = mysqli_query($link,$query);
       $row=mysqli_fetch_array($sql);
	  if($row['total']!=0)
	  $query2 = "update users set total='$due'  where ID='$id'";
  else if($row['DUE']!=0)
     $query2 = "update users set DUE='$due'  where ID='$id'";
 else if($row['DUE']==0 and $row['total']==0)
 {
	 if($due>=50)
         $query2 = "update users set messcutdue='$due'  where ID='$id'";
	 else{
		  $query22="DELETE FROM messcut2 WHERE id='$id'";
			$sql22 = mysqli_query($link,$query22);
		 $query2 = "update users set DUE='$due', messcutdue=0  where ID='$id'";
		
			
	    }
 }

    if(mysqli_query($link,$query2) and $flag==0)
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

  
<strong>  <a href="optionusers.php">Home/</a><a href="interiordues.php">Dues/</a><a href="editdue.php">EditDetail/</a></strong>
<h2 align="center"><u>EDIT DUES</u></h2>
<p><strong></strong</p>
<section >

    <form id="form" action="editdue.php" method="post">
   <li id="id">
    &nbsp&nbsp&nbsp&nbsp<font color="white">Enter ID</font>
    <input type="number" name="id" required >
	 <input id = "view" type="submit" name="view" value="View" font-size="20px">
    
    </form>

  <section >

    <form id="form" action="editdue.php" method="post">
   <li id="id">
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color="white"> ID</font>
    <input type="number" name="id" value="<?php echo @$id;?>" readonly ><br><br>
	<font color="white">Edit DUES</font>
    <input type="number" name="due" value="<?php echo @$due;?>"></ ><br>

  </li>
      <li id="submit">
      <input id = "submit" type="submit" name="submit" value="Submit" onclick="return confirm('Are you sure you want to Edit Due?')" font-size="20px">
    </li>
    </form>

  </section>

</body>
  </html>