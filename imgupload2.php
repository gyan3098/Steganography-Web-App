<?php 

session_start();
include 'databaseb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Decrypt</title>
    
</head>
<style >
  body {
  background-image: url(./images/blue-snow.png);
  background-repeat: repeat;
  background-size: auto;
  height: 80%;
}
.purple-square-container {
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.purple-square {
  background-image: url(./images/lock2.png);
  background-repeat: no-repeat;
  width: 500px;
  height: 500px;
}
.aligning {
  padding: 20px 20px 20px 20px;
  width: auto;
  height: auto; 
}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 8px;
}
</style>
<body>
   <h1 align="center">Decrypt</h1>
   <a href="imgupload.php">Encrypt</a>
   <br>
   <a href="welcome.php"> Home Page</a>
  <p stylt="padding-left: 100px;padding-right: 100px;">Steganography plays an important role in hiding your identity<p>

  <div class= " purple-square-container">
    <div class="purple-square" >
      
    <div class="aligning"> 
    <form action="upload-manager.php" method ="POST" enctype="multipart/form-data">
    Image: <input type="file" name="file" required="true">
    <br>
    <br>
    
    <button type="submit" name="submit">UPLOAD</button>
</form>

<?php
if(!empty($_GET['mess2'])){
  echo "<br>";
  

  echo "<script>
      alert('Successfully decrypted!!!');
      
      </script>";
      echo "message  :";
  echo $_SESSION['message'];
  

  $conn = OpenCon();
  
  $query = "UPDATE errorshap SET NUMBEROF = NUMBEROF + 1 WHERE TYPEOF = 'Decrypted'";
  $result = mysqli_query($conn,$query);
  CloseCon($conn);
  
  
}
?>
</body>

</html>