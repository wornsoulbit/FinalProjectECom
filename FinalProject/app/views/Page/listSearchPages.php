<html>
<head>
	<title>List of searched pages</title>
</head>
<body>

	<table>
		<tr>
			<th>Page title</th><th>actions</th>
		</tr>


	<?php

		foreach($data['pages'] as $page){		
			echo "<tr>
					<td>$page->page_title</td>	
					<td>
						<a href='".BASE."/Page/viewSearchPage/$page->page_id'>view this page</a>
					</td>
				</tr>";
		}
	?>  

	</table>

	<br>

	<a href="<?=BASE?>/Page/searchPage">Go back</a>
</body>
</html>