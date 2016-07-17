<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public'); ?>/css/main.css">
	<title><?php echo $title ?> | GotIngredients.com</title>
	<meta name="author" content="Anthony Asay">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('public'); ?>/images/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" href="<?php echo base_url('public'); ?>/images/favicon/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="<?php echo base_url('public'); ?>/images/favicon/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="<?php echo base_url('public'); ?>/images/favicon/manifest.json">
<link rel="mask-icon" href="<?php echo base_url('public'); ?>/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#ffffff">
</head>
<script type="text/javascript">

function cycleBackgrounds() {
    var index = 0;
    checkLocal();
    var images = document.getElementById('backgroundImages').children;
    
    setInterval(function () {
        // Get the next index.  If at end, restart to the beginning.
        images[index].classList.remove('show');
        index = index + 1;
        if(index >= images.length)
        {
        	index = 0;
        }
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
    <script src="<?php echo base_url('public'); ?>/js/form-validation.js"></script>
	<div id="container">
		<div id="content">
	<ul style="display: inline;" id="mainView">
