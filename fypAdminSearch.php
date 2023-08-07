<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sales Record</title>
	<style type="text/css">

		.p{
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

		.c{
			margin-left: 20px;
			text-transform: lowercase;
		}

		th{
			padding: 10px;
			border: 1px solid black;
		}

		td{
			text-align: center;
			padding: 10px;
			border: 1px solid black;
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
	<p class="p">Search</p>
	<div class="s">
		<form method="post">
			<p class="c" style="display: inline-block;">Item Name: &nbsp;<input type="text" name="itemName"></p>
			<p class="c" style="display: inline-block;">Customer Name: &nbsp;<input type="text" name="customerName"></p>
			<p class="c" style="display: inline-block;">Date: &nbsp;<input type="text" name="date" placeholder="YYYY-MM-DD"></p>&nbsp;&nbsp;&nbsp;
			<input type="submit" name="submit" value="SEARCH">
		</form>
	</div>
	<?php
		include 'fypDatabase.php';
		session_start();

		if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== "admin" || empty($_SESSION['admin'])) {
		  header('Location: fypAdminLogin.php');
		  exit;
		}

		if (isset($_POST['submit'])) {
			$itemName = $_POST['itemName'];
			$customerName = $_POST['customerName'];
			$date = $_POST['date'];
			$itemSales = 0;
			$totalPrice = 0;
			$totalRecord = 0;

			if ($itemName != "" && $customerName=="" && $date=="") {
			    $sql = "SELECT * FROM salesrecord WHERE itemName = '$itemName'";
			    $result = $mysqli->query($sql);

			    if ($result->num_rows > 0) {
			        echo "<br>";
			        echo "<table>";
			        echo "<th>Sales ID</th><th>Customer ID</th><th>Item Name</th><th>Customer Name</th><th>Item Size</th><th>Item Quantity</th><th>Total Price</th><th>Address</th><th>City</th><th>Postal Code</th><th>Phone No</th><th>Email</th><th>date</th>";

			        // loop through each row of results and display it in a table row
			        while ($row = $result->fetch_assoc()) {
			            echo "<tr>";
			            echo '<td>'.$row["salesID"].'</td>';
			            echo '<td>'.$row["customerID"].'</td>';
			            echo '<td>'.$row["itemName"].'</td>';
			            echo '<td>'.$row["name"].'</td>';
			            echo '<td>'.$row["itemSuze"].'</td>';
			            echo '<td>'.$row["itemQuantity"].'</td>';
			            echo '<td>'.$row["totalPrice"].'</td>';
			            echo '<td>'.$row["Address"].'</td>';
			            echo '<td>'.$row["City"].'</td>';
			            echo '<td>'.$row["PostalCode"].'</td>';
			            echo '<td>'.$row["phNO"].'</td>';
			            echo '<td>'.$row["Email"].'</td>';
			            echo '<td>'.$row["date_added"].'</td>';
			            echo "</tr>";
			            $totalPrice += $row["totalPrice"];
			            $itemSales += $row["itemQuantity"];
			            $totalRecord ++;
			        }
			        echo "</table>";
			    }
			    echo "<br>";
			    echo "Total Sales : $totalPrice &nbsp;&nbsp;&nbsp;&nbsp;";
			    echo "Item Sales : $itemSales &nbsp;&nbsp;&nbsp;&nbsp;";
			    echo "Toatal Record : $totalRecord";
			}


			if ($customerName != "" && $itemName=="" && $date=="") {
			    $sql = "SELECT * FROM salesrecord WHERE name = '$customerName'";
			    $result = $mysqli->query($sql);

			    if ($result->num_rows > 0) {
			        echo "<br>";
			        echo "<table>";
			        echo "<th>Sales ID</th><th>Customer ID</th><th>Item Name</th><th>Customer Name</th><th>Item Size</th><th>Item Quantity</th><th>Total Price</th><th>Address</th><th>City</th><th>Postal Code</th><th>Phone No</th><th>Email</th><th>date</th>";

			        // loop through each row of results and display it in a table row
			        while ($row = $result->fetch_assoc()) {
			            echo "<tr>";
			            echo '<td>'.$row["salesID"].'</td>';
			            echo '<td>'.$row["customerID"].'</td>';
			            echo '<td>'.$row["itemName"].'</td>';
			            echo '<td>'.$row["name"].'</td>';
			            echo '<td>'.$row["itemSuze"].'</td>';
			            echo '<td>'.$row["itemQuantity"].'</td>';
			            echo '<td>'.$row["totalPrice"].'</td>';
			            echo '<td>'.$row["Address"].'</td>';
			            echo '<td>'.$row["City"].'</td>';
			            echo '<td>'.$row["PostalCode"].'</td>';
			            echo '<td>'.$row["phNO"].'</td>';
			            echo '<td>'.$row["Email"].'</td>';
			            echo '<td>'.$row["date_added"].'</td>';
			            echo "</tr>";
			            $totalPrice += $row["totalPrice"];
			            $itemSales += $row["itemQuantity"];
			            $totalRecord ++;
			        }
			        echo "</table>";
			    }
			    echo "<br>";
			    echo "Total Sales : $totalPrice &nbsp;&nbsp;&nbsp;&nbsp;";
			    echo "Item Sales : $itemSales&nbsp;&nbsp;&nbsp;&nbsp;";
			    echo "Toatal Record : $totalRecord";
			}

			if ($customerName == "" && $itemName=="" && $date!="") {
			    $sql = "SELECT * FROM salesrecord WHERE date_added = '$date'";
			    $result = $mysqli->query($sql);

			    if ($result->num_rows > 0) {
			        echo "<br>";
			        echo "<table>";
			        echo "<th>Sales ID</th><th>Customer ID</th><th>Item Name</th><th>Customer Name</th><th>Item Size</th><th>Item Quantity</th><th>Total Price</th><th>Address</th><th>City</th><th>Postal Code</th><th>Phone No</th><th>Email</th><th>date</th>";

			        // loop through each row of results and display it in a table row
			        while ($row = $result->fetch_assoc()) {
			            echo "<tr>";
			            echo '<td>'.$row["salesID"].'</td>';
			            echo '<td>'.$row["customerID"].'</td>';
			            echo '<td>'.$row["itemName"].'</td>';
			            echo '<td>'.$row["name"].'</td>';
			            echo '<td>'.$row["itemSuze"].'</td>';
			            echo '<td>'.$row["itemQuantity"].'</td>';
			            echo '<td>'.$row["totalPrice"].'</td>';
			            echo '<td>'.$row["Address"].'</td>';
			            echo '<td>'.$row["City"].'</td>';
			            echo '<td>'.$row["PostalCode"].'</td>';
			            echo '<td>'.$row["phNO"].'</td>';
			            echo '<td>'.$row["Email"].'</td>';
			            echo '<td>'.$row["date_added"].'</td>';
			            echo "</tr>";
			            $totalPrice += $row["totalPrice"];
			            $itemSales += $row["itemQuantity"];
			            $totalRecord ++;
			        }
			        echo "</table>";
			    }
			    echo "<br>";
			    echo "Total Sales : $totalPrice &nbsp;&nbsp;&nbsp;&nbsp;";
			    echo "Item Sales : $itemSales&nbsp;&nbsp;&nbsp;&nbsp;";
			    echo "Toatal Record : $totalRecord";
			}
			if ($itemName != "" && $customerName!="" && $date=="") {
			    $sql = "SELECT * FROM salesrecord WHERE itemName = '$itemName' AND name = '$customerName'";
			    $result = $mysqli->query($sql);

			    if ($result->num_rows > 0) {
			        echo "<br>";
			        echo "<table>";
			        echo "<th>Sales ID</th><th>Customer ID</th><th>Item Name</th><th>Customer Name</th><th>Item Size</th><th>Item Quantity</th><th>Total Price</th><th>Address</th><th>City</th><th>Postal Code</th><th>Phone No</th><th>Email</th><th>date</th>";

			        // loop through each row of results and display it in a table row
			        while ($row = $result->fetch_assoc()) {
			            echo "<tr>";
			            echo '<td>'.$row["salesID"].'</td>';
			            echo '<td>'.$row["customerID"].'</td>';
			            echo '<td>'.$row["itemName"].'</td>';
			            echo '<td>'.$row["name"].'</td>';
			            echo '<td>'.$row["itemSuze"].'</td>';
			            echo '<td>'.$row["itemQuantity"].'</td>';
			            echo '<td>'.$row["totalPrice"].'</td>';
			            echo '<td>'.$row["Address"].'</td>';
			            echo '<td>'.$row["City"].'</td>';
			            echo '<td>'.$row["PostalCode"].'</td>';
			            echo '<td>'.$row["phNO"].'</td>';
			            echo '<td>'.$row["Email"].'</td>';
			            echo '<td>'.$row["date_added"].'</td>';
			            echo "</tr>";
			            $totalPrice += $row["totalPrice"];
			            $itemSales += $row["itemQuantity"];
			            $totalRecord ++;
			        }
			        echo "</table>";
			    }
			    echo "<br>";
			    echo "Total Sales : $totalPrice &nbsp;&nbsp;&nbsp;&nbsp;";
			    echo "Item Sales : $itemSales&nbsp;&nbsp;&nbsp;&nbsp;";
			    echo "Toatal Record : $totalRecord";
			}

			if ($itemName != "" && $customerName=="" && $date!="") {
			    $sql = "SELECT * FROM salesrecord WHERE itemName = '$itemName' AND date_added = '$date'";
			    $result = $mysqli->query($sql);

			    if ($result->num_rows > 0) {
			        echo "<br>";
			        echo "<table>";
			        echo "<th>Sales ID</th><th>Customer ID</th><th>Item Name</th><th>Customer Name</th><th>Item Size</th><th>Item Quantity</th><th>Total Price</th><th>Address</th><th>City</th><th>Postal Code</th><th>Phone No</th><th>Email</th><th>date</th>";

			        // loop through each row of results and display it in a table row
			        while ($row = $result->fetch_assoc()) {
			            echo "<tr>";
			            echo '<td>'.$row["salesID"].'</td>';
			            echo '<td>'.$row["customerID"].'</td>';
			            echo '<td>'.$row["itemName"].'</td>';
			            echo '<td>'.$row["name"].'</td>';
			            echo '<td>'.$row["itemSuze"].'</td>';
			            echo '<td>'.$row["itemQuantity"].'</td>';
			            echo '<td>'.$row["totalPrice"].'</td>';
			            echo '<td>'.$row["Address"].'</td>';
			            echo '<td>'.$row["City"].'</td>';
			            echo '<td>'.$row["PostalCode"].'</td>';
			            echo '<td>'.$row["phNO"].'</td>';
			            echo '<td>'.$row["Email"].'</td>';
			            echo '<td>'.$row["date_added"].'</td>';
			            echo "</tr>";
			            $totalPrice += $row["totalPrice"];
			            $itemSales += $row["itemQuantity"];
			            $totalRecord ++;

			        }
			        echo "</table>";
			    }
			    echo "<br>";
			    echo "Total Sales : $totalPrice &nbsp;&nbsp;&nbsp;&nbsp;";
			    echo "Item Sales : $itemSales&nbsp;&nbsp;&nbsp;&nbsp;";
			    echo "Toatal Record : $totalRecord";
			}

			if ($itemName == "" && $customerName!="" && $date!="") {
			    $sql = "SELECT * FROM salesrecord WHERE name = '$customerName' AND date_added = '$date'";
			    $result = $mysqli->query($sql);

			    if ($result->num_rows > 0) {
			        echo "<br>";
			        echo "<table>";
			        echo "<th>Sales ID</th><th>Customer ID</th><th>Item Name</th><th>Customer Name</th><th>Item Size</th><th>Item Quantity</th><th>Total Price</th><th>Address</th><th>City</th><th>Postal Code</th><th>Phone No</th><th>Email</th><th>date</th>";

			        // loop through each row of results and display it in a table row
			        while ($row = $result->fetch_assoc()) {
			            echo "<tr>";
			            echo '<td>'.$row["salesID"].'</td>';
			            echo '<td>'.$row["customerID"].'</td>';
			            echo '<td>'.$row["itemName"].'</td>';
			            echo '<td>'.$row["name"].'</td>';
			            echo '<td>'.$row["itemSuze"].'</td>';
			            echo '<td>'.$row["itemQuantity"].'</td>';
			            echo '<td>'.$row["totalPrice"].'</td>';
			            echo '<td>'.$row["Address"].'</td>';
			            echo '<td>'.$row["City"].'</td>';
			            echo '<td>'.$row["PostalCode"].'</td>';
			            echo '<td>'.$row["phNO"].'</td>';
			            echo '<td>'.$row["Email"].'</td>';
			            echo '<td>'.$row["date_added"].'</td>';
			            echo "</tr>";
			            $totalPrice += $row["totalPrice"];
			            $itemSales += $row["itemQuantity"];
			            $totalRecord ++;
			        }
			        echo "</table>";
			    }
			    echo "<br>";
			    echo "Total Sales : $totalPrice &nbsp;&nbsp;&nbsp;&nbsp;";
			    echo "Item Sales : $itemSales&nbsp;&nbsp;&nbsp;&nbsp;";
			    echo "Toatal Record : $totalRecord";
			}

			if ($itemName != "" && $customerName!="" && $date!="") {
			    $sql = "SELECT * FROM salesrecord WHERE itemName = '$itemName' AND date_added = '$date' AND name = '$customerName'";
			    $result = $mysqli->query($sql);

			    if ($result->num_rows > 0) {
			        echo "<br>";
			        echo "<table>";
			        echo "<th>Sales ID</th><th>Customer ID</th><th>Item Name</th><th>Customer Name</th><th>Item Size</th><th>Item Quantity</th><th>Total Price</th><th>Address</th><th>City</th><th>Postal Code</th><th>Phone No</th><th>Email</th><th>date</th>";

			        // loop through each row of results and display it in a table row
			        while ($row = $result->fetch_assoc()) {
			            echo "<tr>";
			            echo '<td>'.$row["salesID"].'</td>';
			            echo '<td>'.$row["customerID"].'</td>';
			            echo '<td>'.$row["itemName"].'</td>';
			            echo '<td>'.$row["name"].'</td>';
			            echo '<td>'.$row["itemSuze"].'</td>';
			            echo '<td>'.$row["itemQuantity"].'</td>';
			            echo '<td>'.$row["totalPrice"].'</td>';
			            echo '<td>'.$row["Address"].'</td>';
			            echo '<td>'.$row["City"].'</td>';
			            echo '<td>'.$row["PostalCode"].'</td>';
			            echo '<td>'.$row["phNO"].'</td>';
			            echo '<td>'.$row["Email"].'</td>';
			            echo '<td>'.$row["date_added"].'</td>';
			            echo "</tr>";
			            $totalPrice += $row["totalPrice"];
			            $itemSales += $row["itemQuantity"];
			            $totalRecord ++;
			        }
			        echo "</table>";
			    }
			    echo "<br>";
			    echo "Total Sales : $totalPrice &nbsp;&nbsp;&nbsp;&nbsp;";
			    echo "Item Sales : $itemSales&nbsp;&nbsp;&nbsp;&nbsp;";
			    echo "Toatal Record : $totalRecord";
			}
		}
	?>
	</center>
</body>
</html>