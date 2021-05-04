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
		<a href="<?= BASE ?>/Profile/index/<?= $_SESSION['profile_id']?>">Cancel</a> <br />
	</div>
</body>
</html>