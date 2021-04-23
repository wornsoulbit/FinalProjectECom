<html>
<head><title>This is somewhere secure</title></head>
<body>
	<p>Welcome to somewhere secure... 
	<?= $_SESSION['username'] ?></p>

	<p>Account created:
	<?= $_SESSION['timeout'] ?></p>

	<p><a href='<?= BASE ?>/Default/logout'>Logout</a></p>
</body>
</html>