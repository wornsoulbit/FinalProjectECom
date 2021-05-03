<!DOCTYPE html>
<html>
    <head>
        <title>View Page</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
        <link rel="stylesheet" href="<?=BASE?>/CSS/PageCss/defaultPage.css">
    </head>

    <body>
        <div id="page">
            <div id="navBar">
                <br>
                <?php
                    if ($_SESSION['profile_id'] == null) {
                        echo "<a href=". BASE . "/Default/login\">Login</a>";
                    } else {
                        echo "<a href=". BASE . "/Default/login\">Logout</a>";
                    }
                ?>
                

            </div>

            <div id="pageContents">
                <?php
                    echo "<h1> " . $data['page']->page_title . "</h1><br />" . 
                    "<p>" . $data['page']->page_text . "</p><br />";
                ?>
            </div>

            <div id="pageList">
                <h3>Page List</h3>

                <table class="center">
                    <tr>
                        <th>Page title</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    foreach($data['pageList'] as $page){
                        echo "<tr>
                                <td>$page->page_title</td>
                                <td>
                                    <a href='".BASE."/Page/viewPage/$page->page_id'>view this page</a>,
                                </td>
                            </tr>";
                    }
                    ?>
                </table>
            </div>

            <!-- <div id="comments">
                <br />
                <h4>Comment section:</h4>
                <a href="<?= BASE ?>/Comment/add/<?= $data['page']->page_id?>" id="addComment"> Add comment</a> <br /> <br />
                    
                <?php 
                    // foreach ($data['comments'] as $comment) {
                    //     echo "$comment->comment_text";
                    //     if ($_SESSION['profile_id'] == $comment->profile_id) {
                    //         echo "<a href=\"" . BASE . "/Comment/delete/" . $comment->comment_id . "\">delete</a>";
                    //     }
                    // }                    
                ?>
            </div> -->
        </div>
    </body>
</html>