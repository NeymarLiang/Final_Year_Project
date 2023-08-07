<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fypHeaderCss.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Account - GLIMPSE</title>
	<style type="text/css">
		.pi{
			margin: 0 auto;
            width: 1000px;
            height: 650px;
		}

		td{
			font-size: 25px;
			font-family: 'GT America Extended Bold', sans-serif;
			padding-top: 10px;
			padding-bottom: 10px;
		}

		.ac{
			font-size: 35px;
			font-family: 'GT America Extended Bold', sans-serif;
			font-weight: bold;
		}

		.edit{
			font-size: 20px;
			color: white;
			background-color: black;
			width: 95px;
			height: 35px;
			margin-right: 10px;
			margin-top: 40px;
			border-radius: 5px;
		}

		.edit:hover{
			color: black;
			background-color: white;
		}

		table{
			margin: 0 auto;
            width: 1000px;
			margin-top: 20px;
			border: 3px solid green;
			padding: 20px;
			border-radius: 7px;
		}

	</style>
</head>
<body>
	<div id="header"></div>
	<br><br><br><br><br><br><br><br><br><br>
	<center>
		<p class="ac">ACCOUNT</p>
	</center>
	<div class="pi">
		<?php
			error_reporting(0);
			ini_set('display_errors', 0);

			include 'fypDatabase.php';
			session_start();
			

			$sql = "SELECT * FROM account WHERE customerID = '{$_SESSION['customerID']}'"; 
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
            	$row = $result->fetch_assoc();

            	echo '<table>';
				echo '<tr><td style="width:30px;text-align: center;font-weight:bold;">Name</td><td style="padding-left:30px;padding-right:30px;">' . $row["FirstName"] . ' </td></tr>';
				echo '<tr><td style="width:30px;text-align: center;font-weight:bold;">Address</td><td style="padding-left:30px;padding-right:30px;">' . $row["Address"] . '</td></tr>';
				echo '<tr><td style="width:30px;text-align: center;font-weight:bold;">Phone No</td><td style="padding-left:30px;padding-right:30px;">' . $row["phNO"] . '</td></tr>';
				echo '<tr><td style="padding-left:30px;padding-right:30px;text-align: center;font-weight:bold;">Email</td><td style="padding-left:30px;padding-right:30px;">' . $row["Email"] . '</td></tr>';
				echo '</table>';

            }else{
            	header('Location: fypLogin.php');
            }
		?>

		<center>
			<button onclick="myFunction()" class="edit">EDIT</button>
			<button onclick="logout()" class="edit">LOGOUT</button>
		</center>

	</div>
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
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
	  $(function(){
	    $("#header").load("fypHeader.html"); 
	  });
	  // $(function(){
	  //   $("#footer").load("fypFooter.php"); 
	  // });

	  function logout(){
	  	window.location = "fypLogout.php";
	  }

	  function myFunction(){
	  	window.location ="fypEditProfile.php";
	  }
	</script>
</body>
</html><?php
	include 'fypDatabase.php';

	if (isset($_POST['submit'])) {
		$feedback = $_POST['fback'];

		$sql = "INSERT INTO feedback (feedbackMessage) VALUES ('$feedback')";

	    // Close database connection
	    $mysqli->close();
	}

?>