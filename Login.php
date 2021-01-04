<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>ENSAK</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		if(isset($_POST['login']))
		{
			$_SESSION['email']=$_POST['email'];
			$_SESSION['passw']
		}
	?>
</body>
</html>