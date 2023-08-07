<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About US - GLIMPSE</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fypHeaderCss.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<style type="text/css">
		.aboutUs1 {
	        display: flex;
	        flex-direction: row;
	    }
	    .box {
	        flex: 1;
	        margin: 10px;
	        padding: 20px;
	    }
	    .pic1 {
	        height: 700px;
	        width: 100%;
	    }
	    .p1 {
	        margin: 0;
	        font-size: 30px;
	        color: #828282;
	    }

	    .boxbox{
	    	margin: 10px;
	        padding: 20px;
	    }

	    .rose{
	    	font-family: sans-serif;
	    	font-size: 40px;
	    	font-weight: bold;
	    }

	    .fire{
	    	color: #828282;
	    	font-size: 23px;
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

	<div class="aboutUs1">
		<div class="box">
			<img class="pic1" src="aboutus1.jpeg">
		</div>
		<div class="box">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<p class="p1">
			In 2001, Glimpse Clothing was a rising streetwear brand that was gaining popularity in the fashion world. Known for its bold and graphic designs, the brand offered a fresh and unique perspective on streetwear fashion. </p>
			<br>
			<br>
			<br>
			<br>
			<p class="p1">
			From graphic tees to hoodies, Glimpse Clothing created pieces that stood out in a crowded market. The brand's edgy and urban style resonated with young people who were looking for clothing that reflected their rebellious spirit. </p>
			<br>
			<br>
			<br>
			<br>
			<p class="p1">
			In just a few short years, Glimpse Clothing had established itself as a go-to brand for those who wanted to make a statement with their clothing.
			</p>
		</div>
	</div>
	<center>
		<div class="boxbox">
			<p class="rose">FIRE ROSE</p>
			<p class="fire">Fire Rose was a princess who loved clothes. She believed that fashion was an expression of one's personality and that a well-dressed person could make a strong statement. Despite her love of beautiful garments, Fire Rose was also humble and kind-hearted. She used her fashion sense to inspire others and bring joy to her kingdom. Her wardrobe was full of stunning dresses and accessories that were the envy of all who saw them. For Fire Rose, clothes were more than just something to wear - they were a way of life.</p>
		</div>
	</center>
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
	</script><?php
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
</body>
</html>