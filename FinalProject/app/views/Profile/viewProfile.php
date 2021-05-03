<head>
	<title>This user's profile</title>
</head>
<body>

	<table>
		<tr>
			<th>First Name</th><th>Last name</th>
		</tr>


	<?php

			echo "<tr>" .
                "<td>" . $data['profile']->first_name . "</td>" . "</br>" .
                "<td>" . $data['profile']->last_name . "</td>" .  "</td>" .
                "</tr>";

	?>  

	</table>
	<a href="<?=BASE?>/Profile/search">search another profile</a>
</body>
</html>