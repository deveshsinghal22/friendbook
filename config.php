<?php
//database connection configuration

	$con = mysql_connect("localhost", "root", "");
	
	if (!$con) {
	    die('Could not connect: ' . mysql_error());
		}
	else
	    mysql_select_db("friendbook", $con);

?>