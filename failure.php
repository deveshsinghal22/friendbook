<!--
in case of attempt for blocked user
-->

<?php
include('config.php');
session_start();
    if($_SESSION['status'] == 'y'){
    echo "you are blocked my son"; ?>
<a href="logout.php">exit and SignOut</a>
<?php
}
else{

?>

<html>
<body>
<center>
  <h1>  YOU ARE BLOCKED BY ADMINISTRATION </h1>
    <h3> to send a request to admin to resolve this problem <a href="block_rqst.php"> click here!!</a>
    </h3>

    or <a href="logout.php">exit</a>

</center>
</body>
</html>
<?php } ?>