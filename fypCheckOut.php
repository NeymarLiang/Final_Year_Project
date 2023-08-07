<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Checkout - GLIMPSE</title>
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

        .pCart{
        	font-family:'GT America Extended Bold', sans-serif;
        	font-size: 50px;
        	font-weight: bold;
        	padding-right: 0px;
        }

        .flex-container{
        	display: flex;
        	justify-content: center;
        	align-items: flex-start;
        }

        .cInfor, .oSumm{
        	margin: 0 40px;
        }

        .head{
        	font-size: 35px;
        	font-family:'GT America Extended Bold', sans-serif;
        	margin-bottom: 10px;
        }

        .in{
        	padding: 10px;
        	font-size: 25px;
        	font-family:'GT America Extended Bold', sans-serif;
        	border-radius: 10px;
        	margin-bottom: 15px;
        	margin-top: 15px;
        	width: 550px;
        	height: 60px;
        }

        .os{
        	font-size: 20px;
        	margin-bottom: 15px;
        	margin-top: 15px;
        	color: gray;
        	font-family:'GT America Extended Bold', sans-serif;
        }

        .pmf{
        	display: flex;
        	justify-content: center;
        	align-items: flex-start;
        }

        .pm{
        	font-size: 35px;
        	font-family:'GT America Extended Bold', sans-serif;
        	margin-bottom: 10px;
        }

        .card{
        	padding: 10px;
        	font-size: 25px;
        	font-family:'GT America Extended Bold', sans-serif;
        	border-radius: 5px;
        	margin-bottom: 30px;
        	margin-top: 15px;
        	width: 350px;
        	height: 30px;
        	text-align: center;
        }

        .pm1{
        	margin-top: 20px;
        	font-family:'GT America Extended Bold', sans-serif;
        	font-size: 25px;
        	margin-left: 10px;
        }

        .se{
        	margin-top: 22px;
        	margin-left: 10px;
        	margin-right: 10px;
        	padding: 5px;
        	border-radius: 7px;
        	font-family:'GT America Extended Bold', sans-serif;
        }

        .scode{
        	margin-top: 22px;
        	padding: 5px;
        	text-align: center;
        	width: 50px;
        	margin-left: 10px;
        	border-radius: 7px;
        	font-family:'GT America Extended Bold', sans-serif;
        }

        .checkout{
			color: white;
			background-color: black;
			width: 100px;
			height: 50px;
			margin-top: 20px;
			margin-left: 10px;
			margin-right: 10px;
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
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>

				<p class="pCart">CHECKOUT</p>
				<br>
				<br>
				<br>
				<br>
			</center>
				<div class="flex-container">
					<div class="cInfor">
						<?php
							include 'fypDatabase.php';
							session_start();
							
							if(isset($_POST['back'])){
								header('Location: fypCart.php');
							}

							if(isset($_POST['checkout'])) {
								$cardNumber = $_POST['cardNumber'];
								$cardHolder = $_POST['cardHolder'];
								$expireMM = $_POST['expireMM'];
    							$expireYY = $_POST['expireYY'];
								$securityCode = $_POST['securityCode'];
									$name = $_POST['name'];
									$address1 = $_POST['address'];
									$poscode1 = $_POST['poscode'];
									$email = $_POST['email'];
									$phoneNo = $_POST['phoneNo'];

								$isEmpty = false;

								if (empty($cardNumber) || empty($cardHolder) || empty($expireMM) || empty($expireYY) || empty($securityCode) || empty($name) || empty($address1) || empty($poscode1) || empty($email) || empty($phoneNo)) {
								    echo "<script>alert('Please fill in all the required fields.')</script>";
								    echo "<script>window.history.back();</script>";
								    exit;
								}

								if (empty($address1) || !preg_match('/^[a-zA-Z0-9\s$,&\/.\-]+$/', $address1)) {
								    echo '<script>alert("Please enter a valid address.");</script>';
								    echo '<script>window.history.back();</script>';
								    exit;
								}

								if (empty($poscode1) || strlen($poscode1) !== 5 || !ctype_digit($poscode1)) {
								    echo '<script>alert("Please enter a valid postal code.");</script>';
								    echo '<script>window.history.back();</script>';
								    exit;
								}

								if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
								    echo '<script>alert("Please enter a valid email.");</script>';
								    echo '<script>window.history.back();</script>';
								    exit;
								}

								if (empty($phoneNo) || !preg_match('/^\d{10}$/', $phoneNo)) {
								    echo '<script>alert("Please enter a valid phone number.");</script>';
								    echo '<script>window.history.back();</script>';
								    exit;
								}


								if (!preg_match('/^[0-9 ]{8,19}$/', $cardNumber)) {
								    echo "<script>alert('Invalid card number. Please enter a valid card number.')</script>";
								    header("Location: fypCheckout.php");
								    exit;
								}

								if (!preg_match('/^\d{4}$/', $securityCode)) {
								    echo "<script>alert('Invalid security code. Please enter a valid security code.')</script>";
								    header("Location: fypCheckout.php");
								    exit;
								}

								if (empty($expireMM) || empty($expireYY)) {
								    echo "<script>alert('Please select a valid expiry date.')</script>";
								    header("Location: fypCheckout.php");
								    exit;
								}


							    $query = "SELECT Address, City, PostalCode, phNo, Email,FirstName FROM account WHERE customerID = '{$_SESSION['customerID']}'";
							    $result = mysqli_query($mysqli, $query);
							    $customer_details = mysqli_fetch_assoc($result);

							    $query = "SELECT itemName, itemSize, itemQuantity, totalPrice FROM cart WHERE customerID = '{$_SESSION['customerID']}'";
							    $result = mysqli_query($mysqli, $query);

							    while($row = mysqli_fetch_assoc($result)) {
							        $item_name = $row['itemName'];
							        $item_size = $row['itemSize'];
							        $item_quantity = $row['itemQuantity'];
							        $total_price = $row['totalPrice'];

						        // $name = $customer_details['FirstName'];
						        // $address = $customer_details['Address'];
						        $city = $customer_details['City'];
						        // $postalcode = $customer_details['PostalCode'];
						        // $phNo = $customer_details['phNo'];
						        // $email = $customer_details['Email'];

						        $query = "INSERT INTO salesrecord (customerID, itemName, name,itemSuze, itemQuantity, totalPrice, address, city, postalcode, phNo, email, date_added) 
						                  VALUES ('{$_SESSION['customerID']}','$item_name','$name', '$item_size', '$item_quantity', '$total_price',  '$address1', '$city', '$poscode1', '$phoneNo', '$email',CURDATE())";
						        mysqli_query($mysqli, $query);
						    }

							    $query = "DELETE FROM cart WHERE customerID = '{$_SESSION['customerID']}'";
							    mysqli_query($mysqli, $query);
							    $mysqli->close();
							    header("Location: fypHomePage.php");
							}

							$sql = "SELECT * FROM account WHERE customerID = '{$_SESSION['customerID']}'"; 
				            $result = $mysqli->query($sql);

				             if ($result->num_rows > 0) {
	            				$row = $result->fetch_assoc();
	            				echo "<form method='post'>";
								echo "<p class='head'>Enter your name and address</p>";
								echo "<input type='text' name='name' placeholder='Name' class='in' value='{$row['FirstName']}' ><br>";
								echo "<input type='text' name='address' placeholder='Address' class='in' value='{$row['Address']}' ><br>";
								echo "<input type='text' name='poscode' placeholder='Postal Code' class='in' value='{$row['PostalCode']}' >";
								echo "<br>";
								echo "<br>";
								echo "<br>";
								echo "<p class='head'>Your contact information</p>";
								echo "<input type='text' name='email' placeholder='Email' class='in' value='{$row['Email']}' >";
								echo "<br>";
								echo "<input type='text' name='phoneNo' placeholder='Phone Number' class='in' value='{$row['phNO']}' >";
							}
						
					echo'</div>';
					echo'<div class="oSumm">';
						echo'<p class="head">Order Summary</p>';
						
							echo "<p class='os'>Subtotal  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RM " . $_SESSION['totalPrice'] . "</p>";
							echo "<p class='os'>Delivery/Shipping  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FREE</P>";
							echo "<p class='os'>Total  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RM " . $_SESSION['totalPrice'] . "</p>";
						
					echo'</div>';
				echo'</div>';
				echo'<br>';
				echo'<br>';
				echo'<br>';
				echo'<br>';
				echo'<br>';
				echo'<center>';
					echo'<p class="pCart">';
						echo'Payment Method';
					echo'</p>';
					echo'<br>';
					echo'<br>';
					echo'<br>';
					echo'<br>';
						echo'<div>';
							echo'<p class="pm">Card number</p>';
							echo'<input type="text" class="card" name="cardNumber" placeholder="12345678" pattern="\d{8}" maxlength="8">';
							echo'<p class="pm" name="cardHolder">Card holder</p>';
							echo'<input type="text" class="card" name="cardHolder" placeholder="Your Name">';
						echo'</div>';
						echo'<div class="pmf">';
								echo'<p class="pm1">Expiry date</p>';
								echo'<select name="expireMM" id="expireMM" class="se">';
								    echo'<option value="">Month</option>';
								    echo'<option value="01">01</option>';
								    echo'<option value="02">02</option>';
								    echo'<option value="03">03</option>';
								    echo"<option value='04'>04</option>";
								   	echo"<option value='05'>05</option>";
								    echo"<option value='06'>06</option>";
								    echo"<option value='07'>07</option>";
								    echo"<option value='08'>08</option>";
								    echo"<option value='09'>09</option>";
								    echo"<option value='10'>10</option>";
								    echo"<option value='11'>11</option>";
								    echo"<option value='12'>12</option>";
								echo"</select> ";

								echo"<select name='expireYY' id='expireYY' class='se'>";
								    echo"<option value=''>Year</option>";
								    echo"<option value='20'>2020</option>";
								    echo"<option value='21'>2021</option>";
								    echo"<option value='22'>2022</option>";
								    echo"<option value='23'>2023</option>";
								    echo"<option value='24'>2024</option>";
								echo"</select>";
								echo"<p class='pm1'>Security code</p>";
								echo'<input type="text" pattern="\d{4}" maxlength="4" class="scode" name="securityCode" placeholder="1234">';
					echo"</div>";
				echo"</center>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
			echo"<center>";
				    echo'<input type="submit" name="checkout" class="checkout" value="CHECKOUT">';
				    echo'<input type="submit" name="back" class="checkout" value="BACK">';
				echo"</form>";
			echo"</center>";
			?>
		</div>
		<br>
		<br>
		<br>
		<br><br>
	<div id="footer"></div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		function home(){
			window.location = "fypHomePage.php";
		}
	</script>
</body>
</html>