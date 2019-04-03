<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
	<link rel="stylesheet" href="styles/mystyles.css"/>
	
	<title>Upload</title>
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
      		<img src="https://s3.amazonaws.com/whisperinvest-images-prod/default-profile.png" width="45	px" height="45px">
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

<div id="uploadRouteDiv">
  <h3 align="center">Route Details</h3>
      <form class="routeForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

        <label><b>Route Name</b></label>
        <input type="text" name="routeName_input" id="routeName_input">
        <br>

        <label><b>Date</b></label>
        <input type="text" name="date_input" id="date_input">
        <br>

        <label><b>Distance</b></label>
        <input type="number" name="distance_input" id="distance_input">
        <br>

        <label><b>Terrain</b></label>
        <select id="terrain_input" name="terrain_input">
          <option value="Roads/Sidewalk">Roads/Sidewalk</option>
          <option value="Trail">Trail</option>
          <option value="Field">Field</option>
          <option value="Track">Track</option>
          <option value="Beach">Beach</option>
        </select>
        <br>

        <label><b>Traffic</b></label>
        <select id="traffic_input" name="traffic_input">
          <option value="None">None</option>
          <option value="Light">Light</option>
          <option value="Moderate">Moderate</option>
          <option value="Heavy">Heavy</option>
        </select>
        
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

<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (empty($_POST['routeName_input'])) {
    exit("Please enter a route name");
  }
  $routeName = $_POST['routeName_input'];

  if (empty($_POST['date_input']) || strlen($_POST['date_input']) != 10) {
    exit("Please enter a date in MM/DD/YYYY format");
  }
  $date = $_POST['date_input'];

  if (empty($_POST['distance_input'])) {
    exit("Please enter a distance");
  }
  $distance = $_POST['distance_input'];

  $terrain = $_POST['terrain_input'];

  $traffic = $_POST['traffic_input'];

  $difficulty = $_POST['difficulty_input'];

  if (empty($_POST['image_url_input'])) {
    exit("Please enter an image url");
  }
  $imageURL = $_POST['routeName_input'];
}
?>



</body>
</html>
