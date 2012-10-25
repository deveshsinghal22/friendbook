<?php
session_start();
include('config.php');
if($_SESSION['user'] != 'admin'){
    $invalid =   $_SESSION['email'];
    echo $invalid;

    $query ="update user set isActive ='n' where email= '$invalid' ";
    mysql_query($query, $con);
    header('location:index.php');
}
$current = date("Y/m/d");
$query ="update blockuser set status = 'a', actionDate = '$current' where id = '$_GET[id]'";
mysql_query($query);
$query ="update user set isActive = 'y' where id = '$_GET[uid]'";
mysql_query($query);
header('location: block_rqst_msg.php');
?>
