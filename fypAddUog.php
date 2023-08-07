<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADD UPPER OUTER GARMENT
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
	<a class='ww' href="fypEditItem.php">UPPER OUTER GARMENT
 </a>
 <a class='ww' href="fypEditItem2.php">THE TROUSERS</a>
	<a class='ww' href="fypUpload.php">Upload Image</a>
	<a class='ww' href="fypEditAccount.php">Account</a><a class='ww' href="fypFeedback.php">Feedback</a><a class='ww' href="fypAdminLogout.php">LOGOUT</a>
	<p class="p">UPPER OUTER GARMENT</p>

	<form method="post" enctype="multipart/form-data">
		<p>Item Name: <input type="text" name="itemName"></p>
		<p>Item Price: <input type="text" name="itemPrice"></p>
		<p>Item Pic(xxx.png/xxx.jpeg): <input type='file' name='itemPic'></p>
		<p class='size'>Size &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <select name='itemSize' class='select'><option value='S'>S</option><option value='M'>M</option><option value='L'>L</option><option value='S,M'>S,M</option><option value='S,M,L'>S,M,L</option><option value='M,L'>M,L</option><option value='S,L'>S,L</option></select></p>
		<input type="submit" name="submit" value="ADD">
	</form>

	<?php
	    include 'fypDatabase.php';
	    session_start();

		if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== "admin" || empty($_SESSION['admin'])) {
		  header('Location: fypAdminLogin.php');
		  exit;
		}
		
	    if (isset($_POST['submit'])) {
	        $itemName = $_POST['itemName'];
	        $itemPrice = $_POST['itemPrice'];
	        $ipc_name = $_FILES['itemPic']['name'];
        	$ipc = "$ipc_name";
        	$itemSize = $_POST['itemSize'];

	        $sql = "INSERT INTO item (itemName, itemPrice,itemQuantity, itemPic,itemSize) VALUES ('$itemName','$itemPrice',100,'$ipc','$itemSize')
";

	        if (mysqli_query($mysqli, $sql)) {
	            echo "New record created successfully";
	        } else {
	            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
	        }

	        // Close database connection
	        mysqli_close($mysqli);
	        header('Location: fypAddUog.php');
	    }
	?>

	</center>
</body>
</html>