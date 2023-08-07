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
		  border: 3px solid green;
		  width: auto;
		  margin: auto;
		  border-radius: 5px;
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
			border-radius: 5px;
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
			border-radius: 5px;
		}

		.checkout:hover{
			color: black;
			background-color: lightgray;
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
			<?php
				error_reporting(0);
				ini_set('display_errors', 0);

				include 'fypDatabase.php';
		        session_start();

		        $totalPrice = 0;

		        $sql = "SELECT * FROM cart WHERE customerID = '{$_SESSION['customerID']}'";
 				$result = $mysqli->query($sql);

		            if ($result->num_rows > 0) {
		            	echo "<div class='item'>";
		                // Output data of each row
		                echo "<table>";
  						echo "<th></th class='imgTR'><th>ITEM NAME</th><th>PRICE</th><th>QUANTITY</th><th>SIZE</th><th></th>";
		                while($row = $result->fetch_assoc()) {
		                    echo "<tr>";
		                    echo "<td class='imgTR' ><img src='images/" . $row["itemPic"] . "' style='height:260px; width:240px'></td>";
						    echo "<td >" . $row["itemName"] . "</td>";
						    echo "<td>RM " . $row["itemPrice"] . "</td>";
						    echo "<td>".$row['itemQuantity']."</td>";
						    echo "<td>".$row['itemSize']."</td>";
						    echo '<td>
						            <form method="post">
						                <input type="hidden" name="itemName" value="'.$row["itemName"].'">
						                <input type="hidden" name="cartID" value="'.$row["cartID"].'">
						                <button type="submit" name="remove" class="remove">REMOVE</button>
						            </form>
						          </td>';
						    echo "</tr>";

						    $totalPrice += $row["itemPrice"] * $row["itemQuantity"];

		                }
		                echo "</table>";
		                echo "</div>";
		            }else{
		            	// echo "<div class='blank'>
		            	// 		<p class='empty'>Your cart is empty</p>
		            	// 	</div>";
		            	header('Location: fypEmpty.php');
		            }

		            if (isset($_POST['remove'])) {
					    $itemName = $_POST['itemName'];
					    $cartID = $_POST['cartID'];

					    $sql = "DELETE FROM cart WHERE itemName = '$itemName' AND customerID = '{$_SESSION['customerID']}' AND cartID = '$cartID'";

					    if ($mysqli->query($sql) === TRUE) {
					        header("Refresh:0");
					    } else {
					        echo "Error: " . $sql . "<br>" . $mysqli->error;
					    }
					}

					$_SESSION['totalPrice'] = $totalPrice;

		            // Close MySQL connection
		            $mysqli->close();

			?>
			<br>
			<br>
			<center>
				<input type='submit' name='checkout' class='checkout' value='CHECKOUT' onclick="checkout()">
			</center>
			<br>
			<br>
			<br>
			<br>
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
		function checkout(){
			window.location = "fypCheckOut.php";
		}

	  $(function(){
	    $("#header").load("fypHeader.html"); 
	  });
	  // $(function(){
	  //   $("#footer").load("fypFooter.php"); 
	  // });
	</script>
</body>
</html><?php
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
?>