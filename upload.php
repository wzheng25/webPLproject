<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
	<link rel="stylesheet" href="styles/mystyles.css"/>
	
	<title>Upload</title>

  <!-- Code to Insert Navbar -->
  <script src="js/jquery-latest.min.js"></script>
  <script> 
   $(function(){
      $('.insertNavbar').load("navbar.html"); 
   });
  </script>
  <!-- External JS file -->
  <script src="js/external.js"></script>
</head>


<body>
<div id="uploadRouteDiv">
  <div class="insertNavbar"></div> <!-- Navbar -->
  <h3 align="center" style="padding-top:20px">Route Details</h3>
      <form class="routeForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

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
