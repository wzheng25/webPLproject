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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>

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


<form class="form-inline active-cyan-3 active-cyan-4">
    <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search for a route" aria-label="Search" id="searchbar">
    <button class="btn" type="submit"  formaction="./results.html">Search</button>
</form>

<!-- HTML Route-->
<a class="routeProfile-link" href="">
    <div class="routeProfile">
        <aside class="aside">
            <h1>Rugby/Barracks</h1>
            <ul>
                <li>3/17/2019</li>
                <li>Distance: 4.1 miles</li>
                <li>Traffic: Moderate</li>
                <li>Terrain: Sidewalk</li>
                <li>Difficulty: Intermediate</li>
                <li>Rating: 4.5/5</li>
            </ul>
        </aside>
        <div class="map">
            <img src="https://d2u2bkuhdva5j0.cloudfront.net/activities-v2/2/570x190.jpg@2x?request=dHJ1ZSAyMjIxMjE1NjEx&signature=7b19852c8f87b8051783dec06e6d2fb450c5ac6c46300ea618c8f0d1c064ff08&activityVersion=3622ad5">
        </div>
    </div>
</a>

<div id="search-results">
</div>

<!-- Function to create routes by calling this function instead of typing it out as above -->
<script>
function createRoute(name, date, distance, traffic, terrain, difficulty, rating, image) {
$("#search-results").append("<a class='routeProfile-link' href=''> <div class='routeProfile'> <aside class='aside'> <h1>" + name + "</h1> <ul> <li>" + date + "</li> <li>" + distance + "</li> <li>" + traffic + "</li> <li>" + terrain + "</li> <li>" + difficulty + "</li> <li>" + rating + "</li> </ul> </aside> <div class='map'> <img src='" + image + "'> </div> </div></a>");
}

// Create a route by calling the function
createRoute("Rubgy/Cherry", "2/26/19", "5.5 mi", "Moderate", "Hilly", "Intermediate", "5 stars", "https://d2u2bkuhdva5j0.cloudfront.net/activities-v2/2/570x190.jpg@2x?request=dHJ1ZSAyMTc3ODk0NzUz&signature=500a0d590361f2d7fe01e3ab2706bdded9c325b8aa4ae721927fc6fe16d7dfb7&activityVersion=60a0e94")
</script>

</body>
</html>
