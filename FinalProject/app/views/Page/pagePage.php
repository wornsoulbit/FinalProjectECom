<html>
    <head>
        <title>View Page</title>
    </head>

    <body>
        <br>
        <a href="<?= BASE ?>/Star/add/<?= $data['page']->page_id?>"> Star page</a>
        <br>
        <a href="<?= BASE ?>/Comment/add/<?= $data['page']->page_id?>"> Write comment</a>
        <br>


        <?php
            echo "<tr>" .
                "<td>" . $data['page']->page_title . "</td>" . "</br>" .
                "<td>" . $data['page']->page_text . "</td>" .  "</br>" .    
                "</tr>";
        ?>

        <label>Comment section: </label>
        <!--list of comments for this page -->
        <?php 
        foreach ($data['comments'] as $comment) {
            echo "
            <br />
            <tr>
                <td>$comment->comment_text</td>
            </tr>";
        }
        ?>
    </body>
</html>