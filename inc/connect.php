<?php 
	$connection = mysqli_connect('127.0.0.1:56116','azure','6#vWHD_$','localdb');

	if (mysqli_connect_errno()) {
		die('Database connection failed' . mysqli_connect_errno());
	}else{
		echo "connection successful";
	}
?>