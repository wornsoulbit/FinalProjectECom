<html>
<head>
	<title>list of your pages</title>
</head>
<body>
	<a href="<?=BASE?>/Page/createPage">Add a new page</a>
	<table>
		<tr>
			<th>Page title</th>
			<th>Page text</th>
			<th>Actions</th>
		</tr>
<?php
foreach($data as $page){
	echo "<tr>
			<td>$page->page_title</td>
			<td>$page->page_text</td>
			<td>
				<a href='".BASE."/Page/delete/$page->page_id'>delete</a>,
				<a href='".BASE."/Page/edit/$page->page_id'>edit</a>,
			</td>
		</tr>";
}
?>
	</table>
</body>
</html>