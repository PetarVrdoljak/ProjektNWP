<?php
	# Stop Hacking attempt
	define('__APP__', TRUE);
	
	# Start session
	session_start();

	# Database connection
	include ("dbconn.php");

	# Variables MUST BE INTEGERS
	if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; }
	if(isset($_GET['action'])) { $action   = (int)$_GET['action']; }

	# Variables MUST BE STRINGS A-Z
	if(!isset($_POST['_action_']))  { $_POST['_action_'] = FALSE;  }

	if (!isset($menu)) { $menu = 1; }

	# Classes & Functions
	include_once("functions.php");
print '
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="description" content="Advanced web programming">
        <meta name="keywords" content="Advanced Web programming, HTML, web">
		<meta name="author" content="Petar Vrdoljak">
		<title>Samsung | Welcome </title>
	</head>
<body>
	<header>
		<div'; if ($menu > 1) { print ' class="hero-subimage"'; } else { print ' class="hero-image"'; }  print '></div>
		<nav>';
		include("menu.php");
		print'
		</nav>
	</header>
	<main>';
	if (isset($_SESSION['message'])) {
		print $_SESSION['message'];
		unset($_SESSION['message']);
	}

# Homepage
if (!isset($menu) || $menu == 1) { include("home.php"); }

# News
else if ($menu == 2) { include("news.php"); }

# Contact
else if ($menu == 3) { include("contact.php"); }

# About us
else if ($menu == 4) { include("about-us.php"); }

# Gallery
else if ($menu == 5) { include("gallery.php"); }

# Register
else if ($menu == 6) { include("register.php"); }

# Signin
else if ($menu == 7) { include("signin.php"); }

# Admin webpage
else if ($menu == 8) { include("admin.php"); }

# HNB
else if ($menu == 9) { include("admin/api-hnb.php");}

	print '
	</main>
	<footer>
		<p>Copyright &copy; '. date("Y") . ' Petar Vrdoljak. <a href="https://github.com/PetarVrdoljak?tab=repositories"><img src="Pictures\GitHub-Mark-Light-32px.png" title="Github" alt="Github"></a></p>
	</footer>
</body>
</html>';
?>