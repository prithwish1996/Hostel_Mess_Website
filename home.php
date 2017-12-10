<?php
session_start();
if($_SESSION['seclogin']=="1")
{
echo"<script> window.open('optionusers.php','_self');</script>";
}
else if($_SESSION['prcommlogin'] == "1")
{
  echo"<script> window.open('optioncomm.php','_self');</script>";
}
else if($_SESSION['expcommlogin'] == "1")
{
  echo"<script> window.open('expcomm.php','_self');</script>";
}
else
{
  echo"<script> window.open('login.php','_self');</script>";

}
?>
