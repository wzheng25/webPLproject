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

  
<!-- Check if a session exists and assign signin/logout text and profile picture accordingly -->

<?php
if (isset($_SESSION['id'])) {
  $text = "Log out";
  $picture = $_SESSION['picture']; 
  $href = "log_out.php";
  $href_profile = "profile.php";
}
else {
  $text = "Sign in";
  $picture = "https://s3.amazonaws.com/whisperinvest-images-prod/default-profile.png";
  $href = "sign_in.php";
  $href_profile = "";
}
?>

  <!-- Sign In Button and Profile Image -->

<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent1">
<ul class="navbar-nav ml-auto">
  <li class="nav-item">
    <a class="nav-link" href="<?php echo $href_profile ?>">
      <img src="<?php echo $picture ?>" width="45px" height="45px">
    </a>
  </li>
  <li class="nav-item active">
    <a class="nav-link" href="<?php echo $href ?>" data-toggle="tooltip" data-placement="auto" title="<?php echo $text ?>"><?php echo $text ?></a>
  </li> 
</ul>
</div>
    
    <!-- Links -->

  
  <!-- Collapsible content -->

</nav>

<!-- If cookies expire, unset session -->
<?php
if (!isset($_COOKIE['id'])) {
  unset($_SESSION['id']);
  unset($_SESSION['email']);
  unset($_SESSION['firstname']);
  unset($_SESSION['lastname']);
  unset($_SESSION['picture']);
  unset($_SESSION['uploaded_routes']);
  ?>
  <!-- <script type="text/javascript"> -->
  <!-- document.location.href = "localhost/webPLproject/sign_in.php"; -->
  <!-- </script> -->
  <?php
}
?>