<html>
    <head>
        <title>Edit Page</title>
    </head>

    <body>
        <h3>Edit your page</h3>

        <form method="post" action="">
            <label>Page title: <input type="text" name="page_title" value="<?= $data['page']->page_title ?>"></label><br />

            <label>Page text: <textarea name="page_text" value="<?= $data['page']->page_text ?>"></textarea></label><br />

            <input type="submit" name="action" value="Submit changes" />
        </form>
    </body>
</html>