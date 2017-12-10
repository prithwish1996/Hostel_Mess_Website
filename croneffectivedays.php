<?php
include"dbconnect.php";
$query1 = "delete from dummyeffdays";
mysqli_query($link,$query1);
$query2 = "select * from messjoin where ID!='0'";
$query3 = "select * from reduction where ID!='0'";
$r1 = mysqli_query($link,$query2);
$r2 = mysqli_query($link,$query3);
$flag=0;
while($row1 = mysqli_fetch_array($r1))
{
	
	echo $row1['ID'];
	while($row2 = mysqli_fetch_array($r2))
	{
		echo $row2['ID'];
		echo"or";
		if($row1['ID']==$row2['ID'])
		{  
			echo $row2['ID'];
			$eff = $row1['effective']-$row2['total']-8;
			$flag=1;
			
			break;
		}
	}
	if($flag==0)
	{
		$eff = $row1['effective'] - 8;
	}

	if($eff<5)
	{
		$eff=5;
	}
	$flag=0;
	$query4 = "insert into dummyeffdays (ID,EFFECTIVE_DAYS) values ('".$row1['ID']."','$eff')";
	if(mysqli_query($link,$query4))
		{
			echo"success";
		}
	else{
		echo"not";
	}
}

$query5 = "delete from messjoin where ID!=0";
mysqli_query($link,$query5);
$query6 = "delete from reduction where ID!=0";
mysqli_query($link,$query6);





?>