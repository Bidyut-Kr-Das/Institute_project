<?php
include("header.php");
session_start();
if (isset($_REQUEST['mode'])) {
	$username = $_REQUEST['username'];
	$password = md5($_REQUEST['password']);
	$query = "SELECT * FROM `admin` WHERE `username`='$username' ";
	$res = mysqli_query($connection, $query);
	if (mysqli_num_rows($res) != 0) {
		$rowarr = mysqli_fetch_array($res);
		if ($password == $rowarr['password']) {
			$_SESSION['id'] = $rowarr['id'];
			@header("location:group_add.php");
		}
	}
}


?>

<body style="overflow:hidden;"></body>
<div class="bgImageLogin"></div>
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login">
				<input type="hidden" name="mode" value="1">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" name="username" placeholder="User name / Email" required
						autocomplete="off">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" name="password" placeholder="Password" required
						autocomplete="off">
				</div>
				<!-- <button class="button login__submiit">
					<span class="button__text">Log In Now</span>
				</button> -->
				<div class="buttonDivLogin">
					<input type="submit" class="login__submiit" value="Log In Now">
					<i class="button__iconn fas fa-chevron-right"></i>
				</div>
			</form>

		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>
	</div>
</div>
<?php
include("footer.php");
?>