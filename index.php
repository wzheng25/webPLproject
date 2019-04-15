<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta authors="Peter Felland and William Zheng">
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
<form class="form-inline active-cyan-3 active-cyan-4" method="GET" action="search_results.php" id="searchbar">
		<i class="fas fa-search" aria-hidden="true" id="searchbar"></i>
		<input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search for a route" aria-label="Search" id="searchbar" name="search_query">
		<button class="btn" type="submit" id="searchbar" >Search</button>
</form>
<p class="index_text">
	Check out this recently uploaded route!
</p>

<div>
	<?php
		$host = 'localhost';
		$dbname = 'runcvilledb';
		$username = 'webPLadmin';
		$password = 'password';

		$connection = new mysqli($host, $username, $password, $dbname);
		if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
		}

		$sql="SELECT name, date, distance, terrain, traffic, difficulty, image FROM routes";
		if ($result=mysqli_query($connection, $sql)) {
			// while($row=mysqli_fetch_row($result)) {;
				$row = mysqli_fetch_row($result);
				$name = $row[0];
				$date = $row[1];
				$distance = $row[2];
				$terrain = $row[3];
				$traffic = $row[4];
				$difficulty = $row[5];
				$image = $row[6];
			}
		// }
		mysqli_free_result($result);
		mysqli_close($connection);
	?>

	<a class="routeProfile-link" href="">
	    <div class="routeProfile">
	        <aside class="aside">
	            <h1><?php echo $name?></h1>
	            <ul>
	                <li><?php echo $date?></li>
	                <li><?php echo $distance?> mi.</li>
	                <li><?php echo $terrain?></li>
	                <li><?php echo $traffic?></li>
	                <li><?php echo $difficulty?></li>
	            </ul>
	        </aside>
	        <div class="map">
	            <img src="<?php echo $image?>">
	        </div>
	    </div>
	</a>
	</div>
</div>
<!-- Img display textbox when message icon is clicked, after the onclick is activated -->
	<img src="http://pngimagesfree.com/speech_bubble/white_speech_bubble.png" style="text-align:center" width="30px" height="30px" id="commentImg" onclick = "onButtonClick()" />
	<!-- Form for adding a comment to a user's post
  	For now the input class for the textbox has been set to "hide" so that it's hidden from the user until the comment bubble gets clicked on, which activates the button listener to change the textbox to show.
  	-->
	<form class="comment" method="post" style="padding-left:400px;">
		<input class= "hide" input type="text" placeholder="Add a comment..." size = "800" id="commentbox"><button id="commentBtn" class="hide" type="submit" form="comment" value="Submit" onclick="checkComment()">Add Comment</button>
	</form>
</body>
</html>
