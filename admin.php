<?php 
session_start();

require_once "authCookieSessionValidate.php";

if(!$isLoggedIn) {
    header("Location: ./");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
  body{
     background-image: url('./images/14886.jpg');
     background-repeat: repeat;
  }
  #leftbox { 
                float:left; 
                width: auto;
                padding-left: 20px;
                height: auto; 
            }
    #rightbox { 
                float:right; 
              
                padding-right: 20px;
                width: auto;
                height: auto; 
                
            }
#image{
  border-radius: 50%;
}
input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

/* Style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
}

/* Style the container for inputs */
.container {
  background-color: #f1f1f1;
  padding: 20px;
  width: 400px;
}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
  width: 400px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
  width: 400px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>
<body>


<h1 align="center">Admin</h1>
<div align="center">
<img id="image" src="./images/gyan.jpg" alt="Admin" width="200" height="200"  >
</div>
<br>
<a href="logout.php">LOGOUT</a>
<br>
<a href="../stega/welcome.php">HOME PAGE</a>
<br>
<a href="../stega/imageupload.php">ENCYPTION</a>
<br>
<a href="../stega/imgupload2.php">DECRYPTION</a>


	<?php
  include 'databaseb.php';
  $conn = OpenCon();
	$query = "SELECT * FROM errorshap";
	$result = mysqli_query($conn,$query)
?>

<div class="col-md-5" align="left">
<table class="table table-dark ">
  <thead>
    <tr>
     
      <th scope="col">ErrorType</th>
      <th scope="col">NumberOf</th>

    </tr>
  </thead>
 
<?php   
while ($array = mysqli_fetch_row($result)) 
{ 
	?>

  <tbody>
    <tr>
      <td><?php echo $array[0];?></td>
	    <td><?php echo $array[1];?></td>
    </tr>
  </tbody>   

<?php 
} 
?>
</table> 
</div> 

<?php mysqli_free_result($result);
 CloseCon($conn); ?>

<div id="member" >
 <pre>You can add admin from here                        </pre> <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo" padding-right="20px" >Add Admin</button>
  <div id="demo" class="collapse">
    
<div class="container" >
  <form action="../stega/addadmin.php" method="post">
   
    <label for="usrname">Admin name</label><br>
    <input type="text" id="usrname" name="usrname" required>
    <br>
    <label for="email">Email</label>
    <br>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="psw">Password</label><br>
    <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    
    <input type="submit" value="Submit">
  </form>
</div>

<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
				
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
</div>
</div>
</table>
</body>
</html>