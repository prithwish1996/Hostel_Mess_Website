<?php

/* Attempt MySQL server connection. Assuming you are running MySQL

server with default setting (user 'root' with no password) */

$link = mysqli_connect("localhost", "root", "", "hostel");




// Check connection

if($link === false){

    die("OOps Unable to connect to the database. " . mysqli_connect_error());

}

date_default_timezone_set('Asia/Kolkata');

?>
