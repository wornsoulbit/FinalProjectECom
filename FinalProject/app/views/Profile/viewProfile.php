<head>
	<title>This user's profile</title>
</head>
<body>

	<?php
            echo "<h2>Hello, welcome to " . $data['profile']->first_name . " " . $data['profile']->last_name . 
            "'s profile!</h2><br />";

            if($_SESSION['role'] == "admin"){
            	echo "<a href=\"" . BASE . "/Default/timeout/" . $data['profile']->profile_id . "\"> timeout this user</a> <br>";
            	echo "<a href=\"" . BASE . "/Default/ban/" . $data['profile']->profile_id . "\"> ban this user</a>";
            }
            

    ?>


    <table>
			<tr>
				<th>Page title</th>
				<th>Actions</th>
			</tr>
			<?php
				echo "<h3> List of " . $data['profile']->first_name . "'s pages</h3>";

				foreach($data['page'] as $page){
					echo "<tr>
							<td>$page->page_title</td>
							<td>
								<a href='".BASE."/Page/viewPage/$page->page_id'>view this page</a>
							</td>
						</tr>";
				}	
			?>
	</table>

    <br>
	<a href="<?=BASE?>/Profile/search">search another profile</a>
</body>
</html>