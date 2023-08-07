<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">
	.bottom{
			display: flex;
			background-color: white;
			padding-bottom: 5px; 
			justify-content: space-between;
			font-family: Segoe UI;
		}

		.bottom div{
			margin-right: auto 0;
		}

		.fa {
		  padding: 5px;
		  font-size: 20px !important;
		  text-decoration: none;
		  color: black;
		}

		.fa:hover{
			color: lightgray;
		}

		.fback{
			border-radius: 5px;
			vertical-align: top;
			width: 200px; 
			height: 70px;
			resize:none;
			padding: 5px;
		}

		.bold {
		  font-weight: bold;
		  font-family: Segoe UI;
		}
		
		.button{
			border: bold;
			background-color: white;
			margin-top: 5px; float: right;
			font-size: 13px;
			padding: 5px
		}

		.button:hover{
			color: lightgray;
		}


</style>
<div class="bottom">
		<div class="cs">
			<p class="bold">CONTACT US</p>
			<p style="color:#8a8a8a;font-size: 12px;font-weight: bold;">Email : yapyiliangww123@gmail.com</p>
			<p style="color:#8a8a8a;font-size: 12px;font-weight: bold;">PH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:+60172223195</p>
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

<?php
	include 'fypDatabase.php';

	if (isset($_POST['submit'])) {
		$feedback = $_POST['fback'];

		$sql = "INSERT INTO feedback (feedbackMessage) VALUES ('$feedback')";

		// Execute SQL query
	    if ($mysqli->query($sql)) {
	        echo "Thank you for your feedback!";
	    } else {
	        echo "Error: " . $sql . "<br>" . $mysqli->error;
	    }

	    // Close database connection
	    $mysqli->close();
	}

?>