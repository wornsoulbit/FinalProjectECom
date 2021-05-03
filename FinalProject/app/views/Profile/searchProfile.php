<html>
<head>
	<title>Search a user</title>
</head>
<body>
	<form method="post" action="">
		<label>Enter the user: <input type="text" name="searchProfile" /></label><br />
		<input type="submit" name="action" value="Search profile" />

	</form>

	<?php
		if ($data['profile']->profile_id != null) {
			echo "<a href=\"" . BASE . "/Profile/index/" . $data['profile']->profile_id . "\">cancel</a>";
		} else {
			echo "<a href=\"" . BASE . "/Default/index/\">cancel</a>";
		}
	?>
	
</body>
</html>