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

.recipearea {
height: 300px;
width: 75%;
}

.recipe-input {
width: 50%;
margin-left: 25%
}

.error {
color: red;
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
	<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
	<script>
     tinymce.init({selector:'textarea'});
	</script>
	
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
	
$('#recipeform').validate({
  rules: {
	recipename: "required",
	category: "required",
	description: "required",
	instructions: "required",
	},
  messges: {
	recipename: {
		required: "Recipe name is required"
	},
	
	description: {
		required: "A recipe description is required"
	},
	
	instructions: {
		required: "Instructions are required"
	}
  
  }

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
          <li><a href="#">Appetizer</a></li>
          <li><a href="#">Main</a></li>
          <li><a href="#">Dessert</a></li>
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
  <h1>Add Your Recipe</h1>
  <br><br>
	<form method="post" id="recipeform" action="confirmaddrecipe.php" enctype="multipart/form-data">
	<b>Recipe Name</b><br><input type="text" name="recipename" class="form-control recipe-input"><br><br>
	<label for="file">Picture</label><br><input type="file" name="file" id="file" class="recipe-input"><br><br>
	<b>Category</b><br>
				<input type="radio" name="category" value="appetizer" checked>Appetizer &nbsp;
				<input type="radio" name="category" value="main">Main &nbsp;
				<input type="radio" name="category" value="dessert">Dessert <br>
				<br>
	<b>Tags</b><br><input type="text" name="tags" class="form-control recipe-input">
	<div><span class='help-inline'>Tags are keywords that help users find what they want.</span></div><br><br>
	<b>Description:</b><br>
	<textarea name="description" class="recipearea"></textarea><br><br>
	<b>Recipe Instructions:</b><br>
	<textarea name="instructions" class="recipearea"></textarea><br><br>
	<button type="submit" class="btn btn-warning">Submit</button>
	</form>
  
  </div>


</div>


</body>
</html>