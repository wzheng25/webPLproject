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
    <button class="btn" type="submit"  formaction="./results.php">Search</button>
</form>

<!-- HTML Route-->
<!-- <a class="routeProfile-link" href="">
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
</a> -->

<div id="search-results"></div>

<!-- Function to create routes by calling this function instead of typing it out as above -->
<script>
function createRoute(name, date, distance, terrain, traffic, difficulty, image) {
$("#search-results").append("<a class='routeProfile-link' href=''> <div class='routeProfile'> <aside class='aside'> <h1>" + name + "</h1> <ul> <li>" + date + "</li> <li>" + distance + " mi. </li> <li>" + terrain + "</li> <li>" + traffic + "</li> <li>" + difficulty + "</li> </ul> </aside> <div class='map'> <img src='" + image + "'> </div> </div></a>");
}
</script>


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
      while($row=mysqli_fetch_row($result)) {
        $name = $row[0];
        $date = $row[1];
        $distance = $row[2];
        $terrain = $row[3];
        $traffic = $row[4];
        $difficulty = $row[5];
        $image = $row[6];
        ?>

        <script>
          var name = "<?php echo $name ?>";
          var date = "<?php echo $date ?>";
          var distance = "<?php echo $distance ?>";
          var terrain = "<?php echo $terrain ?>";
          var traffic = "<?php echo $traffic ?>";
          var difficulty = "<?php echo $difficulty ?>";
          var image = "<?php echo $image?>";
          createRoute(name, date, distance, terrain, traffic, difficulty, image);
        </script>
        <?php

      }
    }
    mysqli_free_result($result);
    mysqli_close($connection);
?>

</html>
