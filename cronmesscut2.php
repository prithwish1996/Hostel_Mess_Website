//cron job run on 26 of every month

<?php
echo"hi";
include"dbconnect.php"; 
$date=date("M");
  $presentmonth1=date('m', strtotime($date));
  $presentmonth=$presentmonth1+1;
  echo"$presentmonth<br>";
  echo"$presentmonth1";
    
$flag=2;
$query="select * from users";
$sql=mysqli_query($link,$query);
			while($row=mysqli_fetch_array($sql))
			{
				$query1="select id from messcut2";
                $sql1=mysqli_query($link,$query1);
						while($row2=mysqli_fetch_array($sql1))//looking in messcut2
							   {
								   if($row['ID']==$row2['id'])
								   {
									   $flag=1;//found in messcut2
									   break;
									}
									else
										$flag=0;
								}
						if($flag==0 or !$row2)       //not found in messcut2
						{ 
							$idd=$row['ID'];
							$duee=$row['DUE'];
							if($row['DUE']>=50 )
								{
									
									 $query2="INSERT into messcut2(id,messcutdue,month) VALUES ('$idd','$duee','$presentmonth')"; 
									 $sql2=mysqli_query($link,$query2);
									 		 $query3="UPDATE users SET messcutdue='$duee',DUE='0' WHERE ID='$idd'";
		                                     $sql3=mysqli_query($link,$query3);

								}
									else if($row['total']>=50)
									{
										
										
										
										
											$totall=$row['total'];
										
										
									 $query4="INSERT into messcut2(id,messcutdue,month) VALUES ('$idd','$totall','$presentmonth')";
											$sq4=mysqli_query($link,$query4);
										  $query5="UPDATE users SET messcutdue='$totall',total='0' WHERE ID='$idd'";
		                                     $sql5=mysqli_query($link,$query5);

									} 
						}
						else{
							$idd=$row['ID'];
							$totall=$row['total']+$row['messcutdue'];
							 $query4="update messcut2 set messcutdue='$totall' month='$presentmonth' WHERE id='$idd' ";
											$sq4=mysqli_query($link,$query4);
										  $query5="UPDATE users SET messcutdue='$totall',total='0' WHERE ID='$idd'";
		                                     $sql5=mysqli_query($link,$query5);

						}
			}

			
			
			?>