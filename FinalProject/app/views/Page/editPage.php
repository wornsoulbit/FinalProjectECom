<html>
    <head>
        <title>Edit Page</title>
        <link rel="stylesheet" href="<?=BASE?>/CSS/PageCss/editPage.css">
    </head>

    <body>
        <div id="page">
            <h3>Edit your page</h3>

            <form method="post" action="">
                <div id="pageContents">
                    <label>Page title: <input type="text" name="page_title" value="<?= $data['page']->page_title ?>"></label><br />
                    <label>Page text: </label><br />
                    <textarea name="page_text" rows="10" cols="50"><?= $data['page']->page_text ?></textarea><br />
                    <input type="submit" name="action" value="Submit changes" />
                </div>
            </form>
            <div id="navBar">
                <a href="<?= BASE ?>/Page/index/<?= $_SESSION['profile_id']?>">Cancel Changes</a> <br />
                <a href="<?=BASE?>/Default/logout">Logout</a>
            </div>
        </div>
    </body>
</html>