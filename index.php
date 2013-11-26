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

.maincontainer {
padding-top: 100px;
margin-left: 25%;
margin-right: 25%;
margin-bottom: 25%;
}

.maincolumn {
height: 500px;
text-align: center;
border-radius: 10px;
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

</style>

</head>
<body>
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
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">QuickFood</a>
  </div>
  
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
    </ul>
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-warning">Search</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a class="clickable" data-toggle="modal" data-target="#loginmodal">Login/Register</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>

<div class="container row maincontainer">
  <div class="container col-md-8 backcolor maincolumn">
	<h1>Welcome!</h1>
	<br><br>
	<p>This is a website dedicated to the procrastinating cook who waits until the last minute to figure out what to make for a meal. Whether you're on the go or at home, QuickFood is a great place to quickly find all kinds of recipes.</p>
	<br><br>
	<p>Create an account and save your favorite recipes for later or even submit your own! QuickFood encourages users to help grow our collection of great recipes that others will be dying to try!</p>
  
  
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