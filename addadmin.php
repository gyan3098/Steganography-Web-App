<?php

	include 'databaseb.php';

	$conn = OpenCon();
	$usrname = $_POST['usrname'];
	$psw = $_POST['psw'];
	$email = $_POST['email'];
	$password = password_hash($psw,PASSWORD_BCRYPT);

	$query = "INSERT INTO members VALUES ('','$usrname','$password','$email')";
	$result = mysqli_query($conn,$query);
	
	if($result){
		
		header('Location: ../login/admin.php');
	}
	CloseCon($conn);
	//header("Location: admin.php");

	?>