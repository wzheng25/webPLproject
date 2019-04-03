<?php

/* At least 3 of these: */
// Use array(s), may be one-dimensional arrays or multi-dimensional arrays
// Use expressions
// Use control structures (such as selection and loop)
// Use predefined / standard / built-in function(s)


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$routeName_input = $_POST['routeName_input']; // validate 
	$date_input = $_POST['date_input']; // MM/DD/YYYY
	$distance_input = $_POST['distance_input']; //check if float, always in miles
	$terrain_input = $_POST['terrain_input']; // don't need validation: drop (road, sidewalk, track, trail, grassfield, turf, sand)
	$traffic_input = $_POST['traffic_input']; // don't need validation
	$difficulty_input = $_POST['difficulty_input']; // don't need validation
	$image_url_input = $_POST['image_url_input']; 

	if (empty($routeName_input)){
		
	}
}

?>
