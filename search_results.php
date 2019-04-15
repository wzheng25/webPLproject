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
<form class="form-inline active-cyan-3 active-cyan-4" method="GET">
    <i class="fas fa-search" aria-hidden="true"></i>
    <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search for a route" aria-label="Search" name="search_query">
    <button class="btn" type="submit">Search</button>
</form>

<div class="your_query" style="text-align: center">
<?php
  echo 'You searched for: ' . $_GET['search_query']. "!<br><br>";
?>
</div>

<div id="search-results"></div>
<!-- Function to create routes by calling this function instead of typing it out as above -->
<script>
function createRoute(name, date, distance, terrain, traffic, difficulty, image) {
$("#search-results").append("<a class='routeProfile-link' href=''> <div class='routeProfile'> <aside class='aside'> <h1>" + name + "</h1> <ul> <li>" + date + "</li> <li>" + distance + " mi. </li> <li>" + terrain + "</li> <li>" + traffic + "</li> <li>" + difficulty + "</li> </ul> </aside> <div class='map'> <img src='" + image + "'> </div> </div></a>");
}
</script>


<div class="searchphp" style="padding-left: 40px">
<?php
  $search_query = "";
  if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $search_query = $_GET['search_query'];
  }

  /* CONNECTIONS */
  $host = 'localhost';
  $dbname = 'runcvilledb';
  $username = 'webPLadmin';
  $password = 'password';
  $connection = new mysqli($host, $username, $password, $dbname);
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }


  /* Retrieving the Search Query from DATABASE */
  $sql = "SELECT name, date, distance, terrain, traffic, difficulty, image FROM routes WHERE name LIKE '%" . $search_query .  "%'";
  if ($result = mysqli_query($connection, $sql)){
    while ($row = mysqli_fetch_array($result)){
       $name = $row['name'];
       $date = $row['date'];
       $distance = $row['distance'];
       $terrain = $row['terrain'];
       $traffic = $row['traffic'];
       $difficulty = $row['difficulty'];
       $image = $row['image'];
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
</div>

</html>