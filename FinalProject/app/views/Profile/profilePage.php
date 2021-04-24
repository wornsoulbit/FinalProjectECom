<html>
    <head>
        <title>Profile</title>
    </head>

    <body>
        <?php
            echo "<h2>Hello, " . $data['profile']->first_name . " " . $data['profile']->last_name . 
            " welcome to your profile!</h2><br />";
        ?>
    </body>
</html>