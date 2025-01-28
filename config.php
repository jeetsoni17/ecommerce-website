<?php
session_start();
$servername = "localhost";
$username = "eshie";
$password = "esh@17";
$dbname = "Audioryx";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);

if(!empty($_SESSION['user']))
	$link = $_SESSION['user'];
else
	$link = 'Login';
}
?>
<html>
<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
</head>
<body>
<div class="topnav">
  	<a href="index.php" style="font-size: 30px; letter-spacing:2px; padding-top: 15px; padding-left:20px; font-weight: lighter; color:#44dbfa; text-shadow: 0px 0px 15px #44dbfa">Audioryx</a>
  	<!--SoundCity 
  		AudioCity
  		Musicity
  		Synthesize -->
  	<div class="search"> 
  		<form action="list.php" method="GET">
		    <input type="text" placeholder="Search..." name="searchval"> 
    		<button><img src="icons/search.png" class="icons" id="search"></button> 
		</form>
	</div>
	<?php 
	if(!empty($_SESSION['user']))
		$link = $_SESSION['user'];
	else
		$link = 'Login';
	if($_SESSION['user'] == "admin")
	{
		echo "<a href='login.php'><img src='icons/name.png' class='icons-small'>$link</a>"; 
		echo "<a href='addProduct.php'><img src='icons/plus.png' class='icons-small'>Add</a>"; 
		echo "<a href='composeMail.php'><img src='icons/mail.png' class='icons-small'>Mail</a>";
	}
	else
	{
		echo "<a href='login.php'><img src='icons/name.png' class='icons-small'>$link</a>"; 
		echo "<a href='cart.php'><img src='icons/cart.png' class='icons-small'>Cart</a>";
		echo "<a href='wishlist.php'><img src='icons/heart.png' class='icons-small'>Wishlist</a>";
	}
	?>												 
</div>
</body>
</html>