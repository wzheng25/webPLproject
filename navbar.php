<?php
session_start();
?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
<link rel="stylesheet" href="styles/mystyles.css"/>


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
  <a class="navbar-brand" href="index.php" data-toggle="tooltip" data-placement="auto" title="Logo">
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
        <a class="nav-link" href="about_us.php" data-toggle="tooltip" data-placement="auto" title="Learn about the site">About Us</a>
      </li>
  </ul>
</div>
  
  <!-- Page Name -->
  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent1">
  <ul class="navbar-nav ml-auto">
      <li class="nav-brand">
        <a class="nav-link" href="index.php" data-toggle="tooltip" data-placement="auto" title="Homepage">Run Cville</a>
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
        <a class="nav-link" href="profile.php">
          <img src="<?php echo $_SESSION['picture'] ?>" width="45px" height="45px">
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="sign_in.php" data-toggle="tooltip" data-placement="auto" title="Sign in">Sign in</a>
      </li> 
    </ul>
    <!-- Links -->

  </div>
  <!-- Collapsible content -->

</nav>