<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="includes/style.css" type="text/css" media="screen" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
	<div id="header">
		<h1>Me RPG</h1>
		<h2>Become the best version of yourself</h2>
	</div>
	<div id="navigation">
		<ul>
			<li><a href="index.html">Home Page</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="view_profile.php">View Profile</a></li>
			<li><a href="password.php">Change Password</a></li>
			<li><?php // Create a login/logout link:
if ( (isset($_COOKIE['user_id'])) && (basename($_SERVER['PHP_SELF']) != 'logout.php') ) {
	echo '<a href="logout.php">Logout</a>';
} else {
	echo '<a href="login.php">Login</a>';
}
?></li>
		</ul>
	</div>
	<div id="content"><!-- Start of the page-specific content. -->
<!-- Script 12.7 - header.html -->
