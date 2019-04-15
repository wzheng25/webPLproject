<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
	<link rel="stylesheet" href="styles/mystyles.css"/>
	
	<title>Routes</title>

    <!-- Code to Insert Navbar -->
  <script src="js/jquery-latest.min.js"></script>
  <script> 
   $(function(){
      $('.insertNavbar').load("navbar.php"); 
   });
  </script>
  
  <!-- External JS file -->
  <script src="js/external.js"></script>
  <div class="insertNavbar"></div> <!-- Navbar -->
</head>


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


<?php
session_start();

if (isset($_SESSION['id'])) {
  $href = "upload.php";
  $text = "";
}
else {
  $href = "";
  $text = "Please sign in to upload a route";
}
?>



<div class="routeButtons">
<button class="browseBtn" onclick="window.location='results.php'">Browse Routes</button>
<button class="uploadBtn" onclick="window.location='<?php echo $href ?>'" >Upload Route</button>
</div>
<p class="uploadError">
  <br>
  <?php echo $text; ?>
</p>

<script>
  /* For hiding/displaying form for uploading a route */
  /* Listener for the click event on the Upload Routes button */
  function onButtonClick(){
    document.getElementById("uploadRouteDiv").className="show";
  }
</script>
</body>
</html>


<!-- 
<script>
    /* For Displaying User Input Data from Upload Routes */
    /* Anonymous Function example */
    var showInput = function() {
        document.getElementById('display').innerHTML = "Your Submission: " + "<br>" +
                "Route Name: " + document.getElementById("routeName_input").value + "<br>" +
                    "Date: " + document.getElementById("date_input").value + "<br>" +
                    "Distance: " + document.getElementById("distance_input").value + "<br>" + 
                    "Terrain: " + document.getElementById("terrain_input").value + "<br>" +
                    "Traffic: " + document.getElementById("traffic_input").value + "<br>" +
                    "Difficulty: " + document.getElementById("difficulty_input").value;

    }
</script> -->
