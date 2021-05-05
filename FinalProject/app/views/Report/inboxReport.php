<html>
<head>
	<title>List of reported comments</title>
	<link rel="stylesheet" href="<?=BASE?>/CSS/PageCss/listPage.css">
</head>
<body>
	<div id="page">
		<div id="navBar">
			<a href="<?=BASE?>/Admin/index/">Go back</a>
			<a href="<?=BASE?>/Default/logout">Logout</a>
		</div>

		<div id="pageList">
			<?php 
                if ($data['report']->report_id != null) {
                    echo "<table class=\"center\">
                    <tr>
                        <th>Profile Name</th>
                        <th>Comment Text</th>
                        <th>Report Reason</th>
                        <th>Actions</th>
                    </tr>";

                    for ($i = 0; $i < sizeof($data['report']); $i++) {
                        echo "<tr>
                                <td>" . $data['profile'][$i]->first_name . " " . $data['profile'][$i]->last_name . "</td>
                                <td>" . $data['comment'][$i]->comment_text . "</td>
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