<?php

require 'database.php';

function main() {
    $obj = new Database();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $title = $_POST["title"];
        $content = $_POST['content'];
        $user_id = $_POST['user_id'];
        // print_r(getdate());
        $created_at = getdate()['year'] . '-' . getdate()['mon']. '-' . getdate()['mday'];
        // echo $created_at;
        
        $post_save = [
            'title' => $title,
            'content' => $content,
            'user_id' => $user_id,
            'created_at' => $created_at
        ];
        $obj->insert(
            $table = 'posts',
            $params = $post_save
        );
    }
}

main();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Posts Form</title>
</head>
<body>
    <form action="<?php basename($_SERVER['PHP_SELF'])?>" method="post">
        <label for="">Post Title: </label>
        <input type="text" placeholder="Enter the title for your post" name="title"><br>

        <label for="">content: </label>
        <input type="text" placeholder="Enter the content for your post" name="content"><br>

        <label for="">User ID: </label>
        <!-- <input type="text" placeholder="Enter the User ID for your post" name="user_id"><br> -->
        <select name="user_id" id="">
        <?php
        $obj = new Database();
        $obj->select(
            $table="users",
            $columns="id, username",
            $join=null,
            $where=null,
            $order=" id desc",
            $limit=null
        );
        $result = $obj->getResult();

        foreach($result as list(
            'id' => $user_id,
            'username' => $username
        ))
            echo "<option value=$user_id >$username</option>";
        ?>
        </select><br>
        <button type="submit" name="submit-button">Submit</button>
    </form>
</body>
</html>