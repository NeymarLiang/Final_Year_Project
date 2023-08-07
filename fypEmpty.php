<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cart - GLIMPSE</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fypHeaderCss.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<style type="text/css">
		html, body {
		  height: 100%;
		  margin: 0;
		}

		.item img {
            height: 200px;
            width: 200px;
        }

        td{
        	padding-left: 40px;
        	padding-right: 40px;
        	text-align: center;
        	font-family:'GT America Extended Bold', sans-serif;
        	font-size: 20px;
        }

        th{
        	padding-right: 40px;
        	padding-left: 40px;
        	padding-top: 30px;
        	text-align: center;
        	font-size: 30px;
        	font-family:'GT America Extended Bold', sans-serif;
        }

        .pCart{
        	font-family:'GT America Extended Bold', sans-serif;
        	font-size: 50px;
        	font-weight: bold;
        	padding-right: 0px;
        }

        table {
		  border: 1px solid black;
		  width: auto;
		  margin: auto;
		}

		.blank{
			height: 700px;
		}

		.empty{
			padding-top: 15%;
			text-align: center;
			font-weight: bold;
			font-size: 50px;
		}

		.remove{
			color: white;
			background-color: black;
			width: 100px;
			height: 50px;
		}

		.remove:hover{
			color: black;
			background-color: lightgray;
		}

		.checkout{
			color: white;
			background-color: black;
			width: 100px;
			height: 50px;
			margin-top: 20px;
		}

	</style>
</head>
<body>
	<div id="header"></div>
		
		<div>
			<center>
				<br>
				<p class="pCart">Cart</p>
				<br>
				<br>
				<br>
			</center>
			<div class='blank'>
		        <p class='empty'>Your cart is empty</p>
		    </div>

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
	  $(function(){
	    $("#footer").load("fypFooter.html"); 
	  });
	</script>
</body>
</html>
<?php
include 'fypDatabase.php'; // Include the file containing your database connection details

if (isset($_POST['submit'])) {
    $feedback = $_POST['fback'];

    // Create the SQL query
    $sql = "INSERT INTO feedback (feedbackMessage) VALUES ('$feedback')";

    // Execute the SQL query
    if ($mysqli->query($sql) === TRUE) {
        echo "Feedback inserted successfully.";
    } else {
        echo "Error inserting feedback: " . $mysqli->error;
    }

    // Close the database connection
    $mysqli->close();
}
?>