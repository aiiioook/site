<?php 

	$dbc = mysqli_connect('localhost','root','','lesson');
	if (!isset($_COOKIE['user_id'])) {
		if (isset($_POST['submit'])) {
			$username = mysqli_real_escape_string($dbc,trim($_POST['username']));
			$password = mysqli_real_escape_string($dbc,trim($_POST['password']));
			if(!empty($username) && !empty($password))
			{
				$query = "SELECT `user_id` , `username` FROM `signup` WHERE username = '$username' AND password = SHA('$password')";
				$data = mysqli_query($dbc,$query);
				if(mysqli_num_rows($data) == 1)
				{
						$row = mysqli_fetch_assoc($data);
						setcookie('user_id',$row['user_id'],time() * 60*60*24*30);
						setcookie('username',$row['username'],time() * 60*60*24*30);
						$home_url = 'http://' . $_SERVER['HTTP_HOST'];
						//header('Location: '.$home_url);
						//header('Location: index.php#content');
		
						header('Window-target: _content');
						header("Refresh:0");
		
				}
				else{
						echo "Wrong password";
				}
			}
			else
			{
				echo "Empty field";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Personal Site</title>
		<link type="text/css" rel="stylesheet" href="style/style.css">
		<link rel="stylesheet" type="text/css" href="fonts/fonts.css">
		<link rel="icon" href="favicon.ico">
</head>
	<body onload="onstart()">
		<header class="logo">
			<a href="#"><img class="graficlogo" src="img/logo3.png" alt="logo"></a>
		</header>
		<div class="menu">			
<nav>
	<div class="topnav" id="myTopnav">
		<a href="content.php" target="content">Home</a>
		<a href="http://www.wikipedia.org" target="newblank">Wiki</a>
		<a href="http://www.vk.com/v_l_v" target="newblank">VK-Page</a>
				<a href="about.php" target="content">About</a>
		<!-- <a id="menushka" href="#" class="icon">&#9776</a> -->
			<?php 
if (!isset($_COOKIE['username']) && !isset($_COOKIE['user_id'])) {
?>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="autoriz">
			<a href="php/reg.php" target="content">Registration</a>	
			<div class="autoriz" style="font-size: 27px;padding-top: 13px">
		<p><label for="username">login:</label></p>
	<p><input type="text" name="username"></p>
	<p><label for="password">password:</label></p>
	<p><input type="password" name="password"></p>
	<button type="submit" name="submit">Вход</button>	
	</div>		
			</div>
		
<?php 
} 
else {
	?>
		<a href="php/myprofile.php" target="content">My profile</a>
		<a href="php/exit.php" target="_top" style="color: red">Log out <?php echo '('. htmlspecialchars($_COOKIE["username"]) . ')';?> </a> 
		<a href="php/fileupload.php" target="content">Upload you work</a>
	
	<?php	
}
?>

	</div>
</nav>
<footer>
	<div class="content">



	</div>
</footer>
			<script src="js/script.js" type="text/javascript"></script>
</body>
</html>