<html>
<head>
	<title>Search a page</title>
</head>
<body>
		<h2>Search a Page!</h2>
		<form method="post" action="" id="form">
			<label id="searchField">Enter page title: <input type="text" name="searchPage" /></label><br />
			<input type="submit" name="action" value="Search page" id="searchButton"/>

		</form>

	<?php 
        if ($_SESSION['profile_id'] ?? null != null) {
        	echo "<a href=\"" . BASE . "/Profile/index/" . "\"> Cancel </a>";
        } else {
             echo "<a href=\"" . BASE . "/Default/index/" . "\"> Go back </a>";
        }
    
	?>

</body>
</html>