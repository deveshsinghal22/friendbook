<!--
page for check login authentication, type and status authentication
-->
<?php
include('config.php');
session_start();

?>

<html>
<body>
<?php
//echo " select password from user where email='$_POST[username]' ";
$query = mysql_query(" select id,password ,name,email,type,isActive from user where email='$_POST[username]' ");
$encrypted_password = md5($_POST['password']);
while ($row = mysql_fetch_array($query)) {
    $inpass = $row['password'];
    $uname = $row['name'];
    $umail = $row['email'];
    $type= $row['type'];
   $id = $row['id'];
    $status = $row['isActive'];
    echo "<br />";
}
if ($inpass == $encrypted_password) {


    $_SESSION['user'] = $uname;
    $_SESSION['email'] = $umail;
    $_SESSION['id'] = $id;
    $_SESSION['status'] = $status;

    if($type== 'a'){
        header('location:admin_success.php');
    }
    else if($status == 'y'){
         header('location:success.php');
    }
    else {
             header('location:failure.php');
    }
}   else {
            $_SESSION['invalid'] = "fail";
             header('location:index.php');
}

?>
</body>
</html>