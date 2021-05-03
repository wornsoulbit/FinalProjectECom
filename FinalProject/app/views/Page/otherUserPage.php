<html>
    <head>
        <title>View Page</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
        <link rel="stylesheet" href="<?=BASE?>/CSS/PageCss/pagePage.css">
    </head>

    <body>
        <div id="page">
            <div id="navBar">
                <?php 
                    if ($_SESSION['profile_id'] != null) {
                        if ($data['star'] == false) {
                            echo "<a href=\"" . BASE . "/Star/add/" . $data['page']->page_id . "\"><i class=\"far fa-star\"></i></a>";
                        } else {
                            echo "<a href=\"" . BASE . "/Star/delete/" . $data['page']->page_id . "\"><i class=\"fas fa-star\"></i></a>";
                        }
                    }
                ?>
                <a href="<?= BASE ?>/Comment/add/<?= $data['page']->page_id?>"> Write comment</a> <br /> <br />
                <a href="<?=BASE?>/Profile/viewProfile/<?= $data['page']->profile_id?>">Go back</a>
            </div>

            <div id="pageContents">
                <?php
                    echo "<h1> " . $data['page']->page_title . "</h1><br />" . 
                    "<p>" . $data['page']->page_text . "</p><br />";
                ?>
            </div>

            <div id="comments">
                <br />
                <label>Comment section: </label> <br />
                <!--list of comments for this page -->
                <br />

                <?php 
                    foreach ($data['comments'] as $comment) {
                        echo "$comment->comment_text";
                        if ($_SESSION['profile_id'] == $comment->profile_id) {
                            echo "<a href=\"" . BASE . "/Comment/delete/" . $comment->comment_id . "\">delete</a>";
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>