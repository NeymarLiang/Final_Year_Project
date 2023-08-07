<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Upload Picture</title>
  <style type="text/css">
    a{
      text-decoration: none;
      color: black;
      font-size: 20px;
      font-family: 'GT America Extended Bold', sans-serif;
      margin-left: 20px;
    }

    a:hover{
      color: gray;
    }

    .p{
      font-size: 30px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <center>
    <br>
    <br>
  <a href="fypAdminSalesRecord.php">All Sales</a>
  <a href="fypAdminSearch.php">Search By Condition</a>
  <a href="fypEditItem.php">UPPER OUTER GARMENT
 </a><a class='ww' href="fypEditItem2.php">THE TROUSERS</a>
  <a class='ww' href="fypEditAccount.php">Account</a><a class='ww' href="fypFeedback.php">Feedback</a>
 <a href="fypUpload.php">Upload Image</a><a class='ww' href="fypEditAccount.php">Logout</a>
    <form method="post" enctype="multipart/form-data">
        <p class="p">Upload Image</p>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br>
        <br>
        <input type="submit" name="submit" value="UPLOAD">
    </form>
  </center>
</body>
</html>
<?php
  include'fypDatabase.php';

  session_start();

    if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== "admin" || empty($_SESSION['admin'])) {
      header('Location: fypAdminLogin.php');
      exit;
    }

if (isset($_POST['submit'])) {
  $target_dir = "images/"; 
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  if ($_FILES["fileToUpload"]["size"] > 100000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
  header("Location: fypUpload.php");
}
?>

