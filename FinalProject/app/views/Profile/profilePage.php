<html>
    <head>
        <title>Profile</title>
        <link rel="stylesheet" href="<?=BASE?>/CSS/ProfileCss/profileCss.css">
    </head>

    <body>
        <div id="container">
            <?php
                echo "<h2>Hello, " . $data['profile']->first_name . " " . $data['profile']->last_name . 
                " welcome to your profile!</h2><br />";
            ?>
            
            <a href="<?= BASE ?>/Profile/edit/<?= $data['profile']->profile_id?>"> Modify your profile</a> <br />
            <a href='<?= BASE ?>/Profile/search'>Search a profile</a> <br>
            <a href="<?= BASE ?>/Page/index/<?= $data['profile']->profile_id?>"> Page management</a> <br />
            <a href="<?= BASE ?>/Default/logout/<?= $data['profile']->profile_id?>"> Logout</a>
            <br />

            
            <!--
                TODO: Show a list of pages a user has created allowing for that user to quickly access that page.
            -->
                
            <?php 

                if ($data['page'] == null) {
                    echo "<h3>It looks like you haven't made any pages.</h3>";
                } else {
                    echo "<h3>Pages that you have made!</h3>";
                }

                foreach($data['page'] as $page){
					echo "<tr>
							<td>$page->page_title</td>
							<td>
								<a href='".BASE."/Page/viewPage/$page->page_id'>view this page</a>,
								<a href='".BASE."/Page/delete/$page->page_id'>delete</a>,
								<a href='".BASE."/Page/edit/$page->page_id'>edit</a>,
                                
							</td>
						</tr>";
				}
            ?>
        </div>
    </body>
</html>