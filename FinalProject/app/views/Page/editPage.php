<html>
    <head>
        <title>Edit Page</title>
    </head>

    <body>
        <h3>Edit your page</h3>

        <form method="post" action="">
            <label>Page title: <input type="text" name="page_title" value="<?= $data['page']->page_title ?>"></label><br />
            <label>Page text: </label><br />
            <textarea name="page_text" rows="10" cols="50"><?= $data['page']->page_text ?></textarea><br />


            <input type="submit" name="action" value="Submit changes" />
        </form>
        <a href="<?= BASE ?>/Page/index/<?= $_SESSION['profile_id']?>">Cancel Changes</a> <br />
    </body>
</html>