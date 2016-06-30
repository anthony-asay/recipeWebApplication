<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public'); ?>/css/main.css">
	<title><?php echo $title ?>  | criticfights.com</title>
	<meta name="author" content="Anthony Asay">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url('public'); ?>/css/flexslider.css" type="text/css">
	<script src="<?php echo base_url('public'); ?>/js/jquery.min.js"></script>
</head>
<script type="text/javascript">

function cycleBackgrounds() {
    var index = 0;

    var images = document.getElementById('backgroundImages').children;
    //$imageEls = $('.toggle-image'); // Get the images to be cycled.
    
    setInterval(function () {
    	console.log(index);
        // Get the next index.  If at end, restart to the beginning.
        images[index].classList.remove('show');
        index = index + 1;
        if(index >= images.length)
        {
        	index = 0;
        }
        console.log(index);
        // Show the next image.
        images[index].classList.add('show');
        // Hide the previous image.
        

    }, 5000);
};
</script>
<body onload="cycleBackgrounds()">
	<div id="backgroundImages">
		<div class="background-image toggle-image first-image show"></div>
		<div class="background-image toggle-image second-image"></div>
		<div class="background-image toggle-image third-image"></div>
	</div>
	<script src="<?php echo base_url('public'); ?>/js/login.js"></script>
	<div id="container">
		<div id="content">
	<ul style="display: inline;" id="mainView">
