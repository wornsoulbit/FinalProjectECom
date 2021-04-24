<html>
    <head>
        <title>Profile</title>
    </head>

    <body>
        <a href="<?= BASE ?>/Profile/edit/<?= $data['profile']->profile_id?>"> Modify your profile</a>
        <a href="<?= BASE ?>/Default/logout/<?= $data['profile']->profile_id?>"> Logout</a>
        <br />

        <?php
            echo "<h2>Hello, " . $data['profile']->first_name . " " . $data['profile']->last_name . 
            " welcome to your profile!</h2><br />";
        ?>
        <!--
            TODO: Show a list of pages a user has created allowing for that user to quickly access that page.
        -->
    </body>
</html>