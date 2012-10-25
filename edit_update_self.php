
<!--
update values in database edited by self in user's account
-->
	<?php
		session_start();
		include('config.php');
		if($_SESSION['status'] != 'y'){
		echo "you are blocked"; 
	?>
		<a href="logout.php">exit and SignOut</a>

	<?php
		}
		else{
		$DOB = $_POST['date']."/".$_POST['month']."/".$_POST['year'];
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$id = $_POST['user_id'];


		if ($_POST['gender'] == 'MALE') {
		    $gender = 'm'; 
		}
			else {
		    	$gender = 'f';
			}

		$query = "update user set name = '$name' , surname = '$surname',
		gender = '$gender', phone = '$phone' , DOB = '$DOB' , address = '$address'
		where id = '$id' ";

		if(mysql_query($query)){

		    if($_SESSION['user'] == 'admin')
		        header('location:admin_success.php');
		    else
		        header('location:success.php');
			}
		}
	?>
