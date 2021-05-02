<!DOCTYPE html>
<html>
    <head>
        <title>Create Page</title>
        <script src="https://cdn.tiny.cloud/1/8qhzpgykznjfoihm9y692wkhbhzhpv1y1ddimfioy7txo9oi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="<?=BASE?>/JS/tinyMce.js"></script>
        <link rel="stylesheet" href="<?=BASE?>/CSS/PageCss/createPage.css">
    </head>

    <body>
        <div id="container">
            <h3>Create your Page</h3>

            <form method="post" action="">
                <label>Page title: <input type="text" name="page_title"> </label> <br/>
                <label>Page text: </label> <br />
                <textarea id="page_text" name="page_text" rows="30"> </textarea> <br/>

                <input type="submit" name="action" value="Create Page" />
            </form>
            <a href="<?= BASE ?>/Page/index/<?= $_SESSION['profile_id']?>">Return to pages list</a> <br />
        </div>
    </body>
</html>