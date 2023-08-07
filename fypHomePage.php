<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Page - GLIMPSE</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fypHeaderCss.css">
	<link rel="stylesheet" type="text/css" href="style.css">


	<style type="text/css">
		.content{
			position: relative;
		}

		.bags{
			position: absolute;
			top: 79%;
			left: 50%;
			color: white;
			font-size: 32px;
  			font-weight: bold;
  			font-family: Arial, sans-serif;
  			background-color: transparent;
  			border: none;
		}

		.women{
			position: absolute;
			top: 90%;
			left: 50%;
			color: white;
			font-size: 29px;
  			font-weight: bold;
  			font-family: Arial, sans-serif;
  			background-color: transparent;
  			border: none;
		}

		.women:hover{
			cursor: pointer;
		}

		.bags:hover{
			cursor: pointer;
		}

		* {box-sizing: border-box}
		.mySlides {display: none}
		img {vertical-align: middle;}

		/* Slideshow container */
		.slideshow-container {
		  width: auto;
		  position: relative;
		  margin: auto;
		}

		/* Next & previous buttons */
		.prev, .next {
		  cursor: pointer;
		  position: absolute;
		  top: 50%;
		  width: auto;
		  padding: 16px;
		  margin-top: -22px;
		  color: white;
		  font-weight: bold;
		  font-size: 18px;
		  transition: 0.6s ease;
		  border-radius: 0 3px 3px 0;
		  user-select: none;
		}

		/* Position the "next button" to the right */
		.next {
		  right: 0;
		  border-radius: 3px 0 0 3px;
		}

		/* On hover, add a black background color with a little bit see-through */
		.prev:hover, .next:hover {
		  background-color: rgba(0,0,0,0.8);
		}

		/* Caption text */
		.text {
		  color: #f2f2f2;
		  font-size: 15px;
		  padding: 8px 12px;
		  position: absolute;
		  bottom: 8px;
		  width: 100%;
		  text-align: center;
		}

		/* The dots/bullets/indicators */
		.dot {
		  cursor: pointer;
		  height: 15px;
		  width: 15px;
		  margin: 0 2px;
		  background-color: #bbb;
		  border-radius: 50%;
		  display: inline-block;
		  transition: background-color 0.6s ease;
		}

		.active, .dot:hover {
		  background-color: #717171;
		}

		/* Fading animation */
		.fade {
		  animation-name: fade;
		  animation-duration: 1.5s;
		}

		@keyframes fade {
		  from {opacity: .4} 
		  to {opacity: 1}
		}

		/* On smaller screens, decrease text size */
		@media only screen and (max-width: 300px) {
		  .prev, .next,.text {font-size: 11px}
		}

		.shop{
			position: absolute;
			margin: 0 auto;
			background-color: transparent;
			border: none;
			top: 50%;
			left: 47%;
			font-size: 35px;
  			font-weight: bold;
  			font-family: Arial, sans-serif;
		}

		.shop:hover{
			color: white;
		}

		.IMG{
			position: relative;
		}

		.handbag{
			height: 90%; width: 100%;
		}

		.handbag:hover{
			opacity: 0.7;
			cursor: pointer;
		}

		.bags:hover ~.handbag{
			opacity: 0.7;
		}

		.free{
			font-weight: bold;
			font-size: 50px;
			font-family: Franklin Gothic Medium;
		}

		.dress{
			font-family: Franklin Gothic Medium;
			font-size: 20px;
			width: 50%;
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

	<div class="content">
		<div class="content1">
			<img class="handbag" onclick="aboutUs()" src="images/handbag.jpg" onmouseover="document.querySelector('.handbag').style.opacity = '0.7'" onmouseout="document.querySelector('.handbag').style.opacity = '1'">
			<p onclick="aboutUs()" class="bags" onmouseover="document.querySelector('.handbag').style.opacity = '0.7'" onmouseout="document.querySelector('.handbag').style.opacity = '1'">We provide people with noble clothing to highlight their taste</p>
			<p onclick="aboutUs()" class="women"onmouseover="document.querySelector('.handbag').style.opacity = '0.7'" onmouseout="document.querySelector('.handbag').style.opacity = '1'">Clothes are people's skin</p>
		</div>
	</div>
	<br>
	<br>
	<div>
		<center>
			<div class="free">
				Freedom To Dress
			</div>
			<br>
				<div class="dress">
					Today, people have a wide range of clothing options ranging from traditional dresses to modern fashion styles. Fashion is an expression of personal identity and style, and clothing plays a vital role in self-expression.
				</div>
				<br>
				<br>
				<div class="dress">
					Clothing can be both functional and stylish, reflecting the wearer's lifestyle, beliefs and values. With endless options and styles, one can explore and experiment with fashion for a unique and personal look.
				</div>
		</center>
	</div>
	<br>
	<br>
	<div class="slideshow-container">
		<div class="mySlides fade">
		  	<img class="IMG" src="images/fypCloth1.jpg" style="width:100%; height:700px">
		  	<button onclick="shopPage()" class="shop">SHOP NOW</button>
		</div>
		<div class="mySlides fade">
		  	<img class="IMG" src="images/fypCloth.jpg" style="width:100%; height:700px">
		  	<button onclick="shopPage()" class="shop">SHOP NOW</button>
		</div>
		<div class="mySlides fade">
		  	<img class="IMG" src="images/fypCloth2.jpg" style="width:100%; height:700px">
		  	<button onclick="shopPage()" class="shop">SHOP NOW</button>
		</div>

		<a class="prev" onclick="plusSlides(-1)">❮</a>
		<a class="next" onclick="plusSlides(1)">❯</a>
	</div>

	<br>

	<div style="text-align:center">
	  	<span class="dot" onclick="currentSlide(1)"></span> 
	  	<span class="dot" onclick="currentSlide(2)"></span> 
	  	<span class="dot" onclick="currentSlide(3)"></span> 
	</div>

	<script>

	function shopPage() {
		window.location.href = "/fypShop.php";
	}

	function aboutUs() {
		window.location.href = "/fypAboutUs.php";
	}

	function opa(){

	}

	let slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) {
	  showSlides(slideIndex += n);
	}

	function currentSlide(n) {
	  showSlides(slideIndex = n);
	}

	function showSlides(n) {
	  let i;
	  let slides = document.getElementsByClassName("mySlides");
	  let dots = document.getElementsByClassName("dot");
	  if (n > slides.length) {slideIndex = 1}    
	  if (n < 1) {slideIndex = slides.length}
	  for (i = 0; i < slides.length; i++) {
	    slides[i].style.display = "none";  
	  }
	  for (i = 0; i < dots.length; i++) {
	    dots[i].className = dots[i].className.replace(" active", "");
	  }
	  slides[slideIndex-1].style.display = "block";  
	  dots[slideIndex-1].className += " active";
	}
	</script>
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
<?php
include 'fypDatabase.php'; // Include the file containing your database connection details

if (isset($_POST['submit'])) {
    $feedback = $_POST['fback'];

    // Create the SQL query
    $sql = "INSERT INTO feedback (feedbackMessage) VALUES ('$feedback')";

    // Execute the SQL query
    if ($mysqli->query($sql) === TRUE) {
        echo "Feedback inserted successfully.";
    } else {
        echo "Error inserting feedback: " . $mysqli->error;
    }

    // Close the database connection
    $mysqli->close();
}
?>

	<!-- <script>
	  $(function(){
	    $("#footer").load("fypFooter.php"); 
	  });
	</script> -->

</body>
</html>



