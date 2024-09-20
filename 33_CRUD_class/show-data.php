<?php

require "database.php";

function main() {
    $obj = new Database();

    $pages = $obj->pagination(
        $table="posts",
        $column="*, posts.id as post_id",
        $join="users on posts.user_id = users.id",
        $where=null,
        $order="posts.id desc",
        $limit=2,
        // $print_data=True
    );

    $result = $obj->getResult();


    echo "<table border='1' width=500px>";
    foreach ($result as list(
        "post_id" => $post_id,
        "title" => $post_title,
        "created_at" => $created_at,
        "username" => $user_id,
        "content" => $post_content
    ))
        echo "<tr> <td>$post_id </td><td> $post_title </td> <td>$post_content</td><td> $created_at </td><td> $user_id </td></tr>";
    echo "</table>";
    echo "<br>$pages<br>";
}

main();


?>