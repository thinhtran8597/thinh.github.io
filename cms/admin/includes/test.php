<?php
include "C:\\xampp\htdocs\cms\includes\db.php ";
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    //    echo json_encode([
    //        "success" => true,
    //        "data" => 12,
    //    ]);

    $postId = $_POST['post_id'];
    $counting = $_POST ['count'];

    if(isset($_GET['p_id'])) {

        $postId = $_GET['p_id'];
    }

    $query = "SELECT * FROM posts WHERE post_id = $postId";
    $select_posts_by_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id  = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
        $post_points = $row['points'];
   }

    $result = array (
        "post_id" => $post_id,
        "post_author" => $post_author,
        "post_title" => $post_title,
        "post_category_id" => $post_category_id,
        "post_status" => $post_status,
        "post_image" => $post_image,
        "post_content" => $post_content,
        "post_tags" => $post_tags,
        "post_comments_count" => $post_comment_count,
        "post_date" => $post_date,
    );
//    echo json_encode($result);
    $post_points += $counting;
    $query = "UPDATE posts SET ";
    $query .= "points            = '{$post_points}' ";
    $query .= "WHERE  post_id    ={$postId}";
    mysqli_query($connection, $query);
    echo $query;
?>
