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
						<a href='".BASE."/Page/viewPage/$page->page_id'>view this page</a>
					</td>
				</tr>";
		}
	?>  

	</table>

	<a href="<?=BASE?>/Default/index">Go back</a>
</body>
</html>