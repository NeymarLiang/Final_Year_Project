<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - GLIMPSE</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fypHeaderCss.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<style type="text/css">
		.up{
			font-family:verdana;
			font-size: 24px;
			margin-top: 10px;
			margin-bottom: 10px;
		}

		.pu{
			font-size: 18px;
			border-radius: 4px;
			height: 20px;
			padding: 5px;
		}

		.a{
			border: none;
			background-color: transparent;
			font-size: 17px;
			cursor: pointer;
			margin-left: 7px;
			margin-right: 7px;
			margin-bottom: 8px;
		}

		.a:hover{
			color:#b0b0b0;
		}

		.container{
			background-color: #ebebeb;
			width: auto;
			height: 700px;	
		}

	</style>

</head>
<body>
	<div id="header"></div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
	  $(function(){
	    $("#header").load("fypHeader.html"); 
	  });
	</script>
	<form method="post">
		<center>
		<div class="container">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<p style="font-size: 40px; font-weight: bold; font-family:verdana;">LOGIN</p>
			<br>
			<p class="up">Username</p>
			<input type="input" name="username" class="pu" >
			<p class="up">Password</p>
			<input type="password" name="password" class="pu">
			<p></p>
			<br>
			<input type="submit" name="login" value="LOGIN" class="a"> <input type="submit" class="a" name="register" value="REGISTER"> <br> 
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
		</div>
		</center>
	</form>
	
	<div class="bottom">
		<div class="cs">
			<p class="bold">CONTACT US</p>
			<br>
			<p style="color:#8a8a8a;font-size: 13px;font-weight: bold;">Email : &nbsp;yapyiliangww123@gmail.com</p>
			<br>
			<p style="color:#8a8a8a;font-size: 13px;font-weight: bold;">PH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: +60172223195
			<br>
			<br>
			<br>
			<br>
			<br>
			<p style="color:#8a8a8a;font-size: 13px;font-weight: bold;">Copyright © 2023 YYL design</p>
		</div>
		<div class="follow">
			<p class="bold">FOLLOW US</p>
			<br>
			<a href="https://www.facebook.com/yiliang.yap.7" class="fa fa-facebook"></a>&nbsp;
			<a href="https://wa.me/0172223195"><i class="fa">&#xf232;</i></a>&nbsp;
			<a href="https://instagram.com/yuliang1002?igshid=ZDdkNTZiNTM=" class="fa fa-instagram"></a>
		</div>
		<div class="follow">
			<p class="bold">FEEDBACK</p>
			<br>
			<form method="post">
				<textarea id="fback" name="fback" class="fback"rows="5" cols="50" ></textarea>
				<br>
				<br>
				<input name="submit" type="submit" value="submit" class="button">
			</form>
		</div>

	</div>

	<script>
	  // $(function(){
	  //   $("#footer").load("fypFooter.php"); 
	  // });
	</script>
</body>
</html>
<?php
	session_start();

	include 'fypDatabase.php';


	if (isset($_POST['submit'])) {
	    $feedback = $_POST['fback'];

	    $sql = "INSERT INTO feedback (feedbackMessage) VALUES ('$feedback')";

	    if ($mysqli->query($sql) === TRUE) {
	    } else {
	        echo "Error inserting feedback: " . $mysqli->error;
	    }

	    $mysqli->close();
	}

	if (isset($_POST['login'])) {
		
		if (empty($_POST['username']) || empty($_POST['password'])) {
			echo '<script>alert("Fill in the Blank")</script>';
		} else {
			$username = $_POST['username'];
			$password = $_POST['password'];

			$sql = "SELECT * FROM account WHERE UserName ='$username' AND Password ='$password'";
			$result = mysqli_query($mysqli, $sql);

			if(mysqli_num_rows($result) == 1){
				$row = mysqli_fetch_assoc($result);
				$_SESSION['customerID'] = $row['customerID'];
				header('location: fypHomePage.php');
				exit;
			} else {
				echo "<script>alert('Invalid username or password')</script>";
			}

		}

	}

	if (isset($_POST['register'])) {
		header('location: fypRegister.php');
	}

	if(isset($_POST['fpassword'])){
		header('location: fypForgotPassword.php');
	}

?>
