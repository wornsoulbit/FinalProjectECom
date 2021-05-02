<html>
    <head>
        <title>View Page</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    </head>

    <body>
        <?php 
            if ($data['star'] == false) {
                echo "<a href=\"" . BASE . "/Star/add/" . $data['page']->page_id . "\"><i class=\"far fa-star\"</i></a>";
            } else {
                echo "<a href=\"" . BASE . "/Star/delete/" . $data['page']->page_id . "\"><i class=\"fas fa-star\"</i></a>";
            }
        ?>

        <br />
        <a href="<?= BASE ?>/Comment/add/<?= $data['page']->page_id?>"> Write comment</a>
        <br />

        <?php
            echo "Page Title: " . $data['page']->page_title . "<br />" . 
            "" . $data['page']->page_text . "<br />";
        ?>

        <br />
        <label>Comment section: </label>
        <!--list of comments for this page -->
        <br />

        <?php 
            foreach ($data['comments'] as $comment) {
                echo "$comment->comment_text <br />";
            }
        ?>

    </body>
</html>