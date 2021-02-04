<!DOCTYPE html>
<html>
<head>
	<title>Settings</title>
	<link rel="stylesheet" type="text/css" href="Login.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style type="text/css">
	.ul
	{
		position: relative;
		left: 200px;
		top: 70px;
		width: 500px;
	}
	.set
	{
		color: black;
	}
</style>
<body>
	<?php include('Search.php') ?>
	<ul class="ul">
	<li class="list-group-item list-group-item-secondary"><a class=" set" href="name.php">Change your name.</a> </li>
	<li class="list-group-item list-group-item-secondary"><a class=" set" href="password.php">Change your password.</a></li>
	<li class="list-group-item list-group-item-secondary"><a class=" set" href="picture.php">Change your profil picture.</a></li>
	<li class="list-group-item list-group-item-secondary"><a class=" set" href="deletepic.php">Delete your profile picture.</a></li>
	<li class="list-group-item list-group-item-secondary"><a class=" set" href="inter.php">Change your interests.</a></li>
	<li class="list-group-item list-group-item-secondary"><a class=" set" href="birth.php">Change your birthday.</a></li>
	<li class="list-group-item list-group-item-secondary"><a class=" set" href="desc.php">Change your description.</a></li>


	</ul>
</body>
</html>