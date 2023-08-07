<?php
	include 'fypDatabase.php';

	// $sql = "INSERT INTO item (itemID, itemName, itemPrice, itemQuantity, itemPic, itemSize)
	// 		VALUES (12, 'COCOON SHIRT', 99.00, 100, 'g24.jpg', 'S,M,L')";

	// if ($mysqli->query($sql) === TRUE) {
	//     echo "New item added successfully";
	// } else {
	//     echo "Error: " . $sql . "<br>" . $mysqli->error;
	// }

	// $mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Shop - GLIMPSE</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fypHeaderCss.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		.item {
            flex: 1 0 20%;
            margin: 10px;
            text-align: center;
        }
        .item img {
            height: 320px;
            width: 220px;
        }

        .container{
        	display: flex;
        	flex-wrap: wrap;
			width: 100%;
        }

        .category{
        	display: flex;
        	flex-wrap: wrap;
        	justify-content: center;
        }

        .c{
        	text-decoration: none;
        	font-family: 'GT America Extended Bold', sans-serif;
        	color: black;
        }
        
        .c:hover{
            color: lightgray;
        }


        .i{
        	margin-bottom: 10px;
        	font-family: 'GT America Extended Bold', sans-serif;
        	font-weight: bold;
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
        	border: 1px black solid;
        }

        .btn:hover{
            background-color: lightgray;
            color: black;

        }

        .sear{
        	padding: 5px;
        	border-radius: 5px;
        	font-size: 12px;
        	font-family: 'GT America Extended Bold', sans-serif;
        }

        .sbtn{
        	border-radius: 5px;
        	color: black;
        	background-color: white;
        	width: 65px;
        	height: 27px;
        }

        .sbtn:hover{
        	background-color: #e6e6e6;
        }

        .p{
        	font-family: 'GT America Extended Bold', sans-serif;
        	color: #A78888;
        	font-size: 15px;
        	font-weight: bold;
        	margin-bottom: 10px;
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
	<br>
	<center>
		<div class="category">
			<a href="fypShop.php" class="c">UPPER OUTER GARMENT</a>&nbsp;&nbsp;<p>/</p>&nbsp;&nbsp;<a href="fypShop2.php" class="c">THE TROUSERS</a><br>
		</div>
		<br>
		<br>
		<form method="post" action="fypViewItem.php">
			<input type="text" id="searchInput" name="s" placeholder="Search..." class="sear" >&nbsp;&nbsp;<input type="submit" name="search" value="SEARCH" class="sbtn">
		</form>
        <div class="container">
		        <?php
		            // Retrieve item details from database
		            $sql = "SELECT * FROM item"; 
		            $result = $mysqli->query($sql);

		            if ($result->num_rows > 0) {
		                // Output data of each row
		                while($row = $result->fetch_assoc()) {
		                    echo '<div class="item">';
		                    echo '<img src="images/' . $row["itemPic"] . '" class="img">';
		                    echo '<p class="i">' . $row["itemName"] . '<p>';
		                    echo '<p class="p">RM&nbsp;&nbsp;' . $row["itemPrice"] . ' . 00</p>';

		                    echo '<form method="POST" action="fypViewItem.php">';
						    echo '<input type="hidden" name="itemID" value="' . $row["itemID"] . '">';
						    echo '<input type="hidden" name="itemName" value="' . $row["itemName"] . '">';
						    echo '<input type="hidden" name="itemPrice" value="' . $row["itemPrice"] . '">';
						    echo '<input type="hidden" name="itemPic" value="' . $row["itemPic"] . '">';
						    echo '<button type="submit" name="viewItem" class="btn">View Item</button>';
						    echo '</form>';

		                    echo '</div>';
		                }
		            }

		            // Close MySQL connection
		            $mysqli->close();

		        ?>
		</div>
	</center>
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
	<script>
	  // $(function(){
	  //   $("#footer").load("fypFooter.php"); 
	  // });

	</script>
</body>
</html><?php
include 'fypDatabase.php'; // Include the file containing your database connection details

if (isset($_POST['submit'])) {
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
