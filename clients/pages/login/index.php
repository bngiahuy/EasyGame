<?php
ob_start();
set_include_path($_SERVER['DOCUMENT_ROOT'] . "/EasyGame");
include("servers/language/config.php");
// require_once("servers/connection.php");
require_once("servers/Database.php");
$db = Database::getInstance();

?>
<html>

<head>
	<title><?php echo $lang['dangnhap'] ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		@import url("https://fonts.googleapis.com/css?family=Lato:400,700");

		#bg {
			background-image: url('img/background.jpg');
			position: fixed;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			background-size: cover;
			filter: blur(5px);
		}

		body {
			font-family: 'Lato', sans-serif;
			color: #4A4A4A;
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
			overflow: hidden;
			margin: 0;
			padding: 0;
		}

		form {
			width: 350px;
			position: relative;
		}

		form .form-field::before {
			font-size: 20px;
			position: absolute;
			left: 15px;
			top: 17px;
			color: #888888;
			content: " ";
			display: block;
			background-size: cover;
			background-repeat: no-repeat;
		}

		form .form-field:nth-child(1)::before {
			background-image: url(img/user-icon.png);
			width: 20px;
			height: 20px;
			top: 15px;
		}

		form .form-field:nth-child(2)::before {
			background-image: url(img/lock-icon.png);
			width: 16px;
			height: 16px;
		}

		form .form-field {
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-pack: justify;
			-ms-flex-pack: justify;
			justify-content: space-between;
			-webkit-box-align: center;
			-ms-flex-align: center;
			align-items: center;
			margin-bottom: 1rem;
			position: relative;
		}

		form input {
			font-family: inherit;
			width: 100%;
			outline: none;
			background-color: #fff;
			border-radius: 4px;
			border: none;
			display: block;
			padding: 0.9rem 0.7rem;
			box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
			font-size: 17px;
			color: #4A4A4A;
			text-indent: 40px;
		}

		form .btn {
			outline: none;
			border: none;
			cursor: pointer;
			display: inline-block;
			margin: 0 auto;
			padding: 0.9rem 2.5rem;
			text-align: center;
			background-color: #47AB11;
			color: #fff;
			border-radius: 4px;
			box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
			font-size: 17px;
		}
	</style>
	<!-- <link rel="stylesheet" href="style.css"> -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
	<?php
	if (isset($_POST["dangnhap"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);

		if ($username == "" || $password == "") {
			echo $lang['loi1'];
		} else {

			$sql = "select * from USER where email = '$username' and password = '$password' ";
			// $query = mysqli_query($conn, $sql);
			$result = $db->query($sql);
			$num_rows = $result->num_rows;
			if (!$num_rows) {
				echo $lang['loi2'];
			} else {
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				header('Location: http://localhost/EasyGame/clients/pages/dashboard/');
				exit();
			}
		}
	}
	?>

	<div id="bg"></div>
	<form method="POST" action="index.php">
		<!--<h1><?php echo $lang['login2'] ?></h1> -->
		<div class="form-field">
			<input type="text" name="username" placeholder="Tên đăng nhập" required />
		</div>

		<div class="form-field">
			<input type="password" name="password" placeholder="Mật khẩu" required />
		</div>

		<div class="form-field">
			<button class="btn" type="submit" name="dangnhap">Đăng nhập</button>
		</div>
	</form>
</body>

</html>