<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-signin-client_id" content="841498573297-kcsuu19a9b5tme9q6mjrqpkgdf53587h.apps.googleusercontent.com">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="styles/mystyles.css"/>
  <script src="https://apis.google.com/js/platform.js" async defer></script>

	
	<title>Sign In</title>

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
	

<!-- Autofocus for username -->
<script >
  function setFocus(){
    document.getElementById("username").focus();
  }
</script>


  <!-- Sign in Form: Temporarily just redirects to index.html -->
	<!-- <form action="index.html" id=login style="text-align:center; padding-top: 100px;"> -->
  <!-- Username: -->
  <!-- <input id="username" type="Username" name="Username"> -->
  <!-- <br> -->
  <!-- <br> -->
  <!-- Password: -->
  <!-- <input id="password" type="password" name="Password"> -->
  <!-- <br> -->
  <!-- Embed warning text -->
  <!-- <span cl/ass="warning" id="warning" style="display:none; text-align: right; color:red; font-weight: bold;";> Caps Lock is on! </span> -->
  <!-- <br> -->
  <!-- <br> -->
  <!-- <input type="submit" href="index.html" value="Login"> -->
<!-- </form>  -->

<p class="g-signin-text">
  Sign in with your Google account
</p>
<p class="border"></p>
<div class="g-signin2" data-onsuccess="onSignIn">
</div>

</body>


<script>
  function onSignIn(googleUser) {
    var id_token = googleUser.getAuthResponse().id_token;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', "./create_user.php");
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('idtoken=' + id_token);
    xhr.onload = function() {
      console.log(xhr.responseText);
      // Redirect
      window.location.assign('index.php');
    }
  }
</script>


<!-- Caps Lock Detector -->
<script>
var input = document.getElementById("password");

// Grab warning text
var warning = document.getElementById("warning");

// When any key is pressed, call the function
/*
input.addEventListener("keyup", function(event) {

  // If caps lock is pressed, display the warning
  if (event.getModifierState("CapsLock")) {
    warning.style.display = "inline-block";
  } else {
    warning.style.display = "none"
  }
});*/
</script>