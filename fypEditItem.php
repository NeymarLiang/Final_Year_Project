<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UPPER OUTER GARMENT
 </title>
	<style type="text/css">
		.ww{
			text-decoration: none;
			color: black;
			font-size: 20px;
			font-family: 'GT America Extended Bold', sans-serif;
			margin-left: 20px;
		}

		.ww:hover{
			color: gray;
		}
		.p{
			font-size: 30px;
			font-weight: bold;
		}

		.adduog{
			text-decoration: none;
			font-size: 12px;
			color: black;
		}

		.adduog:hover{
			color: gray;
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
	<a class='ww' href="fypUpload.php">Upload Image</a><a class='ww' href="fypEditAccount.php">Account</a><a class='ww' href="fypFeedback.php">Feedback</a><a class='ww' href="fypAdminLogout.php">LOGOUT</a>
	<p class="p">UPPER OUTER GARMENT
 </p>
 	<a class="adduog" href="fypAddUog.php">Add item(UPPER OUTER GARMENT)</a>
	<div class="s">
		<?php
		include 'fypDatabase.php';

		session_start();

		if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== "admin" || empty($_SESSION['admin'])) {
		  header('Location: fypAdminLogin.php');
		  exit;
		}
		
		$sql = "SELECT * FROM item ";
		$result = $mysqli->query($sql);

			if ($result->num_rows > 0) {
				echo "<br>";
				echo "<form method='post' action='fypEdit.php'>";
				echo "<table>";
				echo "<th>item ID</th><th>Item Name</th><th>Item Price</th><th>Item Pic</th><th>Item Size</th><th>Select</th>";

				while ($row = $result->fetch_assoc()) {
				    echo "<tr>";
				    echo '<input type="hidden" name="itemID_'.$row["itemID"].'" value="'.$row["itemID"].'">';
				    echo '<td>'.$row["itemID"].'</td>';
				    echo '<td>'.$row["itemName"].'</td>';
				    echo '<td>'.$row["itemPrice"].'</td>';
				    echo '<td>'.$row["itemPic"].'</td>';
				    echo '<td>'.$row["itemSize"].'</td>';
				    echo '<td><input type="submit" name="itemID_SELECT" value="'.$row["itemID"].'"></td>';
				    echo "</tr>";
				}


				echo "</table>";
				echo "</form>";
			}
		?>
	</div>
	</center>
</body>
</html>
