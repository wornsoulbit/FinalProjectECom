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
                    echo "<a href=\"" . BASE . "/Page/searchPage/" . "\"> Go back </a>";

                ?>

            </div>

            <div id="pageContents">
                <?php
                    echo "<h1> " . $data['page']->page_title . "</h1><br />" . 
                    "<p>" . $data['page']->page_text . "</p><br />";
                ?>
            </div>

            <div id="comments">
                <br />
                <h4>Comment section:</h4>
                <!--list of comments for this page -->
                    
                <?php 
                    foreach ($data['comments'] as $comment) {
                        echo "$comment->comment_text";  
                    }                 
                ?>
            </div>
        </div>
    </body>
</html>