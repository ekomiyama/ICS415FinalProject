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
padding-bottom: 25px;
padding-top: 25px;
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

.recipearea {
height: 300px;
width: 75%;
}

.recipe-input {
width: 50%;
margin-left: 25%
}

</style>

</head>
<body>
<?PHP
$mysqli = mysqli_connect("localhost","ics415", "","ics415");


if(! mysqli_query($mysqli, "CREATE TABLE IF NOT EXISTS Users_qf(ID int NOT NULL AUTO_INCREMENT, Username varchar(255), password varchar(255), PRIMARY KEY (ID));")) {
 echo "ERROR: create table 'Users_qf' failed";
} else {
//Do Nothing
}

if(! mysqli_query($mysqli, "CREATE TABLE IF NOT EXISTS Recipes(ID int NOT NULL AUTO_INCREMENT, Name varchar(255), Tags varchar(255), Description varchar(255), Procedures varchar(255), PRIMARY KEY (ID));")) {
 echo "ERROR: create table 'Recipes' failed";
} else {
//Do Nothing
}


?>
<script>
$(document).ready(function() {
	$('#registerbutton').click(function() {
		$('#loginmodal').modal('hide');
	});
	
	
});

</script>

 
<?PHP


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
	  <li><a href="#">Favorite Recipes</a></li>
	  <li><a href="#">Add Recipe</a></li>
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search for keywords">
      </div>
      <button type="submit" class="btn btn-warning">Search</button>
    </form>
	</ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a class="clickable" data-toggle="modal" data-target="#loginmodal">Login/Register</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>

<div class="container row maincontainer">
  <div class="container col-md-8 backcolor maincolumn">
	<form>
	Recipe Name<br><input type="text" class="form-control recipe-input"><br><br>
	Tags<br><input type="text" class="form-control recipe-input">
	<div><span class='help-inline'>Tags are keywords that help users find what they want.</span></div><br><br>
	Description:<br>
	<textarea class="recipearea"></textarea><br><br>
	Recipe:<br>
	<textarea class="recipearea"></textarea><br><br>
	<button type="submit" class="btn btn-warning">Submit</button>
	</form>
  
  </div>


</div>







<div class="modal fade" id="loginmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        <form>
			Username <input type="text" class="form-control modal-form-control" placeholder="Username"><br>
			Password  <input type="password"class="form-control modal-form-control" placeholder="Password"><br>
			<a id="registerbutton" class="btn btn-default" data-toggle="modal" data-target="#registermodal">Register</a>
			<button type="Submit" class="btn btn-primary">Login</button>
		</form><br>
      </div>
      <div class="modal-footer">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal" id="registermodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Sign Up</h4>
      </div>
      <div class="modal-body">
        <form>
			Username <input type="text" class="form-control modal-form-control" placeholder="Username"><br>
			Password  <input type="password"class="form-control modal-form-control" placeholder="Password"><br>
			Retype Password  <input type="password"class="form-control modal-form-control" placeholder="Password"><br>
			<button type="Submit" class="btn btn-primary">Submit</button>
		</form><br>
      </div>
      <div class="modal-footer">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>