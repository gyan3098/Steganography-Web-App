<?php 
if(isset($_SESSION)){

session_destroy();
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Encrypt</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"  href="cdns.min.css">
<style>
  html,
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
  background-image: url(./images/lock3.png);
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
</head>
<body >
  <h1 align="center">Encrypt</h1>
   <a href="imgupload2.php">Decrypt</a>
   <br>
   <a href="welcome.php"> Home Page</a>
  <p stylt="padding-left: 100px;padding-right: 100px;">Encryption is very important nowadays<p> 
  <div class= " purple-square-container">
    <div class="purple-square" >
      
    <div class="aligning">
      
    
    <form action="upload.php" method ="POST" enctype="multipart/form-data" >
    Image: <input type="file" name="file" required="true">
    <br>
    <br>
    Message: <input type="text" name="message" required="true">
    <br>
    <br>
    <button type="submit" name="submit" class="button">UPLOAD</button>
  </form>
 


<div id="content" <?php if (empty($_GET['mess'])){ echo 'style="display:none;"'; } ?>>
  
  <a href="<?php echo $_SESSION['result']; ?>" download>
  <img src="<?php echo $_SESSION['result']; ?>" alt="encryptedimage" width="104" height="142">
</a>
	<p> click on image to download</p>
<?php 
if(!empty($_GET['mess'])){
  echo "<br>";
  echo $_GET['mess'];
  echo "<br>";
  
  echo "<script>
      alert('Success!!!');
      
      </script>";
  
  echo $_SESSION['result'];
  include 'databaseb.php';

  $conn = OpenCon();
  
  $query = "UPDATE errorshap SET NUMBEROF = NUMBEROF + 1 WHERE TYPEOF = 'Encrypted'";
  $result = mysqli_query($conn,$query);
  CloseCon($conn);
}
?>
</div>
</div>
  </div>    
</div>
</body>
</html>