<!DOCTYPE html>
<html>
<head>
</head>
<body>
<script src="https://code.jquery.com/jquery.js"></script>
<script src="js/jquery-cookie-master/jquery.cookie.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>

<?php
if(!empty($_FILES['file']['name'])) {
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2000000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }
  
 }
?> 

<?PHP
session_start();
$mysqli = mysqli_connect("localhost","ics415", "","ics415");
$recipename = $_POST['recipename'];
$tags = $_POST['tags'];
$category = $_POST['category'];
$description = $_POST['description'];
$instructions = $_POST['instructions'];
$user = $_COOKIE['CurrentUser'];
if(!empty($_FILES['file']['name'])) {
$photoname = $_FILES["file"]["name"];
}else {
$photoname = "N/A";
}

$redirectPage = 'index.php';
if(isset($_COOKIE['CurrentUser'])) {
		echo "<p>Thank You for Contributing, ".$user."!</p>";
		setcookie('CurrentUser', $user, time() + 3600);
		mysqli_query($mysqli, "INSERT INTO Recipes (Name, PictureName, Category, Tags, Description, Procedures, Author) VALUES ('$recipename', '$photoname', '$category', '$tags', '$description', '$instructions', '$user')"); 
		header('Refresh: 0; url=index.php'); 
	}


?>

<p>If you are not automatically redirected, <a href="index.php">click here</a></p>
<?PHP die(); ?>

</body>
</html>