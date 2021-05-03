<html>
<head>
	<title>Search a user</title>
</head>
<body>
	<form method="post" action="">
		<label>Enter the user: <input type="text" name="searchProfile" /></label><br />
		<input type="submit" name="action" value="Search profile" />

	</form>

	<a href="<?=BASE?>/Profile/index/<?= $data['profile']->profile_id?>">Cancel</a>
	
</body>
</html>