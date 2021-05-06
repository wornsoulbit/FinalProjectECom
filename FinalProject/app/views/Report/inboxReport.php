<html>
<head>
	<title>List of reported comments</title>
	<link rel="stylesheet" href="<?=BASE?>/CSS/PageCss/listPage.css">
</head>
<body>
	<div id="page">
		<div id="navBar">
			<a href="<?=BASE?>/Profile/index/">Go back</a>
			<a href="<?=BASE?>/Default/logout">Logout</a>
		</div>

		<div id="pageList">
			<?php 
                if ($data['report']->report_id != null) {
                    echo "<table class=\"center\">
                    <tr>
                        <th>Reporter</th>
                        <th>Comment text</th>
                        <th>Report reason</th>
                        <th>Reportee</th>
                        <th>Actions</th>
                    </tr>";

                    for ($i = 0; $i < sizeof($data['report']); $i++) {
                        echo "<tr>
                                <td>" . $data['reporter'][$i]->first_name . " " . $data['profile'][$i]->last_name . "</td>
                                <td>" . $data['comment'][$i]->comment_text . "</td>
                                <td>" . $data['reportee'][$i]->first_name . " " . $data['profile'][$i]->last_name . "</td>
                                <td>" . $data['report'][$i]->report_reason . "</td>
                                <td></td>
                            </tr>";
                    }
                } else {
                    echo "<p>There are no reports!</p>";
                }
            ?>
			</table>
		</div>
	</div>
</body>
</html>