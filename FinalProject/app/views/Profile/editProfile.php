<html>
    <head>
        <title>Edit Profile</title>
        <link rel="stylesheet" href="<?=BASE?>/CSS/ProfileCss/editProfile.css">
    </head>

    <body>
        <div id="container">
            <h3>Edit your profile</h3>

            <form method="post" action="">
                <label>First Name: <input type="text" name="first_name" value="<?= $data['profile']->first_name ?>"></label><br />
                <label>Last Name: <input type="text" name="last_name" value="<?= $data['profile']->last_name ?>"></label><br />

                <input type="submit" name="action" value="Submit changes"/>
            </form>

            <a href="<?= BASE ?>/Profile/index/<?= $_SESSION['profile_id']?>"> Cancel</a> 
        </div>
    </body>
</html>