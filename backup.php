<?php
   
   
   $link = mysqli_connect("localhost", "root", "", "hostel");
   
   if(! $link ) {
      die('Could not connect: ' . mysqli_error());
   }
	
   $table_name = "employee";
   $backup_file  = "/tmp/employee.sql";
   $sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";
   
   mysql_select_db('test_db');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not take data backup: ' . mysql_error());
   }
   
   echo "Backedup  data successfully\n";
   
   mysql_close($conn);
?>