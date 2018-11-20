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
						header('Location: '.$home_url);
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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index</title>
</head>
<body>
	<?php 
if (empty($_COOKIE['username'])) {
?>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p><label for="username">Login:</label>
	<input type="text" name="username"></p>
	<p><label for="password">Password:</label>
	<input type="password" name="password"></p>
	<a href="reg.php">Registration</a>	
	<button type="submit" name="submit">Вход</button>	
<?php 
} 
else {
	?>
	<p><a href="myprofile.php">Мой профиль</a></p>
	<p><a href="exit.php">Выйти</a></p>
	<p><a href="fileupload.php">Загрузить файл</a></p>
	<?php
}
?>


	</form>
</body>
</html>