<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fypHeaderCss.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Edit Profile - GLIMPSE</title>

	<style type="text/css">
		.ep{
			font-size: 50px;
			font-family: 'GT America Extended Bold', sans-serif;
			font-weight: bold;
			margin-bottom: 15px;
		}

		.pp{
			text-align: left;
			font-size: 20px;
		}

		.pi{
			padding: 5px;
			margin-bottom: 20px;
			font-size: 15px;
			border-radius: 5px;
			width: 250px;
			font-family: 'GT America Extended Bold', sans-serif;
		}

		.ad{
			font-size: 15px;
			border-radius: 5px;
			padding: 5px;
			vertical-align: top;
			width: 250px; 
			height: 75px;
			resize:none;
			font-family: 'GT America Extended Bold', sans-serif;
			margin-bottom: 20px;
		}

		.f {
		  display: flex;
		  justify-content: center;
		  align-items: center;
		}

		.edit{
			font-size: 15px;
			color: white;
			background-color: black;
			width: 75px;
			height: 35px;
			margin-top: 40px;
			margin-bottom: 20px;
			margin-right: 15px;
			border-radius: 5px;
		}

		.edit:hover{
			color: black;
			background-color: white;
		}

		.divp{
			border: 3px solid green;
			padding: 20px;
			border-radius: 5px;
		}

	</style>

</head>
<body>
	<div id="header"></div>
	<center>
		<br><br><br><br><br><br>
		<p class="ep">Edit Profile</p>
		<br><br>

		<div class="f">
			<?php

				include 'fypDatabase.php';
				session_start();
				

				$sql = "SELECT * FROM account WHERE customerID = '{$_SESSION['customerID']}'"; 
	            $result = $mysqli->query($sql);

	            if ($result->num_rows > 0) {
	            	$row = $result->fetch_assoc();
	            	echo "<center>";
	            	echo "<div class='divp'>";
	            		echo "<table>";
						echo "<form method='post'>";
						echo "<p class='pp'>Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='password' class='pi' name='password' value='{$row['Password']}'></p>";
						echo "<p class='pp'>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='input' class='pi' name='FirstName' value='{$row['FirstName']}'></p>";
						echo "<p class='pp'>Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <textarea name='address' class='ad'>{$row['Address']}</textarea></p>";
						echo "<p class='pp'>City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='input' class='pi' name='city' value='{$row['City']}'></p>";
						echo "<p class='pp'>Postal Code&nbsp;&nbsp; <input type='input' class='pi' name='PostalCode' value='{$row['PostalCode']}'></p>";
						echo "<p class='pp'>Phone No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='input' class='pi' name='phNO' value='{$row['phNO']}'></p>";
						echo "<p class='pp'>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='input' class='pi' name='Email' value='{$row['Email']}'></p>";
						echo "<input type='submit' value='SUBMIT' name='submit' class='edit'>";
						echo "<input type='submit' value='BACK' name='back' class='edit'>" ;
						echo "</form>";
						echo "</table>";
					echo "</div>";
					echo "</center>";
	            }

	            if (isset($_POST['back'])) {
	            	header('Location: fypPersonal.php');
	            }

	            if (isset($_POST['submit'])) {

	            	$password = $_POST["password"];
					$firstName = $_POST["FirstName"];
					$address = $_POST["address"];
					$city = $_POST["city"];
					$postalCode = $_POST["PostalCode"];
					$phoneNo = $_POST["phNO"];
					$email = $_POST["Email"];

	            	if($password==""||$firstName==""||$address==""||$city==""||$postalCode==""||$phoneNo==""||$email==""){
					    echo '<script>alert("Fill in the Blank")</script>';
	            	}elseif(strlen($password) < 8 || strlen($password) > 16){
	            		echo '<script>alert("Password must be more than 7 and less than 17")</script>';
	            	}elseif (!preg_match('/^[a-zA-Z0-9\s$,&\/.\-]+$/', $address)) {
						echo '<script>alert("Address is invalid")</script>';
					}elseif(!preg_match('/^[a-zA-Z ]/', $city)){
						echo '<script>alert("Invalid city.")</script>';
					}elseif(!preg_match('/^[a-zA-Z a-zA-Z ]+$/', $firstName)){
						echo '<script>alert("Name is invalid. Only alphabets and spaces are allowed.")</script>';
					}elseif (strlen($postalCode) != 5 || !ctype_digit($postalCode)) {
						echo '<script>alert("Postal Code must be a 5-digit number")</script>';
					}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						echo '<script>alert("Invalid Email Address")</script>';
					}elseif (!preg_match('/^(\+?60|0)(1\d{8})$/', $phoneNo)) {
					    echo '<script>alert("Invalid Phone Number")</script>';
					}
	            	else{
					    $sql = "UPDATE account SET Password='$password', FirstName='$firstName', Address='$address', City='$city', PostalCode='$postalCode', phNO='$phoneNo', Email='$email' WHERE customerID='{$_SESSION['customerID']}'";

					    if ($mysqli->query($sql) === TRUE) {
					    	echo "<script>alert('Profile updated successfully')</script>";
					    	header('Location: fypPersonal.php');
					    } else {
					        echo "Error updating account: " . $mysqli->error;
					    }
	            	}
	        	}	
			?>		
		</div>
	</center>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
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
	  <?php
include 'fypDatabase.php'; // Include the file containing your database connection details

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
?>
	</script>
</body>
</html>