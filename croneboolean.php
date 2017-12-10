<?php
include"dbconnect.php";
$last_date = date('t');
$pr_date = date('d');
// $pr_date = "30";
if($pr_date==$last_date)
{
$date = date('Y-m-d');
	// $date = "2017-03-31";
$query = "update commpass set BOOLEAN='0' where LAST_DATE<='$date'";
mysqli_query($link,$query);

echo"Code Successfully Executed And Present Committe Changed to Expired Committee";
}
else{
	echo"Sorry!!!! ERROR because it runs at the last day of every month @ 9:25pm";
}

?>