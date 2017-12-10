<?php
include"dbconnect.php";
$last_date = date('t');
$pr_date = date('d');
// $pr_date = "30";
if($pr_date==$last_date)
{
$query1 = "delete from dummypurchases";
$query5 = "delete from purchases";

mysqli_query($link,$query1);

$query2 = "select * from purchases";
$r = mysqli_query($link,$query2);
$flag=0;
if(mysqli_num_rows($r)!=0)
{
  while($row=mysqli_fetch_array($r))
  {
  $query3 = "insert into dummypurchases (DATE,EXPENDITURE_PAID,EXPENDITURE_UNPAID,ESTABLISHMENT_PAID,ESTABLISHMENT_UNPAID)
  values('".$row['Date']."','".$row['Expenditure_Paid']."','".$row['Expenditure_Unpaid']."','".$row['Establishment_Paid']."','".$row['Establishment_Unpaid']."')";
  if(mysqli_query($link,$query3))
  {
    $flag=1;
  }
  else{
    $flag=0;
    break;
  }
}

if($flag==1)
{
  mysqli_query($link,$query5);
  
}
}
echo"Code for transferring Dummy Purchases Successfully Run";
}
else{
  echo"Sorry!!! This Code Runs at end of every Month 9:30pm";
}


 ?>