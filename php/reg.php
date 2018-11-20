<?php 
$dbc = mysqli_connect('localhost','root','','lesson');
if(isset($_POST['submit'])) {
	$username = mysqli_real_escape_string($dbc,trim($_POST['username']));
	$password1 = mysqli_real_escape_string($dbc,trim($_POST['password1']));
	$password2 = mysqli_real_escape_string($dbc,trim($_POST['password2']));
	$email = mysqli_real_escape_string($dbc,trim($_POST['email']));
	$name = mysqli_real_escape_string($dbc,trim($_POST['name']));
	if (!empty($username) && !empty($password1) && !empty($password2) && $password1 == $password2) {
		$query = "SELECT * FROM `signup` where username = '$username'";
		$data = mysqli_query($dbc, $query);
		if(mysqli_num_rows($data) == 0)
		{
				$query = "INSERT INTO `signup` (username,password,email,name) VALUES ('$username' , SHA('$password2') , '$email' , '$name')";
				mysqli_query($dbc,$query);
				echo "Success";
				mysqli_close($dbc);
				exit();
		}
		else
		{
				echo "login is exist";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration form</title>
		<style type="text/css">
		label , input {
			width: 15px%;
			display: block;
			padding: 5px;
			float: left;
		}
		.content button{
			width: 15%;
			padding: 5px;
			background-color: #fff;
			border-color:  #4CAF50; 
		}
				.content button:hover{
			width: 15%;
			padding: 5px;
			background-color: #4CAF50;
			color: #fff;

		}
	</style>
</head>
<body>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

	<div class="content">

<p><label for="username">Введите логин</label>
	<input type="text" name="username"></p>
	<br>
		<p><label for="username">Введите имя</label>
	<input type="text" name="name"></p>
	<br>
		<p><label for="username">Введите e-mail</label>
	<input type="text" name="email"></p>
	<br>
	<p><label for="password">Пароль</label>
		<input type="password" name="password1"></p>
		<br>
	<p><label for="password">Повтор пароля</label>
	<input type="password" name="password2"></p>
	<br>
	<button type="submit" name="submit">Зарегистрировать</button>
	<a href="index.php">Вход</a>

	</form>


</div>

</body>
</html>