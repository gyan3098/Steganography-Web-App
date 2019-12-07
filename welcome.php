<!DOCTYPE html>
<html>
<title>Steganography</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h5 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-image: url('./images/lines.jpg');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
</style>
<body>

<div class="bgimg w3-display-container w3-text-white">
  <div class="w3-display-middle w3-jumbo">
    <p>STEGANOGRAPHY</p>
  </div>
  <div class="w3-display-topleft w3-container w3-xlarge">
    <p><button onclick="document.getElementById('menu').style.display='block'" class="w3-button w3-black">menu</button></p>
    <p><button onclick="document.getElementById('contact').style.display='block'" class="w3-button w3-black">contact</button></p>
    <p><button onclick="document.getElementById('admin').style.display='block'" class="w3-button w3-black">admin</button></p>
  </div>
  <div class="w3-display-bottomleft w3-container">
    
    <p class="w3-large">This site is made by Gyan Ranjan from scratch </p>
    
  </div>
</div>

<!-- Menu Modal -->
<div id="menu" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container"><h2>What do you want to do today?</h2></div>
    <div class="w3-container w3-black w3-display-container">
      <span onclick="document.getElementById('menu').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1><a href='imageupload.php'>Encrypt</a></h1>
    </div>
    
    <div class="w3-container w3-black">
      <h1><a href='imgupload2.php'>Decrypt</a></h1>
    </div>
    
    <div class="w3-container w3-black">
      <h1>Hash</h1>
    </div>
    
  </div>
</div>

<!-- Contact Modal -->
<div id="contact" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-black">
      <span onclick="document.getElementById('contact').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1>Contact</h1>
    </div>
    <div class="w3-container">
      <p>Please give some suggestions</p>
      <form action="/action_page.php" target="_blank">
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
       
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message" required name="Message"></p>
        <p><button class="w3-button" type="submit">SEND MESSAGE</button></p>
      </form>
    </div>
  </div>
</div>
<div id="admin" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container"><h2>Are u an admin??</h2></div>
    <div class="w3-container w3-black w3-display-container">
      <span onclick="document.getElementById('admin').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1><a href='../login/index.php'>Login</a></h1>
    </div>
    </div>
    
  </div>
</div>

</body>
</html>

