<?php
/*
 * insert message in database for admin sent by a blocked user
 *
 *
 * */
include('config.php');
session_start();
$current = date("Y/m/d");
$query = "insert into blockUser ( message , blockId , duedate) values ('$_POST[msg]' , '$_SESSION[id]' , '$current') ";
mysql_query($query);
header('location: logout.php');
?>