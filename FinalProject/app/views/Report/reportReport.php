<!DOCTYPE html>
<html>
    <head>
        <title>Report a Comment</title>
    </head>

    <form method="post" action="">
            <label>Profile: <?=$data['profile']->first_name . " " . $data['profile']->last_name?></label> <br />
            <label>Comment: <?=$data['comment']->comment_text?></label> <br />
            <label>Report reason: <input type="text" name="report_reason"></label> <br />

            <input type="submit" name="action" value="Create Report" />
     </form>

</html>