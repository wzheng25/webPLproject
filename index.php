<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
	<link rel="stylesheet" href="styles/mystyles.css"/>

	<title>Run Cville</title>
  
  <!-- Code to Insert Navbar -->
  <script src="js/jquery-latest.min.js"></script>
  <script> 
   $(function(){
      $('.insertNavbar').load("navbar.php"); 
   });
  </script>
  
  <!-- External JS file -->
  <script src="js/external.js"></script>
</head>


<!-- Div of Navbar -->
<div class="insertNavbar"></div>

<!-- Autofocus for search bar -->
<script >
  function setFocus(){
    document.getElementById("searchbar").focus();
  }
</script>

<!-- Searchbar -->
<form class="form-inline active-cyan-3 active-cyan-4">
		<i class="fas fa-search" aria-hidden="true"></i>
		<input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search for a route" aria-label="Search" id="searchbar">
		<button class="btn" type="submit"  formaction="./results.html">Search</button>
</form>

<p class="index_text">
	Recently uploaded route:
</p>

<!-- Example Route -->
<div class="container">
	<div class="row">
		<div class="col-md-4">
		<p>
			<a class="nav-link" href="profile.html">Author: Test User</a>
			<ul>
				<li>5th Street Loop</li>
				<li>2/26/2018</li>
				<li>Distance: 4.68 miles</li>
				<li>Terrain: Roads/Sidewalk</li>
				<li>Traffic: Moderate</li>
				<li>Difficulty: Intermediate</li>
			</ul>
			<img class="stars" src="https://upload.wikimedia.org/wikipedia/commons/1/1b/4_stars.svg" width=55% height=13%">
		</p>
	</div>
	<div class="col-md-8">
		<p>
			<img src="https://d2u2bkuhdva5j0.cloudfront.net/activities-v2/2/570x190.jpg@2x?request=dHJ1ZSAyMTczMDU1ODYw&signature=b573bf8298017562b46897a45481be6bb094c09afcd6ea9ae8445f8123d161d3&activityVersion=c4654e7 " width="80%" height="20%">
		</p>
		    <!-- Img display textbox when message icon is clicked, after the onclick is activated -->
		<img src="http://pngimagesfree.com/speech_bubble/white_speech_bubble.png" width="30px" height="30px" id="commentImg" onclick = "onButtonClick()" />
		<!-- Form for adding a comment to a user's post
  		For now the input class for the textbox has been set to "hide" so that it's hidden from the user until the comment bubble gets clicked on, which activates the button listener to change the textbox to show.
  		-->
		<form class="comment" method="post">
		<input class= "hide" input type="text" placeholder="Add a comment..." size = "800" id="commentbox"><button id="commentBtn" class="hide" type="submit" form="comment" value="Submit" onclick="checkComment()">Add Comment</button>
		</form>
	</div>
</div>
</body>
</html>
