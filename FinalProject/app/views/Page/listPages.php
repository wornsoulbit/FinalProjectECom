<html>
<head>
	<title>list of your pages</title>
	<link rel="stylesheet" href="<?=BASE?>/CSS/PageCss/listPage.css">
</head>
<body>
	<div id="page">
		<div id="navBar">
			<a href="<?=BASE?>/Page/createPage">Add a new page</a>
			<a href="<?=BASE?>/Profile/index/<?= $data['profile']->profile_id?>">Go back</a>
			<a href="<?=BASE?>/Default/logout">Logout</a>

		</div>

		<div id="pageList">
			<table class="center">
				<tr>
					<th>Page title</th>
					<th>Actions</th>
				</tr>
				<?php
				foreach($data['page'] as $page){
					echo "<tr>
							<td>$page->page_title</td>
							<td>
								<a href='".BASE."/Page/viewPage/$page->page_id'>view this page</a>,
								<a href='".BASE."/Page/delete/$page->page_id'>delete</a>,
								<a href='".BASE."/Page/edit/$page->page_id'>edit</a>
							</td>
						</tr>";
				}
				?>
			</table>
		</div>
	</div>
</body>
</html>