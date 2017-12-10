<?php session_start()
?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="editblock.css">
<body>

  <div class="background"></div>
<strong> <br> <a href="optionusers.php">Home/</a><a href="messblockmenu.php">MessBlock/</a><a href="editmessblock.php">EditBlockInmates/</a></strong>
<p><strong></strong</p>




  <section >
<h2 align="center"><b><u>EDIT BLOCKED INMATES</b></u></h2>


<section>
   <font color="white">
   <form id="form" action="editmessblock.php" method="post">
 <li id="rno">
 
&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEnter ID
<input type="number" id="id" name="id"   required>

     <input id="view" type="submit" name="view" value="View" font-size="20px">

</li>
</font>
</form>
</section>


    <form id="form" action="editmessblock.php" method="post">
   <li id="id">
   &nbsp&nbsp&nbsp <font color="white">Enter ID </font>
   &nbsp&nbsp&nbsp <input type="number" name="id2" min="101" ><br><br>
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
<font size="4%" color="black">
      <li id="submit">
      <input id = "submit" type="submit" name="submit" value="Submit" onclick="return confirm('Are you sure you want to Edit this Blocked ID?')" font-size="20px">
	   <input id = "remove" type="submit" name="remove" value="Remove From MessBlock" onclick="return confirm('Are you sure you want to Remove this Blocked ID?')" font-size="20px">
    </li>
	
	
	
	
	
    </form>

  </section>

</body>
  </html>
  <?php
 if($_SESSION['seclogin']!=1)
 {
    echo"<script> window.open('login.php','_self');</script>";
 }
 else{
	 
 
  include "header.php";
  include"dbconnect2.php";
 $flag;$temp;$temp2=2;
 
 
 if(isset($_POST['view']))
  {
    $id = $_POST['id'];
    if(!is_null($id))
    {
      $query = "select id from users where id='$id'";
      $sql = mysql_query($query);
    
      $flag=1;
   while($row = mysql_fetch_array($sql))
    {


        
        if(($row[0])==$id)
        {
          //echo"inr<br>";

          $flag=0;
          break;
        }


    }
      //echo"<br>$c";
      $query;
      if($flag==1)
      {
        echo"<h2>No Data Found</h2>";
      }
      else
      {
        echo "<br><br><table border='1'><tr><th>ID</th><th>MONTH</th></th><th>NO OF MONTH</th>";
        $query = "select * from messblock where id='$id'";
        $sql = mysql_query($query);
        while($row= mysql_fetch_array($sql))
        {
          echo "<tr>";
          echo "<td>" . $row[0] . "</td>";
          echo "<td>" . $row[1] . "</td>";
          echo "<td>" . $row[2] . "</td>";
          
          echo "</tr>";
        }
        echo "</table>";
        

        }

      //echo"<br>$query";



  }
}


 
 if(isset($_POST['remove']))
  {
    $id = $_POST['id2'];
	$month=$_POST['month'];
    if(!is_null($id))
    {
		$date=date("M");
  $presentmonth=date('m', strtotime($date));
  $next=$presentmonth+1;
  if($presentmonth==$month  || $next==$month)
  {
      $query = "delete from messblock where id='$id'";
      $sql = mysql_query($query);
    
     				 echo '<script language="javascript">';
echo 'alert("REMOVED FROM MESS BLOCK LIST FROM THE MONTH '.$month.' FOR ID='.$id.'")';
echo '</script>';
  }

	}
	else{
		echo"no data found";
	}
  }

	  
  if(isset($_POST['submit']))
  {
    $id = $_POST['id2'];
	$month=$_POST['month'];
	$no=$_POST['noofm'];
 
  
    if(!is_null($id))
    {
     

       
									
										
										  $query4 = "select id from messblock";
									  $sql4 = mysqli_query($link,$query4);
									  
								   while($row12 = mysqli_fetch_array($sql4))
									{
										if(($row12[0])==$id)
										{
										  $temp2=1;//found in mess block
										  break;
										}
										else {
										  $temp2=0;

										}

									}
										
		if($temp2==1)
		{
					 $query7="UPDATE messblock SET month='$month',no_of_month='$no',temp='$month' WHERE id='$id'";
		             $sql7=mysqli_query($link,$query7);

		  echo '<script language="javascript">';
echo 'alert("EDITED MESS BLOCK LIST")';
echo '</script>';
}
  else { 
        echo '<script language="javascript">';
  echo 'alert("INMATE NOT IN MESSBLOCK LIST")';
  echo '</script>';
      }
	}
  }
     
	  
  
  
	  
 }
?>