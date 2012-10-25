<!--
update values in database edited by admin in user's account
-->
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
    $DOB = $_POST['date']."/".$_POST['month']."/".$_POST['year'];
    $name = $_POST['edit_name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $type = $_POST['user_type'];
    $id = $_POST['edit_id'];
    $status = $_POST['user_status'];
    $pg = $_POST['pg'];
   // $_SESSION['user'] = $name;
        if ($_POST['gender']== 'MALE')
            $gender = 'm';
        else
        $gender = 'f';
            $query = "update user set name = '$name' , surname = '$surname',
            gender = '$gender', phone = '$phone' , type = '$type', DOB = '$DOB' , address = '$address' , isActive = '$status'
            where id = '$id' ";

mysql_query($query);
header('location:user_admin_success.php?page='.$pg.'');
?>
