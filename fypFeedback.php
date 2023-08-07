<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Feedback</title>
	<style type="text/css">

		th{
			padding: 10px;
			border: 1px solid black;
		}

		td{
			text-align: center;
			padding: 10px;
			border: 1px solid black;
		}
		.t{
			font-size: 30px;
			font-weight: bold;
		}

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
	<a href="fypUpload.php">Upload Image</a><a class='ww' href="fypEditAccount.php">Account</a><a class='ww' href="fypFeedback.php">Feedback</a><a class='ww' href="fypAdminLogout.php">LOGOUT</a>
	<p class="t">Feedback</p>

	<?php
	include 'fypDatabase.php';
	session_start();

	if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== "admin" || empty($_SESSION['admin'])) {
	  header('Location: fypAdminLogin.php');
	  exit;
	}

	$sql = "SELECT * FROM feedback";
	$result = $mysqli->query($sql);
	$itemSales = 0;
	$totalPrice = 0;
	$totalRecord = 0;
	if ($result->num_rows > 0) {
		echo "<br>";
		echo "<table>";
		echo "<th>FeedbackID</th><th>FeedbackMessage</th><th>FeedbackDate</th>";

		// loop through each row of results and display it in a table row
		while ($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo '<td>'.$row["feedbackID"].'</td>';
			echo '<td>'.$row["feedbackMessage"].'</td>';
			echo '<td>'.$row["feedbackDate"].'</td>';
			echo "</tr>";
			}
			echo "</table>";
		}
			echo "<br>";

	?>
</body>
</html>