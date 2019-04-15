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
	
	<title>Profile</title>
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


<p class="profile">
  Welcome back, <?php echo $_SESSION['firstname'] . "!";?>
</p>
<h4 class="profile-routes-text">
  Your uploaded routes:
</h4>

<div id="search-results">
</div>

<script>
function createRoute(name, date, distance, terrain, traffic, difficulty, image) {
  if(date) {
$("#search-results").append("<a class='routeProfile-link' href=''> <div class='routeProfile'> <aside class='aside'> <h1>" + name + "</h1> <ul> <li>" + date + "</li> <li>" + distance + " mi. </li> <li>" + terrain + "</li> <li>" + traffic + "</li> <li>" + difficulty + "</li> </ul> </aside> <div class='map'> <img src='" + image + "'> </div> </div></a>");
}
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
  
  $userid = $_SESSION['id'];

  // $uploaded_routes = SELECT `uploaded_routes` FROM 'users' WHERE 'id' === $id;
  // $sql = `SELECT id, uploaded_routes FROM users`;
  // $retval = mysqli_query($sql, $connection);

  // $sql = "SELECT [uploaded_routes] FROM [users] WHERE [[id] == $userid]";
  $sql="SELECT * FROM users";
  $result = $connection->query($sql);
  if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_row($result)) {
      if ($row[0] == $userid) {
        $hasRoute = TRUE;
        $uploaded_runs = explode("|", $row[5]);
        foreach ($uploaded_runs as $value) {
          $run_details = explode(",", $value);
          if (count($run_details)>1) {
            $name = $run_details[0];
            $date = $run_details[1];
            $distance = $run_details[2];
            $terrain = $run_details[3];
            $traffic = $run_details[4];
            $difficulty = $run_details[5];
            $image = $run_details[6];  
          
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
      }
    }
  }


  $connection->close();

?>

</body>
</html>