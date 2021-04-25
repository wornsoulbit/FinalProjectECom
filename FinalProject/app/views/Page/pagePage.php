<html>
    <head>
        <title>View Page</title>
    </head>

    <body>
        <a href="<?= BASE ?>/Page/edit/<?= $data['page']->page_id?>"> Modify your page</a> <br>
        <a href="<?= BASE ?>/Page/delete/<?= $data['page']->page_id?>"> Delete page</a>
        <br />
        <a href="<?= BASE ?>/Star/add/<?= $data['page']->page_id?>"> Star page</a>
        <br />

        <?php
        echo "<tr>
        		<td>$data['page']->page_title</td>
        		<td>$data['page']->page_text</td>
        	</tr>";
        ?>

    </body>
</html>