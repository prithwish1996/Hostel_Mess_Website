<?php session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="billpay.css">
</head>
 
<body>

<?php
include "header.php";
  include"dbconnect.php";
?>

 <div class="background"></div>
 <strong> <br> <a href="optionusers.php">Home/</a><a href="billpay.php">BillPay/</a></strong>
<strong>
 
<?php

 if($_SESSION['seclogin'] != "1")
  {
    // session_destroy();
    echo"<script> window.open('login.php','_self');</script>";
  }
  else{

$name=101;$roomno=101;$bill=101;
echo'<form id="billpay" action="billpay.php" method="post">';
echo"<table>";
  echo"<tr>";
    echo"<th>ID</th>";
    echo"<th>NAME</th>";
      echo"<th>ROOM_NO</th>";
        echo"<th>TOTAL</th>";
          echo"<th>AMOUNT PAID</th>";
		  echo"<th>LATE FINE</th>";
            echo"<th>SUBMIT</th>";
     echo"</tr>";
       $query0 = "select ID from users";
       $sql0 = mysqli_query($link,$query0);
$last=mysqli_num_rows( $sql0);
$last2=$last+100;
$amountpaid=Array();
$latefine=Array();
$submit=Array();
$flag2=0;
for($i=101;$i<=$last2;$i++)
{
$y=$i-101;
$t=1000+$i;
$w=2000+$i;
$amountpaid[$y]=$t;
$latefine[$y]=$w;
$submit[$y]=$i;

    $query = "select * from users where ID='$i'";
  $sql = mysqli_query($link,$query);
  $row=mysqli_fetch_array($sql);
  $bill1=$row['total']+$row['messcutdue'] ;
  $bill2=$row['DUE']+$row['messcutdue'] ;
  echo"<tr>";
      echo "<td>" . $row['ID'] . "</td>";
      echo "<td>" . $row['NAME'] . "</td>";
      echo "<td>" . $row['ROOM_NO'] . "</td>";
	  if($row['total']!=0)
      echo "<td>" . $bill1. "</td>";//$row['total']+$row['messcutdue'] 
  else
	  echo "<td>" . $bill2 . "</td>";//$row['DUE']+$row['messcutdue']
      echo'<td> <input type="number" name="'.$amountpaid[$y].'"  ></td>';
	  echo'<td> <input type="number" name="'.$latefine[$y].'"  ></td>';
      echo'<td> <input type="submit" name="'.$submit[$y].'" ></td>';
          echo"</tr>";

        $name++;$roomno++;$bill++;$amountpaid++;$submit++;
}
$j=101;
$p;
 
while($j<=$last2)
{
	$p=1000+$j;
	$z=2000+$j;
	
if(isset($_POST[''.$j.'']))   //$j is id no
{
	$paid = $_POST[''.$p.''];   //$p is amount paid text box
	$late = $_POST[''.$z.''];   ////$z is late fine text box

	 if($_POST[''.$p.'']=="")
	 {
	 echo '<script language="javascript">';
echo 'alert("Please Enter Amount Paid First ")';
echo '</script>';
	 }
	else
	{
						$querylast="select * from messcut2";
						$sqllast=mysqli_query($link,$querylast);
						while($rowlast=mysqli_fetch_array($sqllast))
						{
							if($rowlast[0]==$j)
							{
								$flag2=1;//found in messcut2
								break;
							}
 							else
								$flag2=0;
						}
		
		
		
		
		
		
		
		
	 $query2 = "select * from users where ID='$j'";
  $sql2 = mysqli_query($link,$query2);
  $row2=mysqli_fetch_array($sql2);	
		
		
		
	if($flag2==0)	//not found in messcut
	{               //normal payment
		 
	 
$bill=$row2['total'];
$due=$row2['DUE'];
$due=$due+$late+$bill-$paid;
	$query3 = "update users set DUE='$due' ,FINE='0',messbill='0',total='0'  where ID='$j'";
	$sql3 = mysqli_query($link,$query3);
	 //echo '<script language="javascript">';
//echo 'alert("Amount Paid='.$paid.' Total Dues='.$due.' For ID='.$j.' ")';
//echo '</script>';
echo "<script type='text/javascript'>".
      "alert('Amount Paid=".$paid." Total Dues=".$due." For ID=".$j."');
       window.location.href='billpay.php';".
     "</script>";
	
	}
	
	else   //$flag2==1 found in mess cut
	{
		if($row2['total']!=0)
		{
            if($paid>=$rowlast['messcutdue'])                 //$paid=amount paid			
			{   $paidshow=$paid;
				$paid=$paid-$rowlast['messcutdue'];
				$query21="DELETE FROM messcut2 WHERE id='$j'";
			    $sql21 = mysqli_query($link,$query21);
				$total=$row2['total'];
				$total=$total+$late-$paid;
				
				$query20 = "update users set DUE='$total' ,FINE='0',messbill='0',total='0',messcutdue='0'  where ID='$j'";
	            $sql20 = mysqli_query($link,$query20);
				// echo '<script language="javascript">';
//echo 'alert("AMOUNT PAID='.$paidshow.' TOTAL DUES='.$total.' FOR ID='.$j.'\nYOU ARE REMOVED FROM MESS CUT LIST ")';
//echo '</script>';
echo "<script type='text/javascript'>".
      "alert('AMOUNT PAID=".$paidshow." TOTAL DUES=".$total." FOR ID=".$j."                                   YOU ARE REMOVED FROM MESS CUT LIST');
       window.location.href='billpay.php';".
     "</script>";
				
			}
			else{                                          
				$rowlast['messcutdue']=$rowlast['messcutdue']-$paid;
											if($rowlast['messcutdue']<50)         
											{
												$aftermesscutpaid=$rowlast['messcutdue']+$row2['total']+$late;
											$query23 = "update users set DUE='$aftermesscutpaid' ,FINE='0',messbill='0',total='0',messcutdue='0'  where ID='$j'";
											$sql23 = mysqli_query($link,$query23);

												$query22="DELETE FROM messcut2 WHERE id='$j'";
												$sql22 = mysqli_query($link,$query22);
															//	echo '<script language="javascript">';
                                                              // echo 'alert("AMOUNT PAID='.$paid.' TOTAL DUES='.$aftermesscutpaid.' FOR ID='.$j.'\nYOU ARE REMOVED FROM MESS CUT LIST ")';
                                                             //  echo '</script>';
															 echo "<script type='text/javascript'>".
      "alert('AMOUNT PAID=".$paid." TOTAL DUES=".$aftermesscutpaid." FOR ID=".$j."                                   YOU ARE REMOVED FROM MESS CUT LIST');
       window.location.href='billpay.php';".
     "</script>";

											
											}
											else{
												$messcutdue=$rowlast['messcutdue'];
												$updatetotal=$row2['total']+$late;
												$messcutdue2=$rowlast['messcutdue']+$row2['total']+$late;//only for showing
											$query24 = "update users set messcutdue='$messcutdue',total='$updatetotal' where ID='$j'";
											$sql24 = mysqli_query($link,$query24);
											$query25 = "update messcut2 set messcutdue='$messcutdue' where ID='$j'";
											$sql25= mysqli_query($link,$query25);
															// echo '<script language="javascript">';
//echo 'alert("AMOUNT PAID='.$paid.' TOTAL DUES='.$messcutdue2.' FOR ID='.$j.'\nYOU ARE STILL IN MESS CUT LIST ")';
															//echo '</script>';
echo "<script type='text/javascript'>".
      "alert('AMOUNT PAID=".$paid." TOTAL DUES=".$messcutdue2." FOR ID=".$j."                                   YOU ARE STILL IN MESS CUT LIST');
       window.location.href='billpay.php';".
     "</script>";

											}
			}
			
			
		}
	else if($row2['total']==0 and $row2['DUE']==0)//26-6 ka payment for messcut
	{
	
	   if($paid>=$rowlast['messcutdue'])                 //$paid=amount paid			
			{
				$paidshow=$paid;
				$paid=$paid-$rowlast['messcutdue'];
				$query21="DELETE FROM messcut2 WHERE id='$j'";
			    $sql21 = mysqli_query($link,$query21);
				$total2=$row2['total'];
				$total2=$total2+$late-$paid;
				$query20 = "update users set DUE='$total2' ,FINE='0',messbill='0',total='0',messcutdue='0'  where ID='$j'";
	            $sql20 = mysqli_query($link,$query20);
				// echo '<script language="javascript">';
               // echo 'alert("AMOUNT PAID='.$paidshow.' TOTAL DUES='.$total2.'  FOR ID='.$j.'\nYOU ARE REMOVED FROM MESS CUT LIST ")';
               // echo '</script>';
			   echo "<script type='text/javascript'>".
      "alert('AMOUNT PAID=".$paidshow." TOTAL DUES=".$total2."  FOR ID=".$j."                                   YOU ARE REMOVED FROM MESS CUT LIST');
       window.location.href='billpay.php';".
     "</script>";
			}
			else{                                          
				$rowlast['messcutdue']=$rowlast['messcutdue']-$paid;
											if($rowlast['messcutdue']<50)         
											{
												$aftermesscutpaid=$rowlast['messcutdue']+$row2['total']+$late;
											$query23 = "update users set DUE='$aftermesscutpaid' ,FINE='0',messbill='0',total='0',messcutdue='0'  where ID='$j'";
											$sql23 = mysqli_query($link,$query23);

												$query22="DELETE FROM messcut2 WHERE id='$j'";
												$sql22 = mysqli_query($link,$query22);
											// echo '<script language="javascript">';
                                            // echo 'alert("AMOUNT PAID='.$paid.' TOTAL DUES='.$aftermesscutpaid.' FOR ID='.$j.'\nYOU ARE REMOVED FROM MESS CUT LIST ")';
                                            // echo '</script>';
											echo "<script type='text/javascript'>".
      "alert('AMOUNT PAID=".$paid." TOTAL DUES=".$aftermesscutpaid." FOR ID=".$j."                                   YOU ARE REMOVED FROM MESS CUT LIST');
       window.location.href='billpay.php';".
     "</script>";
											}
											else{
												$messcut=$rowlast['messcutdue']+$late;
											$query24 = "update users set messcutdue='$messcut' where ID='$j'";
											$sql24 = mysqli_query($link,$query24);
											$query25 = "update messcut2 set messcutdue='$messcut' where ID='$j'";
											$sql25= mysqli_query($link,$query25);
                                           // echo '<script language="javascript">';
                                           // echo 'alert("AMOUNT PAID='.$paid.' TOTAL DUES='.$messcut.' FOR ID='.$j.'\nYOU ARE STILL IN MESS CUT LIST ")';
                                           // echo '</script>';
										   echo "<script type='text/javascript'>".
      "alert('AMOUNT PAID=".$paid." TOTAL DUES=".$messcut." FOR ID=".$j."                                   YOU ARE STILL IN MESS CUT LIST');
       window.location.href='billpay.php';".
     "</script>";
											}
			}
	
	
	
	
		
	}		
		
	}
break;

	 }
	 }
$j++;
}


echo"</table>";
echo"</form>";






  }
  ?>
 </strong>
</body>
</html>