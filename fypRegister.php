<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register - GLIMPSE</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fypHeaderCss.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<style type="text/css">
		p{
			margin-bottom: 14px;
		}


		.fp{
			font-size: 21px;
			text-align: center;
			font-family: 'GT America Extended Bold', sans-serif;
			border-radius: 5px;	
		}

		.registerForm{
			padding: 20px;
			height: auto;
			width: auto;
			background-color: white;
			border-radius: 5px;
		}

		.inputType{
			font-size: 17px;
			font-family:verdana;
			padding: 2px;
			border-radius: 5px;
			padding: 5px;
		}

		.ad{
			border-radius: 5px;
			vertical-align: top;
			width: 225px; 
			height: 75px;
			resize:none;
			font-family:verdana;
		}

		.btn{
        	border: none;
        	background-color: black;
        	cursor: pointer;
        	font-size: 14px;
        	color: white;
        	width: 72px;
        	height: 27px;
        	border-radius: 5px;
        }

        .btn:hover{
            background-color: lightgray;
            color: black;

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
	<br><br>
	<center>
		<div class="registerForm">
				<p style="font-size: 35px;font-weight: bold;">REGISTER</p>
				<form method="post">
					<p class="fp">Username&nbsp;&nbsp;&nbsp;&nbsp;<input type="input" name="username" placeholder="8 to 12 characters" class="inputType"></p>
					<p class="fp">Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password" placeholder="8 to 12 characters" class="inputType"></p>
					<p class="fp">Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="input" name="firstName" class="inputType"></p>
					<p class="fp">Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="address" class="ad"></textarea></p>
					<p class="fp">City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="input" name="city" class="inputType"></p>
					<p class="fp">Postal Cal&nbsp;&nbsp;&nbsp;&nbsp;<input type="input" name="postalCal" class="inputType"></p>
					<p class="fp">Phone No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="input" name="ph" class="inputType"></p>
					<p class="fp">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="input" name="email"class="inputType"></p>
					<br>
					<br>
					<input type="submit" name="submit" value="SUBMIT" id="submit" class="btn">&nbsp;&nbsp;&nbsp;&nbsp;
				</form>
		</div>
	</center>
	<br>
	<br>
	<br>
	<div class="bottom">
		<div class="cs">
			<p class="bold">CONTACT US</p>
			<p style="color:#8a8a8a;font-size: 12px;font-weight: bold;">Email : &nbsp;yapyiliangww123@gmail.com</p>
			<p style="color:#8a8a8a;font-size: 12px;font-weight: bold;">PH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;+60172223195</p>
			<br>
			<br>
			<br>
			<p style="color:#8a8a8a;font-size: 12px;font-weight: bold;">Copyright © 2023 YYL design</p>
		</div>
		<div class="follow">
			<p class="bold">FOLLOW US</p>
			<a href="https://www.facebook.com/yiliang.yap.7" class="fa fa-facebook"></a>
			<a href="https://wa.me/0172223195"><i class="fa">&#xf232;</i></a>
			<a href="https://instagram.com/yuliang1002?igshid=ZDdkNTZiNTM=" class="fa fa-instagram"></a>
		</div>
		<div class="follow">
			<p class="bold">FEEDBACK</p>
			<form method="post">
				<textarea id="fback" name="fback" class="fback"rows="5" cols="50" ></textarea>
				<br>
				<input name="submit" type="submit" value="submit" class="button">
			</form>
		</div>

	</div>

	<script>
	  // $(function(){
	  //   $("#footer").load("fypFooter.html"); 
	  // });
	</script>

</body>
</html>
<?php
	include 'fypDatabase.php';


if (isset($_POST['submit1'])) {
    $feedback = $_POST['fback'];

    // Create the SQL query
    $sql = "INSERT INTO feedback (feedbackMessage) VALUES ('$feedback')";

    // Execute the SQL query
    if ($mysqli->query($sql) === TRUE) {
    } else {
        echo "Error inserting feedback: " . $mysqli->error;
    }

    // Close the database connection
    $mysqli->close();
}

	if (isset($_POST['submit'])) {
		$UserName = $_POST['username'];
		$Password = $_POST['password'];
		$FirstName = $_POST['firstName'];
		$LastName = $_POST['lastName'];
		$Address = $_POST['address'];
		$City = $_POST['city'];
		$PostalCal = $_POST['postalCal'];
		$PhoneNo = $_POST['ph'];
		$Email = $_POST['email'];

		$sql = "SELECT UserName FROM account WHERE UserName = '$UserName'";;
		$result = mysqli_query($mysqli, $sql);

		if ($UserName == ""||$Password==""||$FirstName==""||$Address==""||$City==""||$PostalCal==""||$PhoneNo==""||$Email=="") {
		    echo '<script>alert("Fill in the Blank")</script>';
		}else if(!preg_match('/^(?=.*[A-Za-z])[A-Za-z0-9_-]{8,16}$/', $UserName)){
			echo '<script>alert("Username did not match the condtion")</script>';
		}elseif (strlen($Password) < 8 || strlen($Password) > 12) {
		    echo '<script>alert("Password must be between 8 and 12 characters")</script>';
		}elseif(mysqli_num_rows($result) > 0){
			echo '<script>alert("Username already exists. Please choose a different username.")</script>';
		}elseif (!preg_match('/^[a-zA-Z0-9\s$,&\/.\-]+$/', $Address)) {
			echo '<script>alert("Address is invalid.")</script>';
		}elseif(!preg_match('/^[a-zA-Z a-zA-Z ]+$/', $FirstName)){
			echo '<script>alert("Name is invalid. Only alphabets and spaces are allowed.")</script>';
		}elseif (strlen($PostalCal) != 5 || !ctype_digit($PostalCal)) {
			echo '<script>alert("Postal Code must be a 5-digit number")</script>';
		}elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
			echo '<script>alert("Invalid Email Address")</script>';
		}else{
		    $sql = "INSERT INTO account(UserName, Password, FirstName, Address, City, PostalCode, phNO, Email)
		            VALUES ('$UserName', '$Password', '$FirstName', '$Address', '$City', '$PostalCal', '$PhoneNo', '$Email')";

		    if (mysqli_query($mysqli, $sql)) {
		        echo '<script>alert("Registration successful")</script>';
		        echo "<script>window.location='fypHomepage.php'</script>";
		    } else {
		        echo '<script>alert("Registration failed. Error message: ' . mysqli_error($mysqli) . '")</script>';
		    }
				}

	}


?>