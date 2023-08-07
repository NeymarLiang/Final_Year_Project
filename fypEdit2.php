<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit UPPER OUTER GARMENT
 </title>
 	<style type="text/css">
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
    <?php
    include 'fypDatabase.php';

    session_start();

    if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== "admin" || empty($_SESSION['admin'])) {
        header('Location: fypAdminLogin.php');
        exit;
    }

    if (isset($_POST['itemID_SELECT'])) {
        $selected_item_id = $_POST['itemID_SELECT'];
        
        $sql = "SELECT * FROM item2 WHERE itemID = '$selected_item_id'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            echo "<br>";
            echo "<table>";
            echo "<th>item ID</th><th>Item Name</th><th>Item Price</th><th>Item Pic</th>";

            echo "<tr>";
            echo '<td>'.$row["itemID"].'</td>';
            echo '<td>'.$row["itemName"].'</td>';
            echo '<td>'.$row["itemPrice"].'</td>';
            echo '<td>'.$row["itemPic"].'</td>';
            echo "</tr>";

            echo "</table>";

            // Display the edit form for the selected item
            echo "<p>Edit item</p>";
            echo '<form method="post" enctype="multipart/form-data">';
            echo "<input type='hidden' name='id' value=".$row['itemID'].">";
            echo "<p>Item Name : <input type='input' name='itemName' value='".$row['itemName']."'></p>";
            echo "<p>Item Price : <input type='input' name='itemPrice' value=".$row['itemPrice']."></p>";
            echo "<p>NOTE: The uploaded photo must have the same name as the item pic.(xxx.png/xxx.jpg) and must select img before update.</p>";
            echo "<p>Item Pic : <input type='file' name='itemPic' value=".$row['itemPic']."></p>";
            echo "<p class='size'>Size&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <select name='itemSize' class='select'>
                <option value='S'>S</option>
                <option value='M'>M</option>
                <option value='L'>L</option>
                <option value='S,M'>S,M</option>
                <option value='S,M,L'>S,M,L</option>
                <option value='M,L'>M,L</option>
                <option value='S,L'>S,L</option>
                </select></p>";
            echo "<br>";
            echo "<br>";
            echo '<input type="submit" value="UPDATE" name="ok">';
            echo "<input type='submit' value='BACK' name='back'>";
            echo "<input type='submit' value='DELETE' name='delete'>";
            echo "</form>";
        } else {
            echo "No item with that ID was found.";
        }
    }
    
    // Handle the form submission to update the item
    if (isset($_POST['ok'])) {
        $id = $_POST['id'];
        $in = $_POST['itemName'];
        $ip = $_POST['itemPrice'];
        $ipc_name = $_FILES['itemPic']['name'];
        $ipc = "$ipc_name";
        $itemSize = $_POST['itemSize'];

        $sql = "UPDATE item2 SET itemName = '$in', itemPrice = '$ip', itemPic = '$ipc', itemSize = '$itemSize' WHERE itemID = '$id'";
        $result = $mysqli->query($sql);
        echo "<script>alert('UPDATE SUCCESSFULLY')</script>";
        header('Location: fypEditItem2.php');
    }

    // Handle the form submission to go back to the item selection page
    if (isset($_POST['back'])) {
        header('Location: fypEditItem2.php');
    }

    if (isset($_POST['delete'])) {
    	$id = $_POST['id'];
    	$sql = "DELETE FROM item2 WHERE itemID = '$id'";
	    $result = $mysqli->query($sql);
	    echo "<script>alert('DELETE SUCCESSFULLY')</script>";
	    header('Location: fypEditItem2.php');
    }
    ?>
</body>
</html>
