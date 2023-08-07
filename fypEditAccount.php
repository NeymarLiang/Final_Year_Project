<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Account
 </title>
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
	<a class='ww' href="fypAdminSalesRecord.php">All Sales</a>
	<a class='ww' href="fypAdminSearch.php">Search By Condition</a>
	<a class='ww' href="fypEditItem.php">UPPER OUTER GARMENT</a>
	<a class='ww' href="fypEditItem2.php">THE TROUSERS</a>
	<a class='ww' href="fypUpload.php">Upload Image</a>
	<a class='ww' href="fypEditAccount.php">Account</a><a class='ww' href="fypFeedback.php">Feedback</a>
	<a class='ww' href="fypAdminLogout.php">LOGOUT</a>
	<p class="p">Edit Account
 </p>
	<div class="s">

	<?php
	include 'fypDatabase.php';
	session_start();

	if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== "admin" || empty($_SESSION['admin'])) {
		header('Location: fypAdminLogin.php');
		exit;
	}
	
	if (isset($_POST['delete'])) {
		$delete = $_POST['delete'];

		$sql = "DELETE FROM account WHERE customerID='$delete'";
		$result = $mysqli->query($sql);

	}

	$sql = "SELECT * FROM account";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		echo "<br>";
		echo "<table>";
		echo "<form method='post'>";
		echo "<th>CustomerID</th><th>UserName</th><th>Password</th><th>Name</th><th>Address</th><th>City</th><th>PostalCode</th><th>Phone No</th><th>Email</th><th>Delete</th>";

		// loop through each row of results and display it in a table row
		while ($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo '<td>'.$row["customerID"].'</td>';
			echo '<td>'.$row["UserName"].'</td>';
			echo '<td>'.$row["Password"].'</td>';
			echo '<td>'.$row["FirstName"].'</td>';
			echo '<td>'.$row["Address"].'</td>';
			echo '<td>'.$row["City"].'</td>';
			echo '<td>'.$row["PostalCode"].'</td>';
			echo '<td>'.$row["phNO"].'</td>';
			echo '<td>'.$row["Email"].'</td>';
			echo '<td><input type="submit" name="delete" value="'.$row["customerID"].'"></td>';
			echo "</tr>";
			}
			echo "</table>";
			echo "</form>";
		}
			echo "<br>";

	?>
	</div>
	</center>
</body>
</html>