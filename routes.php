<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
	<link rel="stylesheet" href="styles/mystyles.css"/>
	
	<title>Routes</title>
</head>

<!-- Enable Tooltips in document (hovering over navbar items will display text) - source: https://www.w3schools.com/bootstrap/bootstrap_tooltip.asp -->
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});
 </script>

<!-- Set focus on searchbar on load -->
<body onload="setFocus();">

  <nav class="navbar navbar-expand-md" style="background-color: #F8C471;">


  <!-- Navbar Logo -->
  <!-- Image source: http://www.logospng.com/images/108/track-shoe-with-wings-clipart-best-108087.png" -->
  <a class="navbar-brand" href="index.html" data-toggle="tooltip" data-placement="auto" title="Logo">
    <img src="http://www.logospng.com/images/108/track-shoe-with-wings-clipart-best-108087.png" width="60px" height="60px" alt="Logo">
  </a>

  <!-- Collapse button --> 
  <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
    aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text">
      <i class="fas fa-bars fa-1x"></i></span></button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent1">

    <!-- About Us Item -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="about_us.html" data-toggle="tooltip" data-placement="auto" title="Learn about the site">About Us</a>
      </li>
  </ul>
</div>
  
  <!-- Page Name -->
  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent1">
  <ul class="navbar-nav ml-auto">
      <li class="nav-brand">
        <a class="nav-link" href="index.html" data-toggle="tooltip" data-placement="auto" title="Homepage">Run Cville</a>
      </li>
  </ul>
 </div>

  <!-- Routes Item -->
  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent1">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="routes.php" data-toggle="tooltip" data-placement="auto" title="Search for existing routes">Routes</a>
      </li>
  </ul>
</div>

  <!-- Sign In Button and Profile Image -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent1">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="profile.html">
          <img src="https://s3.amazonaws.com/whisperinvest-images-prod/default-profile.png" width="45 px" height="45px">
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="sign_in.html" data-toggle="tooltip" data-placement="auto" title="Sign in">Sign in</a>
      </li> 
    </ul>
    <!-- Links -->

  </div>
  <!-- Collapsible content -->

</nav>
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

<div class="routeButtons">
<button class="browseBtn" onclick="window.location='results.html'">Browse Routes</button>
<button class="uploadBtn" onclick="window.location='upload.php'" >Upload Routes</button>
</div>

<script>
  /* For hiding/displaying form for uploading a route */
  /* Listener for the click event on the Upload Routes button */
  function onButtonClick(){
    document.getElementById("uploadRouteDiv").className="show";
  }
</script>

<!-- 
The following section will be the HTML content of the form used to upload a route, which will take in user input and will be used by the javascript that follows this div section to display the user's submission. For now the input class is set to "hide" so that it doesn't immediately appear on the screen when the user is on the Routes page
-->

<!--
<div id="uploadRouteDiv" input class = "hide">
  <h3 align="center">Route Details</h3>
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">

        <label><b>Route Name</b></label>
        <input type="text" name="routeName_input" id="routeName_input">
        <br>

        <label><b>Date</b></label>
        <input type="text" name="date_input" id="date_input" maxlength="10">
        <br>

        <label><b>Distance</b></label>
        <input type="number" name="distance_input" id="distance_input">
        <br>

        <label><b>Terrain</b></label>
        <input type="text" name="terrain_input" id="terrain_input">
        <br>

        <label><b>Traffic</b></label>
        <input type="text" name="traffic_input" id="traffic_input">
        <br>


        <label><b>Difficulty:</b></label>
        <select id="difficulty_input" name="difficulty_input">
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                    <option value="Challenging">Challenging</option>
        </select>
    	  
        <br>

        <label><b>Route Image URL</b></label>
        <input type="text" name="image_url_input" id="image_url_input">
        <br>

        <input type="submit"><br/>
    </form>

  
  <p><span id='display'></span></p>
</div>

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
</script>
-->

<?php

/* At least 3 of these: */
// Use array(s), may be one-dimensional arrays or multi-dimensional arrays
// Use expressions
// Use control structures (such as selection and loop)
// Use predefined / standard / built-in function(s)

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  if (empty($_POST['routeName_input'])) {
    echo 'Hello';
    $routeName_input = $_POST['routeName_input'];
  }
  if (isset($_POST['date_input'])) {
    if (strlen($_POST['date_input']) == 10) {
      $date_input = $_POST['date_input']; // MM/DD/YYYY
    }
    echo 'Please use MM/DD/YYYY format for date.';
  }
  if (isset($_POST['distance_input'])) {
    $distance_input = $_POST['distance_input']; //check if float, always in miles
  }
  // $terrain_input = $_POST['terrain_input']; // don't need validation: drop (road, sidewalk, track, trail, grassfield, turf, sand)
  // $traffic_input = $_POST['traffic_input']; // don't need validation
  // $difficulty_input = $_POST['difficulty_input']; // don't need validation
  if (isset($_POST['image_url_input'])) {
    $image_url_input = $_POST['image_url_input']; 
  }
}

?>

</body>
</html>
