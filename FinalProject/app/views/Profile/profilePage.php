<html>
    <head>
        <title>Profile</title>
        <link rel="stylesheet" href="<?=BASE?>/CSS/ProfileCss/profilePage.css">
    </head>
    <body>
        <div id="container">
            <?php
                echo "<h2>Hello, " . $data['profile']->first_name . " " . $data['profile']->last_name . 
                " welcome to your profile!</h2><br />";

                if($_SESSION['role'] == "admin"){
                echo "<a href=\"" . BASE . "/Report/getReports/" . "\"> View report inbox</a> <br />";
            }
            ?>
            <a href="<?= BASE ?>/Profile/edit/<?= $data['profile']->profile_id?>"> Modify your profile</a> <br />
            <a href='<?= BASE ?>/Profile/search'>Search a profile</a> <br>
            <a href='<?= BASE ?>/Page/searchPage'>Search a page</a> <br>
            <a href="<?= BASE ?>/Page/index/<?= $data['profile']->profile_id?>"> Page management</a> <br />
            <a href="<?= BASE ?>/Default/logout/<?= $data['profile']->profile_id?>"> Logout</a>
            <br />

            <!-- List of pages user made section -->
            <div id="userPages">
                <?php 
                    if ($data['page'] == null) {
                        echo "<h3>It looks like you haven't made any pages.</h3>";
                    } else {
                        echo "<h3>Pages that you have made!</h3>";
                    }
                    ?>
                <table>
                    <tr>
                        <th>Page title</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        foreach($data['page'] as $page){
                        echo "<tr>
                        <td>$page->page_title</td>
                        <td>
                        <a href='".BASE."/Page/viewStarPage/$page->page_id'>view this page</a>,
                        <a href='".BASE."/Page/delete/$page->page_id'>delete</a>,
                        <a href='".BASE."/Page/edit/$page->page_id'>edit</a>,
                                        
                        </td>
                        </tr>";
                        }
                        ?>
                </table>
            </div>
            <!-- Starred pages section -->
            <div id="starPages">
                <table>
                    <tr>
                        <th>Page title</th>
                        <th>Actions</th>
                    </tr>
                    <?php 
                        if ($data['star'] == null) {
                            echo "<br /><h3>It looks like you don't have any pages starred.</h3>";
                        } else {
                            echo "<h3>Pages that you have starred!</h3>";
                        }
                        ?>
                    <?php
                        for ($i = 0; $i < count($data['star']); $i++) {
                            echo "<tr>
                                <td>" . $data['pageNames'][$i + 1]->page_title . "</td>
                                <td> <a href='".BASE."/Page/viewStarPage/" . $data['star'][$i]->page_id . "'>view this page</a><br /> </td>
                                </tr>";
                        }
                        ?>
                </table>
            </div>
        </div>
    </body>
</html>

