<!DOCTYPE html>
<html>
<head>
</head>
<body>
<script src="https://code.jquery.com/jquery.js"></script>
<script src="js/jquery-cookie-master/jquery.cookie.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>

<?PHP
session_start();
$mysqli = mysqli_connect("localhost","ics415", "","ics415");
$username = $_POST['username'];
$password = $_POST['password'];
$redirectPage = 'index.php';
if(isset($_SESSION['login']) && $_SESSION['login'] == true) {
	$result = mysqli_query($mysqli, "SELECT * FROM Users_qf WHERE username='$username' AND password='$password'");
	if(mysqli_num_rows($result) == 0) {
		$_SESSION['badlogin'] = true;
		$_SESSION['login'] = false;
		header('Refresh: 1;url='.$_SERVER['HTTP_REFERER']);
	}else {
		echo "<p>Thank You For Logging In, ".$username."! Redirecting you to the home page...</p>";
		setcookie('CurrentUser', $username, time() + 3600);
		$_SESSION['login'] = false;
		header('Refresh: 1; url=index.php'); 
	}
	
} else if(isset($_SESSION['register']) && $_SESSION['register'] == true) {
	$result = mysqli_query($mysqli, "SELECT * FROM Users_qf WHERE username='$username'");
	if(mysqli_num_rows($result) != 0) {
		$_SESSION['exists'] = true;
		$_SESSION['register'] = false;
		header('Refresh: 1;url='.$_SERVER['HTTP_REFERER']); 
	}else if($password != $_POST['retypepassword']){
		$_SESSION['badpassword'] = true;
		$_SESSION['register'] = false;
		header('Refresh: 0; url='.$_SERVER['HTTP_REFERER']); 
	}else {
		echo "<p>Thank You for Registering, ".$username."!</p>";
		setcookie('CurrentUser', $username, time() + 3600);
		mysqli_query($mysqli, "INSERT INTO users_qf (username, password) VALUES ('$username', '$password')"); 
		$_SESSION['register'] = false;
		header('Refresh: 1; url=index.php'); 
	}
}


?>

<p>If you are not automatically redirected, <a href="index.php">click here</a></p>
<?PHP die(); ?>

</body>
</html>