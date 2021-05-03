<html>
<head>
	<title>List of searched profiles</title>
</head>
<body>

	<table>
		<tr>
			<th>First Name</th><th>Last name</th><th>actions</th>
		</tr>


	<?php

		foreach($data['profiles'] as $profile){		
			echo "<tr>
					<td>$profile->first_name</td>	
					<td>$profile->last_name</td>
					<td>
						<a href='".BASE."/Profile/viewProfile/$profile->profile_id'>view this user's profile </a>
					</td>
				</tr>";
		}
	?>  

	</table>

	<a href="<?=BASE?>/Profile/search">Go back</a>
</body>
</html>