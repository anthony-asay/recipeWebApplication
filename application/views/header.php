<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public'); ?>/css/main.css">
	<title><?php echo $title ?>  | criticfights.com</title>
	<meta name="author" content="Anthony Asay">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>
<?php if (isset($_SESSION['userId'])): ?> 
<a href="<?php echo site_url('user/logout');?>">Logout</a>
<?php endif; ?>
<body onload="checkLocal()">
	<script src="<?php echo base_url('public'); ?>/js/login.js"></script>
	<div id="container">
		<div id="content">
	<ul style="display: inline;" id="mainView">
