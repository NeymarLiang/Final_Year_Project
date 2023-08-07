<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Item - GLIMPSE</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fypHeaderCss.css">
    <link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		.container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .i {
            height: 500px;
            width: 450px;
            margin-right: 20px;
        }

        .item-details {
            display: flex;
            flex-direction: column;
            align-self: flex-start;
            width: 20%;
            margin-left: 150px;
            padding-top: 80px;
        }

        .btn{
            margin-top: 170px;
            margin-left: 0px;
            border: none;
            background-color: black;
            cursor: pointer;
            font-size: 20px;
            color: white;
            width: 250px;
            border-radius: 5px;
            border: 1px black solid;
        }

        .btn2{
            margin-top: 10px;
            margin-left: 0px;
            border: none;
            background-color: black;
            cursor: pointer;
            font-size: 20px;
            color: white;
            width: 250px;
            border-radius: 5px;
            border: 1px black solid;
        }

        .btn2:hover{
            background-color: lightgray;
            color: black;
        }

        .btn:hover{
            background-color: lightgray;
            color: black;
        }

        .t{
            font-weight: bold;
            font-family: 'GT America Extended Bold', sans-serif;
            font-size: 30px;
            margin-bottom: 10px;
        }

        .price{
            font-family: 'GT America Extended Bold', sans-serif;
            font-size: 24px;
        }

        .d {
            display: block;
            width: 110px;
            padding: 5px; 
            text-align: left; 
            font-size: 16px; 
            font-family: 'GT America Extended Bold', sans-serif;
        }

        .q{
            font-family: 'GT America Extended Bold', sans-serif;
            font-weight: bold;
            font-size: 23px;
        }

        .select{
            width: 42px;
            font-size: 18px;
            margin-top: 10px;
            margin-bottom: 10px;
            text-align: center;
        }

        .qnt{
            width: 200px;
            border-radius: 5px;
            font-size: 18px;
            text-align: center;
        }

        .size{
            font-size: 18px;
            font-family: 'GT America Extended Bold', sans-serif;
            border-radius: 5px;
        }

        .select{
            border-radius: 5px;
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

    <div class="c">
        <?php
            include 'fypDatabase.php';
            session_start();

            if (isset($_POST['search'])) {
                $itemName = $_POST['s'];

                $sql = "SELECT * FROM item WHERE itemName = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("s", $itemName);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Output data of the row
                    $row = $result->fetch_assoc();

                    echo '<form method="POST">';
                    echo '<input type="hidden" name="itemID" value="' . $row["itemID"] . '">';
                    echo '<input type="hidden" name="itemName" value="' . $row["itemName"] . '">';
                    echo '<input type="hidden" name="itemPrice" value="' . $row["itemPrice"] . '">';
                    echo '<input type="hidden" name="itemPic" value="' . $row["itemPic"] . '">';
                    echo "<div class='container'>";
                    echo '<img src="images/' . $row["itemPic"] . '" class="i">';
                    echo '<div class="item-details">';
                    echo '<p class="t">' . $row["itemName"] . '<p>';
                    echo '<p class="price">Price: RM' . $row["itemPrice"] . '</p>';
                    echo "<p class='size'>Size &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <select name='itemSize' class='select'><option value='S'>S</option><option value='M'>M</option><option value='L'>L</option></select></p>";
                    echo "<div class='quantity-container'>
                        <p class='size'>Quantity &nbsp;: &nbsp;<input type='number' name='quantity' min='1' max='99' value='1' class='qnt'></p>
                        </div>";  
                    echo '<button type="submit" name="addToCart" class="btn">ADD TO CART</button>';
                    echo '<button type="submit" name="back" class="btn2">BACK</button>';
                    echo '</div>';
                    echo "</div>";
                    echo '</form>';

                    echo "</div>";
                } else {
                    echo "<script>alert('Item Not Found'); window.location='fypShop.php';</script>";
                }
            }

            if (isset($_POST['viewItem'])) {
                $itemID = $_POST['itemID'];

                // Retrieve item details from database
                $sql = "SELECT * FROM item WHERE itemID = $itemID"; 
                $result = $mysqli->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of the row
                    $row = $result->fetch_assoc();

                        echo '<form method="POST">';
                        echo '<input type="hidden" name="itemID" value="' . $row["itemID"] . '">';
                        echo '<input type="hidden" name="itemName" value="' . $row["itemName"] . '">';
                        echo '<input type="hidden" name="itemPrice" value="' . $row["itemPrice"] . '">';
                        echo '<input type="hidden" name="itemPic" value="' . $row["itemPic"] . '">';
                        echo '<p class="t" style="text-align: center;">' . $row["itemName"] . '</p>';
                        echo "<div class='container'>";
                        echo '<img src="images/' . $row["itemPic"] . '" class="i">';
                        echo '<div class="item-details">';
                        echo '<p class="price">Price: RM' . $row["itemPrice"] . '</p>';
                        // echo "<p class='size'>Size &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <select name='itemSize' class='select'><option value='S'>S</option><option value='M'>M</option><option value='L'>L</option></select></p>";
                        echo "<p class='size'>Size &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <select name='itemSize' class='select' style='width: 200px;'>";
                        $sizes = explode(",", $row["itemSize"]); // Split the size combinations using commas

                        echo "<option value=''>Select Size</option>"; // Add a default option

                        foreach ($sizes as $size) {
                            echo "<option value='" . trim($size) . "'" . ($size == $_POST['itemSize'] ? " selected" : "") . ">" . trim($size) . "</option>"; // Display each size combination as an option
                        }

                        echo "</select></p>";
                        echo "<div class='quantity-container'>
                            <p>Quantity : &nbsp;<input type='number' name='quantity' min='1' max='99' value='1' class='qnt'></p>
                            </div>";  
                        echo '<button type="submit" name="addToCart" class="btn">ADD TO CART</button>';
                        echo '<button type="submit" name="back" class="btn2">BACK</button>';
                        echo '</div>';
                        echo "</div>";
                        echo '</form>';

                    echo "</div>";
                } else {
                    echo "Item not found.";
                }

            }

            if (isset($_POST['back'])) {
                header('Location: fypShop.php');
            }

            if (isset($_POST['addToCart'])) {
            
                if (!isset($_SESSION['customerID'])) {
                    // Customer is not logged in, redirect to login page
                    echo "<script>alert('Please login to add item to cart.')</script>";
                    header('Location: fypLogin.php');
                    exit;
                }else{
                    $customerID = $_SESSION['customerID'];
                    $itemID = $_POST['itemID'];
                    $itemName = $_POST['itemName'];
                    $itemPrice = $_POST['itemPrice'];
                    $itemPic = $_POST['itemPic'];
                    $itemSize = $_POST['itemSize'];
                    $itemQuantity = intval($_POST['quantity']);
                    $totalPrice = $itemPrice * $itemQuantity;

                    $sql = "INSERT INTO cart (customerID, itemID, itemName, itemPrice, itemPic, itemSize, itemQuantity, totalPrice)
                            VALUES ('$customerID', '$itemID', '$itemName', '$itemPrice', '$itemPic', '$itemSize', '$itemQuantity', '$totalPrice')";

                    if ($mysqli->query($sql) === TRUE) {
                         header('Location: fypShop.php');
                    } else {
                        echo "Error: " . $sql . "<br>" . $mysqli->error;
                    }

                    $mysqli->close();
                }
            }
        ?>  
    <center>
        <div class="q">
            <p>ITEM DETIALS</p>
        </div>
            <p class='d'>• Cotton twill</p>
            <p class='d'>• Made in Italy</p> 
            <p class='d'>• Dry cleaning</p>
            <br>
            <p class='q' >SIZE(CM)</p>
            <p class='d'>• M&nbsp;&nbsp;: 160-170</p>
            <p class='d'>• L&nbsp;&nbsp;&nbsp;: 171-180</p>
            <p class='d'>• XL : 181-190</p>
    </center> 
    </div>
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
    <?php
    include 'fypDatabase.php';

    if (isset($_POST['submit'])) {
        $feedback = $_POST['fback'];

        $sql = "INSERT INTO feedback (feedbackMessage) VALUES ('$feedback')";

        // Close database connection
        $mysqli->close();
    }

?>
</body>
</html>

