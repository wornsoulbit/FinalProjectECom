<!DOCTYPE html>
<html>
    <head>
        <title>Write Comment</title>
        <link rel="stylesheet" href="<?=BASE?>/CSS/CommentCss/comment.css">
        <script src="https://cdn.tiny.cloud/1/8qhzpgykznjfoihm9y692wkhbhzhpv1y1ddimfioy7txo9oi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="<?=BASE?>/JS/tinyMce.js"></script>
    </head>

    <body>
        <div id="container">
            <h3>Write a comment</h3>

            <form method="post" action="">
                    <div id="pageContents">
                        <textarea id="page_text" name="comment_text" rows="30"></textarea><br />
                        <input type="submit" name="action" value="Submit changes" />
                    </div>
                </form>

            <a href="<?= BASE ?>/Page/viewPage/<?= $data['page']->page_id?>">Cancel</a> <br />
        </div>
    </body>
</html>