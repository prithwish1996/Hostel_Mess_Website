<?php session_start();
?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="Adddel.css">
<body>

  <div class="background"></div>
<strong> <br> <a href="optionusers.php">Home/</a><a href="messblockmenu.php">MessBlock/</a><a href="messblock.php">BlockInmates/</a></strong>
<p><strong></strong</p>

  <section >
<h2 align="center"><b><u>BLOCK INMATES</b></u></h2>
    <form id="form" action="messblock.php" method="post">
   <li id="id">
    <font color="white">Enter ID </font>
    <input type="number" name="id" min="101" ><br><br>
  </li>
  <font size="4%" color="white">Enter Month</font>
<select id="month" name="month" style="width: 150px;">
<option value="0"></option>
  <option value="01">JANUARY</option>
  <option value="02">FEBRUARY</option>
  <option value="03">MARCH</option>
  <option value="04">APRIL</option>
  <option value="05">MAY</option>
  <option value="06">JUNE</option>
  <option value="07">JULY</option>
  <option value="08">AUGUST</option>
  <option value="09">SEPTEMBER</option>
  <option value="10">OCTOBER</option>
  <option value="11">NOVEMBER</option>
  <option value="12">DECEMBER</option>
</select> <br> <br>
 <font size="4%" color="white" >No. of Month</font>
<select id="noofm" name="noofm" style="width: 150px;">
<option value="0"></option>
  <option value="1">01</option>
  <option value="2">02</option>
  <option value="3">03</option>
  
</select> <br> <br>
  </li>
<div id="hi">
<font size="4%" color="white">
      <li id="submit">
      <input id = "submit" type="submit" name="submit" value="Submit" onclick="return confirm('Are you sure you want to Block this ID?')" font-size="20px">
    </li>
	
	
	
	
	
    </form>

  </section>

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
 $flag;$temp;$temp2=2;
  if(isset($_POST['submit']))
  {
    $id = $_POST['id'];
	$month=$_POST['month'];
	$no=$_POST['noofm'];
 
  
    if(!is_null($id))
    {
      $query = "select ID from users";
      $sql = mysqli_query($link,$query);
     
   while($row10 = mysqli_fetch_array($sql))
    {
        if(($row10[0])==$id)
        {
          $flag=0;
          break;
        }
        else {
          $flag=1;

        }

    }

        if($flag==0)  //found in users
      {
					  $query2 = "select ID from messjoin";
				  $sql2 = mysqli_query($link,$query2);
				  $flag;
			   while($row11 = mysqli_fetch_array($sql2))
				{
					if(($row11[0])==$id)
					{
					  $temp=0;
					  break;
					}
					else {
					  $temp=1;

					}

				}
									if($temp==1)   //not in mess join
									{
										
										  $query4 = "select id from messblock";
									  $sql4 = mysqli_query($link,$query4);
									  
								   while($row12 = mysqli_fetch_array($sql4))
									{
										if(($row12[0])==$id)
										{
										  $temp2=0;
										  break;
										}
										else {
										  $temp2=1;

										}

									}
										
		if($temp2==1 || !$row12)
		{
			
		 $query3="INSERT into messblock(id, month, no_of_month,temp,tempno) VALUES ('$id','$month','$no','$month','$no')"; 
		   $sql3 = mysqli_query($link,$query3);
		  echo '<script language="javascript">';
echo 'alert("INSERTED INTO MESS BLOCK LIST")';
echo '</script>';
}
  else { 
        echo '<script language="javascript">';
  echo 'alert("USER ALREADY IN MESSBLOCK LIST")';
  echo '</script>';
      }
	}
      else {
        echo '<script language="javascript">';
  echo 'alert("USER ALREADY JOINED MESSJOIN LIST")';
  echo '</script>';
      }
	  }
	  else {
        echo '<script language="javascript">';
  echo 'alert("NO DATA FOUND")';
  echo '</script>';
      }
	}
  }
  
  
  
	  
  }
?>