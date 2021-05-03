<!DOCTYPE html>
<html>
<head>
	<title>Search a user</title>
	<link rel="stylesheet" href="<?=BASE?>/CSS/ProfileCss/searchProfile.css">
</head>
<body>
	<div id="container">
		<h2>Search a Profile!</h2>
		<form method="post" action="" id="form">
			<label id="searchField">Username: <input type="text" name="searchProfile" /></label><br />
			<input type="submit" name="action" value="Search profile" id="searchButton"/>

		</form>

		<?php
			if ($data['profile']->profile_id != null) {
				echo "<a href=\"" . BASE . "/Profile/index/" . $data['profile']->profile_id . "\">cancel</a>";
			} else {
				echo "<a href=\"" . BASE . "/Default/index/\">cancel</a>";
			}
		?>
	</div>
</body>
</html>