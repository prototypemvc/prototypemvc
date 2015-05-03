<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- 
			META 
		-->
		<meta charset="utf-8">
		<title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in index.php?></title>
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- 
			CSS 
			Can also be loaded in the controller, like:
			view::css('example'); // will load file from public/css 
		-->
		<?php view::css('style'); ?>
		<!-- 
			JS 
			Can also be loaded in the controller, like:
			view::js('example'); // will load file from public/js 
		-->
	</head>
	<body>

		<div id='wrapper'>
