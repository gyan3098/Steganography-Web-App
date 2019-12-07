<?php

if(isset($_POST['submit'])){
	$file = $_FILES['file'];
	session_start();
	
	include 'databaseb.php';
    $conn = OpenCon();

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.',$fileName);
	$fileActualExt = strtolower(end($fileExt));


	$allowed  = array('jpg','jpeg');

	if(in_array($fileActualExt,$allowed)){
		if($fileError === 0){
			if($fileSize < 100000000){
				if(!empty($_POST["message"])){

				//$messag = $_POST["message"];
				
				$fileNameNew = uniqid('',true).".".$fileActualExt;
				$fileDestination = './encrypted/'.$fileNameNew;
				
				move_uploaded_file($fileTmpName, $fileDestination);
				$_SESSION['message']= $_POST['message'];
				$_SESSION['fileDest'] = $fileDestination;
				echo $_SESSION['message'];
				echo $_SESSION['fileDest'];
				header('Location: encrypt.php');
			
				} 
			}
			else {
			//echo "Your file is too big";
				 $query = "UPDATE errorshap SET NUMBEROF = NUMBEROF + 1 WHERE TYPEOF = 'Exceeds'";
				 $result = mysqli_query($conn,$query);
			echo "<script>
			alert('Your file is too big');
			window.location.href='imageupload.php';
			</script>";
				}

			} 
		else {
		//echo "there was an error uploading your file";
			$query = "UPDATE errorshap SET NUMBEROF = NUMBEROF + 1 WHERE TYPEOF = 'Error'";
			$result = mysqli_query($conn,$query);
		echo "<script>
			alert('there was an error uploading your file');
			window.location.href='imageupload.php';
			</script>";
			}
		} 
	else{
		$query = "UPDATE errorshap SET NUMBEROF = NUMBEROF + 1 WHERE TYPEOF = 'Type'";
		$result = mysqli_query($conn,$query);
			echo "<script>
			alert('You cannot upload files of this type!');
			window.location.href='imageupload.php';
			</script>";
		//echo "You cannot upload files of this type! ";
		}
	 CloseCon($conn);
	}

?>