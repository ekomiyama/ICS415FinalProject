<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap-theme.min.css">

<link rel="stylesheet" href="css/stylesheet.css">


<title>QuickFood</title>
<style>
body {
background: url(images/peppers.jpg) no-repeat center center fixed;
background-position:center;
background-size:cover;
padding-top:80px;
}

.navcolor {
background-color: white;
opacity: 0.95;
vertical-align: text-bottom;
}

.nav {
height: 75px;
}

.nav, .navbar-nav, .navbar-fixed-top, .nav-pills, .navbar-header, .navbar-form {
padding-top: 5px;
font-size: 20px;
}

.navbar-brand {
font-size: 20px;
}

.navbar-right {
padding-right: 25px;
}


.backcolor {
background-color: white;
}

.btnbackcolor {
background-color: orange;
}

.maincontainer {
padding-top: 100px;
}

.maincolumn {
text-align: center;
border-radius: 10px;
margin-left: 20%;
margin-right: 25%;
margin-bottom: 25%;
padding-top: 25px;
padding-bottom: 25px;
width: 70%
}

a.clickable {
cursor: pointer;
}

.modal-dialog {
margin-top: 10%;

}

.modal-form-control {
width: 40%;
}

.modal-title {
font-size: 30px;
}

.welcome {
margin-top: 10px;
}
</style>

</head>
<body>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-cookie-master/jquery.cookie.js"></script>
	<script src="js/jquery-validation-1.11.1/dist/jquery.validate.min.js"></script>
	
<?PHP
$mysqli = mysqli_connect("localhost","ics415", "","ics415");


if(! mysqli_query($mysqli, "CREATE TABLE IF NOT EXISTS Users_qf(ID int NOT NULL AUTO_INCREMENT, Username varchar(255), password varchar(255), PRIMARY KEY (ID));")) {
 echo "ERROR: create table 'Users_qf' failed";
} else {
//Do Nothing
}

if(! mysqli_query($mysqli, "CREATE TABLE IF NOT EXISTS Recipes(ID int NOT NULL AUTO_INCREMENT, Name varchar(255), PictureName varchar(255), Category varchar(255), Tags varchar(255), Description varchar(255), Procedures varchar(5000), Author varchar(255), PRIMARY KEY (ID));")) {
 echo "ERROR: create table 'Recipes' failed";
} else {
//Do Nothing
}


?>
<script>
$(document).ready(function() {
	$('#logout').click(function() {
		$.removeCookie('CurrentUser');
	});
});
</script>
<?PHP
if(isset($_POST['logoutbutton'])) {
setcookie('CurrentUser', '', time()-3600);
}
?>
<nav class="nav navbar-fixed-top nav-pills navcolor" role="navigation">
<div class="navbar-header">
    <button type="button" class="navbar-toggle btnbackcolor" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar backcolor"></span>
      <span class="icon-bar backcolor"></span>
      <span class="icon-bar backcolor"></span>
    </button>
    <a class="navbar-brand" href="index.php">QuickFood</a>
  </div>
  
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse backcolor" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
	<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Recipes<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="recipes.php?Appetizer">Appetizer</a></li>
          <li><a href="recipes.php?Main">Main</a></li>
          <li><a href="recipes.php?Dessert">Dessert</a></li>
        </ul>
      </li>
      <li><a href="about.php">About Us</a></li>
	  <?PHP
		if(isset($_COOKIE['CurrentUser'])) {
			echo "<li><a href='#'>Favorite Recipes</a></li>";
			echo "<li><a href='addrecipe.php'>Add Recipe</a></li>";
		}
	  ?>
    <form class="navbar-form navbar-left" role="search" action="recipes.php?Search">
      <div class="form-group">
        <input type="text" class="form-control" name="search" placeholder="Search for keywords">
      </div>
      <button type="submit" name="searchbutton" class="btn btn-warning">Search</button>
    </form>
	</ul>
    <ul class="nav navbar-nav navbar-right">
		<?PHP 
			if(isset($_COOKIE['CurrentUser'])) {
				echo "<li><p class='welcome'>Welcome, ".$_COOKIE['CurrentUser']."!</p></li>";
				echo "<li><a class='clickable' href='index.php'><div id='logout'>Logout</div></a></li>";
			}else {
				echo "<li><a class='clickable' href='login.php'>Login</a></li>";
				echo "<li><a class='clickable' href='signup.php'>Register</a></li>";
			}
			
		?>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>

<div class="container row maincontainer">
  <div class="container col-md-8 backcolor maincolumn">
	<h1>Welcome!</h1>
	<br><br>
	<p>This is a website dedicated to the procrastinating cook who waits until the last minute to figure out what to make for a meal. Whether you're on the go or at home, QuickFood is a great place to quickly find all of your recipes.</p>
	<br><br>
	<p>Create an account and save your favorite recipes for later or even submit your own! QuickFood encourages users to help grow our collection of great recipes that others will be dying to try!</p>
	<br><br>
  
  </div>


</div>

</body>
</html>